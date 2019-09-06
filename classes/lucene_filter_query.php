<?php

class lucene_filter_query extends lucene_query {
	
	function __construct($value) {
		$this->field = $this->filter_field;
		$this->value = $value;
		if (isset($this->filters[$this->value])) {
			$this->valid = true;
		}
	}

}

?>