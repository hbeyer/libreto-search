<?php

class lucene_search_query extends lucene_query {
	
	function __construct($field, $value) {
		$this->field = $field;
		if ($value == '') {
			$this->value = '*';
		}
		else {
			$this->value = $value;
		}
		if (substr($this->field, -4) == '_str') {
			$this->value = '"'.$this->value.'"';
		}
		if (isset($this->search_fields[$this->field]) and !empty($this->value)) {
			$this->valid = true;
			$this->value = $this->prepareSearchValue();
		}
	}

	protected function prepareSearchValue() {
		if (in_array($this->field, $this->range_fields)) {
			if (preg_match('~^(-?[0-9]{3,4})-([0-9]{3,4})$~', $this->value, $parts)) {
				return('['.$parts[1].'+TO+'.$parts[2].']');
			}
			elseif (preg_match('~^-([0-9]+)$~', $this->value, $parts)) {
				return('[-9999+TO+'.$parts[1].']');
			}
			elseif (preg_match('~^(-?[0-9]+)-$~', $this->value, $parts)) {
				return('['.$parts[1].'+TO+9099]');
			}
			elseif (preg_match('~(-?[0-9]{1,4})~', $this->value, $parts)) {
				return($parts[1]);
			}
			else {
				return('0');
			}
		}
		return($this->value);
	}

	public function __toString() {
		if ($this->field == 'fullText') {
			return($this->value);
		}
		return($this->field.':'.$this->value);
	}	

}

?>