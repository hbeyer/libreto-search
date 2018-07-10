<?php

class solr_response {
    
    public $errorMessage = false;
    public $numFound;
    public $start;
    public $rows = 10;
    private $responsePHP = false;
    
    function __construct($url) {
        $string = @file_get_contents($url);
        if (!$string) {
            $this->errorMessage = 'Apache Solr antwortet nicht';
            return;
        }
        else {
            $this->responsePHP = eval("return ".$string.";");
            unset($string);
            if (isset($this->responsePHP['response']['numFound']) and isset($this->responsePHP['response']['start'])) {
                $this->numFound = $this->responsePHP['response']['numFound'];
                $this->start = $this->responsePHP['response']['start'];
            }
            else {
                $this->responsePHP = false;
                $this->errorMessage = 'Antwort fehlerhaft';
            }
        }
        return;
    }

    public function displayHTML() {
        include('templates/docList.php');
    }

    /* public function buildNewRequest($start = 0) {
        $result = solr_request::BASE_SELECT;
        if (isset($this->responsePHP['responseHeader']['params']['q'])) {
            if (isset($this->responsePHP['responseHeader']['params']['fq'])) {
                $result .= 'fq='.$this->responsePHP['responseHeader']['params']['fq'].'&';
            }
            $result .= 'q='.$this->responsePHP['responseHeader']['params']['q'];
            if ($start >  0) {
                $result .= '&start='.$start;
            }
            $result .= '&wq='.solr_request::FORMAT;
        }
        return($result);
    } */

    public function buildNewGETRequest($start) {
        $result = 'search.php?';
        $result .= 'field='.$_GET['field'].'&';
        $result .= 'value='.$_GET['value'].'&';
        if ($_GET['fuzzy'] == 'yes') { 
            $result .= 'fuzzy=yes&'; 
        }
        foreach ($_GET['owner'] as $gnd) {
            $result .= 'owner[]='.$gnd.'&';
        }
        $result .= 'start='.$start;
        return($result);
    }
}

?>
