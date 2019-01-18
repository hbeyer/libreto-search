<?php

require __DIR__ .'/vendor/autoload.php';
foreach (glob("classes/class_*.php") as $filename)
{
    include $filename;
}
include('functions/classDefinition.php');
include('functions/encode.php');

/*
$reconstruction = new reconstruction('{path to file with ending}', '{project name}');
$reconstruction->enrichData();
$reconstruction->saveAllFormats();
*/

?>
