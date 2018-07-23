<?php


class solr_request {
    
    public $url = '';    
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
        'histSubject_str' => 'Rubrik'
    );
    
    /*  Variablen für die Suche */
    private $field;
    private $value;
    private $fuzzy = false;
    private $filters = array();
    private $filterField = 'ownerGND';
    private $start = 0;

    function __construct($get) {
        if (isset($get['start'])) {
            $this->start = $get['start'];
        }
        if (isset($get['field']) and isset($get['value'])) {
            $this->field = htmlspecialchars($get['field']);
            $this->value = htmlspecialchars($get['value']);
            if (isset($get['fuzzy'])) {
                if ($get['fuzzy'] == 'yes') {
                    $this->fuzzy = true;
                }
            }
            if (isset($get['owner'])) {
                if (in_array('all', $get['owner']) == false)  {
                    foreach ($get['owner'] as $gnd) {
                        $this->filters[] = $gnd;
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
                $filters[] = $this->filterField.':'.$gnd;
            }
            $filterString = 'fq='.implode(urlencode(' OR '), $filters).'&';
        }
        $field = '';
        if ($this->field != 'fullText') {
            $field = $this->field.':';        }
        $this->value = urlencode($this->value);
        if ($this->value == '') {
            $this->value = '*';
        }
        elseif ($this->fuzzy == true and $this->field != 'yearNormalized') {
            if (substr($this->value, -1) == '*') {
                $this->value = substr($this->value, 0, -1);
            }
            $this->value .= '~';
        }
        $start = '';
        if ($this->start > 0) {
            $start = '&start='.$this->start;
        }
        $queryString = 'q='.$field.$this->value;
        $facetArray = '';
        foreach (solr_request::FACET_FIELDS as $field => $label) {
            $facetArray[] = 'facet.field='.$field;
        }
        $facetString = implode('&', $facetArray);
        $facetString .= '&facet=on&';
        return(solr_request::BASE_SELECT.$facetString.$filterString.$queryString.$start.'&wt='.solr_request::FORMAT);
    }

    private function validate() {
        if (isset(solr_request::SEARCH_FIELDS[$this->field]) == false) {
            return(false);        
        }
        if (strlen($this->value) > 150) {
            return(false);
        }
        if ($this->fuzzy != false and $this->fuzzy != 'yes') {
            return(false);
        }
        foreach ($this->filters as $gnd) {
            if (isset(solr_request::FILTERS[$gnd]) == false) {
                return(false);
            }
        }
        return(true);
    }

}

?>
