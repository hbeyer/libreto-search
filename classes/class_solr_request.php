<?php


class solr_request extends solr_interaction {
    
    public $url = '';
    public $errorMessage;
       
    /*  Variablen für die Suche */
    private $queries; // Enthält assoziative Arrays mit den Indices 'field' und 'value'
    private $filters_active = array();
    private $start = 0;

    function __construct($get = null) {
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
                        $this->filters_active[] = $gnd;
                    }
                }
            }

            if (isset($get['refine'])) {
                foreach ($get['refine'] as $refine) {
                    $splitRefine = explode(':', $refine);
                    if (isset($splitRefine[0]) and isset($splitRefine[1])) {
                        $keyRefine = array_shift($splitRefine);
                        $valueRefine = implode(':', $splitRefine);
                        $this->queries[] = array('field' =>  htmlspecialchars($keyRefine), 'value' => htmlspecialchars($valueRefine));
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
                $filters[] = $this->filter_field.':'.$gnd;
            }
            $filterString = 'fq='.implode(urlencode(' OR '), $filters).'&';
        }

        $queryArray = array();
        foreach ($this->queries as $query) {
            $query['value'] = solr_request::prepareQueryValue($query['value']);
            if ($query['value'] == '') {
                $query['value'] = '*';
            }
            elseif (substr($query['field'], -4) == '_str') {
                $query['value'] = '"'.$query['value'].'"';
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

        $facetArray = array();
        foreach ($this->facet_fields as $field => $label) {
            $facetArray[] = 'facet.field='.$field;
        }
        $facetString = implode('&', $facetArray);
        $facetString .= '&facet=on&';

        $rows = '';
        if ($this->rows != 10) {
            $rows = '&rows='.$this->rows;
        }

        return(solr_request::BASE_SELECT.$facetString.$filterString.$queryString.$start.'&wt='.solr_request::FORMAT.$rows);

    }

    private function validate() {
        if (!is_array($this->queries)) {
            return(false);
        }
        foreach ($this->queries as $query) {
            if (isset($this->search_fields[$query['field']]) == false and isset($this->facet_fields[$query['field']]) == false) {
                $this->errorMessage = 'Ungültiges Feld: '.$query['field'];
                return(false);
            }
            if (strlen($query['value']) > 150) {
                $this->errorMessage = 'Suchwort zu lang (maximal 150 Zeichen)';
                return(false);
            }
        }
        foreach ($this->filters_active as $gnd) {
            if (isset($this->filters[$gnd]) == false) {
                $this->errorMessage = 'Unzulässiger Filter: '.$gnd;
                return(false);
            }
        }
        return(true);
    }

    static function prepareQueryValue($value) {
        //$specialCharSOLR = array('+' => '\+', '-' => '\-', '&&' => '\&&', '||' => '\||', '!' => '\!', '(' => '\(', ')' => '\)', '{' => '\{', '}' => '\}', '[' => '\[', ']' => '\]', '^' => '\^', '"' => '\"', '~' => '\~', '*' => '\*', '?' => '\?', ':' => '\:', '/' => '\/');
        $specialCharSOLR = array('+' => '\+', '-' => '\-', '&&' => '\&&', '||' => '\||', '!' => '\!', '(' => '\(', ')' => '\)', '{' => '\{', '}' => '\}', '[' => '\[', ']' => '\]', '^' => '\^', '"' => '\"', '?' => '\?', ':' => '\:', '/' => '\/');
        $value = strtr($value, $specialCharSOLR);
        $value = urlencode($value);
        return($value);
    }

}

?>
