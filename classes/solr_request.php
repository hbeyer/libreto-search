<?php


class solr_request extends solr_interaction {
    
    public $url = '';
    public $errorMessage;
       
    /*  Variablen für die Suche */
    private $queries;
    private $filter_queries;
    private $filters_active = array();
    private $start = 0;

    function __construct($get = null) {
        $this->queries = new lucene_query_set;
        $this->filter_queries = new lucene_query_set;
        if (isset($get['start'])) {
            $this->start = $get['start'];
        }
        if (isset($get['field']) and isset($get['value'])) {
            $value = htmlspecialchars($get['value']);
            if ($get['fuzzy'] == 'yes' and $value != '*' and $value != '') {
                $value = rtrim('*', $value);
                $value .= '~';
            }
            $this->queries->addQuery(new lucene_search_query(htmlspecialchars($get['field']), $value));
            if (isset($get['owner'])) {
                if (in_array('all', $get['owner']) == false)  {
                    foreach ($get['owner'] as $gnd) {
                        $this->filter_queries->addQuery(new lucene_filter_query($gnd));
                    }
                }
            }
            if (isset($get['refine'])) {
                foreach ($get['refine'] as $refine) {
                    $splitRefine = explode(':', $refine);
                    if (isset($splitRefine[0]) and isset($splitRefine[1])) {
                        $keyRefine = array_shift($splitRefine);
                        $valueRefine = implode(':', $splitRefine);
                        $this->queries->addQuery(new lucene_search_query(htmlspecialchars($keyRefine), htmlspecialchars($valueRefine)));
                    }
                }
            }
        
        }
        $this->url = $this->toURL();
    }

    private function toURL() {
                
        $filterString = $this->filter_queries->makeFilterQueryString();

        $queryString = $this->queries->makeQueryString();

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

}

?>