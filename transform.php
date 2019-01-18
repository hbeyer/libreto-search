<?php

require __DIR__ .'/vendor/autoload.php';
foreach (glob("classes/class_*.php") as $filename)
{
    include $filename;
}
include('functions/classDefinition.php');
include('functions/encode.php');

$bahnsen = new reconstruction('../libreto/user/bahnsen/bahnsen.xml', 'bahnsen');
$bahnsen->enrichData();
$bahnsen->saveAllFormats();

?>
