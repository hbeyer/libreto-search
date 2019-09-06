<?php

class lucene_query_set {
	
	private $content = array();

	public function addQuery($query) {
		if (is_subclass_of($query, 'lucene_query')) {
			$this->content[] = $query;
		}
	}

	public function makeQueryString() {
		return('q='.implode('+AND+', $this->content));
	}

}

?>