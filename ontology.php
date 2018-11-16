<?php
include('templates/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:owl="http://www.w3.org/2002/07/owl#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" lang="de" xml:lang="de">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LibReTo Ontologie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/affix.css" />
    <link rel="stylesheet" href="assets/css/proprietary.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/proprietary.js"></script>
  </head>
  <body>
<?php makeNavigation(); ?>
    <div class="container" style="min-height:1000px;margin-top:80px;">
      <h1>Ontologie für das Library Reconstruction Tool (LibReTo)</h1>
      <p><a href="ontology.rdf">RDF/XML</a>, <a href="ontology.ttl">Turtle</a></p>
      <figure>
        <img src="assets/images/LibReTo-Ontologie.png" width="100%;" />
        <figcaption>Graphik generiert mit <a href="https://github.com/simeonackermann/VocTo" target="_blank">VocTo</a></figcaption>
      </figure>
      <h2>Klassen</h2>
      <h3 id="Catalogue"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue">Catalogue</a> <small>(Altkatalog)</small></h3>
      <p>Ein Katalog, der zur Zusammensetzung einer Sammlung zu einem bestimmten Zeitpunkt Auskunft gibt</p>
      <h3 id="CatalogueEntry"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry">CatalogueEntry</a> <small>(Eintrag)</small></h3>
      <p>Ein Eintrag im Katalog, der ein Sammlungsobjekt der Sammlung zuordnet</p>
      <h3 id="Collection"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection">Collection</a> <small>(Sammlung)</small></h3>
      <p>Eine erhaltene oder zu einem bestimmten Zeitpunkt in der Vergangenheit existente Bibliothek oder ähnliche Sammlung</p>
      <h3 id="Item"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item">Item</a> <small>(Sammlungsobjekt)</small></h3>
      <p>Ein Sammlungsobjekt wie Druck, Handschrift, Kunstwerk etc.</p>
      <h3 id="Manifestation"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Manifestation">Manifestation</a> <small>(Ausgabe)</small></h3>
      <p>Ausgabe eines gedruckten Werkes, die in einer Bibliographie nachgewiesen ist</p>
      <h3 id="Miscellany"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Miscellany">Miscellany</a> <small>(Sammelband)</small></h3>
      <p>Ein Band, in dem mehrere Sammlungsobjekte physisch verbunden sind</p>
      <h3 id="OriginalItem"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem">OriginalItem</a> <small>(Exemplar)</small></h3>
      <p>Das konkrete Sammlungsobjekt, wenn es erhalten und identifizierbar ist</p>
      <h3 id="Person"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person">Person</a> <small>(Person)</small></h3>
      <h3 id="PhysicalContext"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#PhysicalContext">PhysicalContext</a> <small>(Materieller Kontext)</small></h3>
      <p>Zugehörigkeit des Sammlungsobjekts zu einem materiellen Verbund, insbesondere einem Sammelband</p>
      <h3 id="Place"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place">Place</a> <small>(Ort)</small></h3>
      <h3 id="Work"><a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Work">Work</a> <small>(Werk)</small></h3>
      <p>Ein Werk als geistige Schöpfung, das in einem Sammlungsobjekt vorliegen kann</p>
      <h3>Beziehungen zwischen Klassen</h3>
      <h3 id="belongsTo">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#belongsTo">belongsTo</a>
      </h3>
      <p>Zuordnung eines Sammlungsobjekts (Buch, Handschrift, Bild o. a.) zu einer Sammlung</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection" title="Collection">Collection</a></p>
      <h3 id="collector">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#collector">collector</a>
      </h3>
      <p>Zuordnung einer Person als Sammler/in zu einer Sammlung</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection" title="Collection">Collection</a></p>
      <h3 id="containsWork">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#containsWork">containsWork</a>
      </h3>
      <p>Angabe, dass ein Sammlungsobjekt ein Werk enthält</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Work" title="Work">Work</a></p>
      <h3 id="hasContext">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#hasContext">hasContext</a>
      </h3>
      <p>Angabe des physischen Kontextes eines Sammlungsobjekts</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#PhysicalContext" title="PhysicalContext">PhysicalContext</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="hasEntry">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#hasEntry">hasEntry</a>
      </h3>
      <p>Angabe, dass ein Katalog einer Sammlung einen Eintrag enthält, der über ein Sammlungsobjekt Auskunft gibt</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue" title="Catalogue">Catalogue</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="hasManifestation">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#hasManifestation">hasManifestation</a>
      </h3>
      <p>Angabe, dass ein Sammlungsobjekt eine bibliographisch nachgewiesene Ausgabe enthält</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Manifestation" title="Manifestation">Manifestation</a></p>
      <h3 id="hasOriginalItem">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#hasOriginalItem">hasOriginalItem</a>
      </h3>
      <p>Angabe, dass ein Sammlungsobjekt mit einem konkreten, mit Institution und Signatur/Inventarnummer identifizierbaren Objekt identisch ist</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem" title="OriginalItem">OriginalItem</a></p>
      <h3 id="hasPlace">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#hasPlace">hasPlace</a>
      </h3>
      <p>Zuordnung eines Publikationsortes zu einem Sammlungsobjekt</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place" title="Place">Place</a></p>
      <h3 id="inMiscellany">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#inMiscellany">inMiscellany</a>
      </h3>
      <p>Zuordnung eines Sammelbandes zum physischen Kontext eines Objekts</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Miscellany" title="Miscellany">Miscellany</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#PhysicalContext" title="PhysicalContext">PhysicalContext</a></p>
      <h3 id="refersTo">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#refersTo">refersTo</a>
      </h3>
      <p>Zuordnung eines Sammlungsobjekts zu einem Katalogeintrag</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:creator">
        <a href="http://purl.org/dc/terms/creator">dcmt:creator</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:contributor">
        <a href="http://purl.org/dc/terms/contributor">dcmt:contributor</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <p xmlns="">
Objekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3>Beziehungen zwischen Klassen und Werten</h3>
      <h3 id="bibliographicalFormat">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#bibliographicalFormat">bibliographicalFormat</a>
      </h3>
      <p>Das bibliographische Format (Folio, Quart etc.) eines Buches</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="biographicalInformation">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#biographicalInformation">biographicalInformation</a>
      </h3>
      <p>Ein Link zu einer Ressource, die biographische Informationen zu einer Person enthält</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <h3 id="comment">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#comment">comment</a>
      </h3>
      <p>Erklärungstext zu einem Sammlungsobjekt, der u. a. Probleme bei der Zuordnung von Ausgaben und Originalexemplaren thematisieren kann</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="database">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#database">database</a>
      </h3>
      <p>Eine bibliographische Datenbank, in der eine Ausgabe verzeichnet ist</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Manifestation" title="Manifestation">Manifestation</a></p>
      <h3 id="heading">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#heading">heading</a>
      </h3>
      <p>Rubrik des Altkatalogs, unter der der Eintrag geführt wird</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="historicalShelfmark">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#historicalShelfmark">historicalShelfmark</a>
      </h3>
      <p>Eine Signatur, unter der das Sammlungsobjekt in der rekonstruierten Sammlung geführt wurde</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="imageURL">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#imageURL">imageURL</a>
      </h3>
      <p>Link zu einem Digitalisat der Seite, auf der der Katalogeintrag steht</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="number">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#number">number</a>
      </h3>
      <p>Die Nummer eines Katalogeintrags in Vorlageform</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="owner">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#owner">owner</a>
      </h3>
      <p>Institution oder Person, die ein mit Signatur identifizierbares Sammlungsobjekt besitzt</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue" title="Catalogue">Catalogue</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem" title="OriginalItem">OriginalItem</a></p>
      <h3 id="page">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#page">page</a>
      </h3>
      <p>Die Seite, auf der sich ein bestimmter Textabschnitt befindet</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="physicalForm">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#physicalForm">physicalForm</a>
      </h3>
      <p>Angabe ob gebunden oder ungebunden</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="position">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#position">position</a>
      </h3>
      <p>Die numerische Position eines Sammlungsobjektes in einem größeren Verbund, insbesondere einem Sammelband</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#PhysicalContext" title="PhysicalContext">PhysicalContext</a></p>
      <h3 id="provenanceAttribute">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#provenanceAttribute">provenanceAttribute</a>
      </h3>
      <p>Merkmale eines erhaltenen Objekts, die auf die Zugehörigkeit zu einer historischen Sammlung hindeuten</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem" title="OriginalItem">OriginalItem</a></p>
      <h3 id="shelfmark">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#shelfmark">shelfmark</a>
      </h3>
      <p>Die Signatur eines mit Signatur identifizierbaren Objekts im Bestand der besitzenden Person oder Institution</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue" title="Catalogue">Catalogue</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem" title="OriginalItem">OriginalItem</a></p>
      <h3 id="text">
        <a href="http://bibliotheksrekonstruktion.hab.de/ontology.php#text">text</a>
      </h3>
      <p>Wörtliche Wiedergabe eines Katalogeintrags, der neben bibliographischen Angaben auch weitere Informationen zum Sammlungsobjekt (Bindung, Zustand, Herkunft) enthalten kann</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#CatalogueEntry" title="CatalogueEntry">CatalogueEntry</a></p>
      <h3 id="dbp:genre">
        <a href="http://dbpedia.org/ontology/genre">dbp:genre</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dbp:numberOfVolumes">
        <a href="http://dbpedia.org/ontology/numberOfVolumes">dbp:numberOfVolumes</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Miscellany" title="Miscellany">Miscellany</a></p>
      <h3 id="dcmt:date">
        <a href="http://purl.org/dc/terms/date">dcmt:date</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection" title="Collection">Collection</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue" title="Catalogue">Catalogue</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:description">
        <a href="http://purl.org/dc/terms/description">dcmt:description</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection" title="Collection">Collection</a></p>
      <h3 id="dcmt:hasFormat">
        <a href="http://purl.org/dc/terms/hasFormat">dcmt:hasFormat</a>
      </h3>
      <p>Link zum Digitalisat</p>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#OriginalItem" title="OriginalItem">OriginalItem</a></p>
      <h3 id="dcmt:identifier">
        <a href="http://purl.org/dc/terms/identifier">dcmt:identifier</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place" title="Place">Place</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Manifestation" title="Manifestation">Manifestation</a></p>
      <h3 id="dcmt:language">
        <a href="http://purl.org/dc/terms/language">dcmt:language</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:publisher">
        <a href="http://purl.org/dc/terms/publisher">dcmt:publisher</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:subject">
        <a href="http://purl.org/dc/terms/subject">dcmt:subject</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="dcmt:title">
        <a href="http://purl.org/dc/terms/title">dcmt:title</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Collection" title="Collection">Collection</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Catalogue" title="Catalogue">Catalogue</a>, <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Work" title="Work">Work</a></p>
      <h3 id="dcmt:type">
        <a href="http://purl.org/dc/terms/type">dcmt:type</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Item" title="Item">Item</a></p>
      <h3 id="foaf:term_name">
        <a href="http://xmlns.com/foaf/spec/#term_name">foaf:term_name</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <h3 id="foaf:term_gender">
        <a href="http://xmlns.com/foaf/spec/#term_gender">foaf:term_gender</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Person" title="Person">Person</a></p>
      <h3 id="gn:name">
        <a href="http://www.geonames.org/ontology#name">gn:name</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place" title="Place">Place</a></p>
      <h3 id="geo:lat">
        <a href="http://www.w3.org/2003/01/geo/wgs84_pos#lat">geo:lat</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place" title="Place">Place</a></p>
      <h3 id="geo:long">
        <a href="http://www.w3.org/2003/01/geo/wgs84_pos#long">geo:long</a>
      </h3>
      <p xmlns="">Subjekt: <a xmlns="http://www.w3.org/1999/xhtml" href="http://bibliotheksrekonstruktion.hab.de/ontology.php#Place" title="Place">Place</a></p>
    </div>
<?php include('templates/footer.php'); ?>    
  </body>
</html>
