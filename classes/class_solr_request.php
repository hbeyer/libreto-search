<?php


class solr_request {
    
    public $url = '';
    public $errorMessage;
   
    const BASE_SELECT = 'http://192.168.0.5:8983/solr/libreto/select?';
    const FORMAT = 'php';
    const SEARCH_FIELDS = array(
        'fullText' => 'Volltext', 
        'titleBib' => 'Titel', 
        'titleCat' => 'Titel Altkatalog', 
        'author' => 'Autor(in)', 
        'contributor' => 'Beiträger(in)', 
        'histSubject' => 'Rubrik Altkatalog', 
        'place' => 'Erscheinungsort', 
        'publisher' => 'Drucker(in)', 
        'yearNormalized' => 'Jahr', 
        'subjects' => 'Inhalt', 
        'genres' => 'Gattung', 
        'languagesFull' => 'Sprache', 
        'format' => 'Format',
        'comment' => 'Kommentar',
        'id' => 'ID'
    );
    const FILTER_FIELD = 'ownerGND';
    const FILTERS = array(
        'all' => 'Alle',
        '141678615' => 'Antoinette Amalie von Braunschweig-Wolfenbüttel',
        '128989289' => 'Bahnsen, Benedikt',
        '117671622' => 'Liddel, Duncan',
        '1055708286' => 'Rehlinger, Carl Wolfgang'
    );
    const FACET_FIELDS = array(
        'nameCollection_str' => 'Sammlung',
        'subjects_str' => 'Inhalte',
        'genres_str' => 'Gattung',
        'languagesFull_str' => 'Sprache',
        'format_str' => 'Format',
        'histSubject_str' => 'Rubrik',
        'publisher_str' => 'Drucker(in)'
    );
    
    /*  Variablen für die Suche */
    private $queries; // Enthält assoziative Arrays mit den Indices 'field' und 'value'
    private $filters = array();
    private $start = 0;

    function __construct($get) {
        if (isset($get['start'])) {
            $this->start = $get['start'];
        }
        if (isset($get['field']) and isset($get['value'])) {
            $value = htmlspecialchars($get['value']);
            if ($get['fuzzy'] == 'yes' and $value != '*' and $value != '') {
                $value = rtrim('*', $value);
                $value .= '~';
            }
            $this->queries[] = array('field' => htmlspecialchars($get['field']), 'value' => $value);
            if (isset($get['owner'])) {
                if (in_array('all', $get['owner']) == false)  {
                    foreach ($get['owner'] as $gnd) {
                        $this->filters[] = $gnd;
                    }
                }
            }

            if (isset($get['refine'])) {
                foreach ($get['refine'] as $refine) {
                    $keyValue = explode(':', $refine);
                    if (isset($keyValue[0]) and isset($keyValue[1])) {
                        $this->queries[] = array('field' =>  htmlspecialchars($keyValue[0]), 'value' => '"'.htmlspecialchars($keyValue[1]).'"');
                    }
                }
            }
        
        }
        $this->url = $this->toURL();
    }

    private function toURL() {

        if ($this->validate() == false) {
            return;
        }
                
        $filterString = '';
        if (isset($this->filters[0])) {
            $filters = array();
            foreach ($this->filters as $gnd) {
                $filters[] = solr_request::FILTER_FIELD.':'.$gnd;
            }
            $filterString = 'fq='.implode(urlencode(' OR '), $filters).'&';
        }

        $queryArray = array();
        foreach ($this->queries as $query) {
            $query['value'] = urlencode($query['value']);
            if ($query['value'] == '') {
                $query['value'] = '*';
            }        
            if ($query['field'] == 'fullText') {
                $queryArray[] = $query['value'];
            }
            else {
                $queryArray[] = $query['field'].':'.$query['value'];
            }
        }
        $queryString = 'q='.implode('+AND+', $queryArray);

        $start = '';
        if ($this->start > 0) {
            $start = '&start='.$this->start;
        }

        $facetArray = '';
        foreach (solr_request::FACET_FIELDS as $field => $label) {
            $facetArray[] = 'facet.field='.$field;
        }
        $facetString = implode('&', $facetArray);
        $facetString .= '&facet=on&';

        return(solr_request::BASE_SELECT.$facetString.$filterString.$queryString.$start.'&wt='.solr_request::FORMAT);

    }

    private function validate() {
        foreach ($this->queries as $query) {
            if (isset(solr_request::SEARCH_FIELDS[$query['field']]) == false and isset(solr_request::FACET_FIELDS[$query['field']]) == false) {
                $this->errorMessage = 'Ungültiges Feld: '.$query['field'];
                return(false);
            }
            if (strlen($query['value']) > 150) {
                $this->errorMessage = 'Suchwort zu lang (maximal 150 Zeichen)';
                return(false);
            }
        }
        foreach ($this->filters as $gnd) {
            if (isset(solr_request::FILTERS[$gnd]) == false) {
                $this->errorMessage = 'Unzulässiger Filter: '.$gnd;
                return(false);
            }
        }
        return(true);
    }

}

?>
