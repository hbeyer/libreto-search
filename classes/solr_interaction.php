<?php

class solr_interaction {

    const BASE_SELECT = 'http://localhost:8983/solr/libreto/select?';
    const FORMAT = 'php';
    public $rows = 20;

    public $search_fields = array(
        'fullText' => 'Volltext', 
        'titleBib' => 'Titel', 
        'titleCat' => 'Titel Altkatalog', 
        'author' => 'AutorIn', 
        'contributor' => 'BeiträgerIn',
        'borrower' => 'Ausleihende',
        'histSubject' => 'Rubrik Altkatalog',
        'place' => 'Erscheinungsort', 
        'publishers' => 'DruckerIn/VerlegerIn', 
        'yearNormalized' => 'Jahr', 
        'subjects' => 'Inhalt', 
        'genres' => 'Gattung', 
        'languagesFull' => 'Sprache', 
        'format' => 'Format',
        'comment' => 'Kommentar',
        'id' => 'ID'
    );
    public $filter_field = 'ownerGND';
    public $filters = array(
        'all' => 'Alle',
        '141678615' => 'Antoinette Amalie von Braunschweig-Wolfenbüttel',
        '128989289' => 'Bahnsen, Benedikt',
        '104277122' => 'Elisabeth Sophie Marie von  Braunschweig-Lüneburg'
        '117364177' => 'Sturm, Leonhard Christoph',
        '11566-6' => 'Ausleihverzeichnisse der HAB',
        '116118547' => 'Caselius, Johannes',
        '117671622' => 'Liddel, Duncan',
        '1055708286' => 'Rehlinger, Carl Wolfgang',
        '6064449-7' => 'Reichsstift Gandersheim'
    );
    public $facet_fields = array(
        'nameCollection_str' => 'Sammlung',
        'borrower_pers_str' => 'Ausleihende',
        'subjects_str' => 'Inhalte',
        'genres_str' => 'Gattung',
        'languagesFull_str' => 'Sprache',
        'format_str' => 'Format',
        'histSubject_str' => 'Rubrik',
        'place_str' => 'Erscheinungsort',
        'publishers_str' => 'DruckerIn',
        'misc_str' => 'Sammelband',
        'manifestationFull_str' => 'Ausgabe'
    );
    public $range_fields = array(
    	'yearNormalized'
    );

}

?>
