<?php

class lucene_query extends solr_interaction {
	
	protected $field;
	protected $value;
	public $valid = false;

	function __construct($field, $value) {
		$this->field = $field;
		$this->value = $value;
		if ($this->field and $this->value) {
			$this->valid = true;
		}
	}

	public function __toString() {
		return($this->field.':'.$this->value);
	}

	protected function prepareSearchValue() {
		
	}

}

?>