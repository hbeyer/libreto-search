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

	public function makeFilterQueryString() {
		if (!empty($this->content[0])) {
			return('fq='.implode('+OR+', $this->content).'&');
		}
		return('');
	}

}

?>