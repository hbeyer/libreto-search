<?php

class miscellany {
	
	public $id;
	public $project;
	public $displayProject;
	public $number;
	public $valid = false;

	function __construct($id) {
		$this->id = $id;
		preg_match('~br:([^/]+)/miscellany_([0-9]+)~', $this->id, $pieces);
		if (isset($pieces[1]) and isset($pieces[2])) {
			$this->project = $pieces[1];
			$this->number = $pieces[2];
			$this->displayProject = strtoupper(substr($this->project, 0, 1)).substr($this->project, 1);
			$this->valid = true;
		}
	}

	function __toString() {
		if ($this->valid == true) {
			return($this->displayProject.' Band '.$this->number);
		}
		return($this->id);
	}

}

?>