<?php
include('templates/functions.php');
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Rekonstruktion historischer Bibliotheken</title>
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
            <h1>Rekonstruktion historischer Bibliotheken</h1>
            <div class="container">      
                <h2>Projekt</h2>
                <p>Die Herzog August Bibliothek Wolfenbüttel betreibt als ein Forschungsprojekt die digitale Rekonstruktion und Erforschung frühneuzeitlicher Bibliotheken, die als die persönliche Sammlung einer Person angesehen werden können. Diese in der Forschung teils als Privat- oder Gelehrtenbibliotheken bezeichneten Sammlungen sind entweder als Teilbestände moderner Bibliotheken anhand von Provenienzinformationen zu identifizieren oder können aufgrund von Quellen wie insbesondere Auktionskataloge und Nachlassinventare rekonstruiert werden. Diese Arbeit geschieht teilweise im Rahmen des Projekts <a href="http://www.hab.de/de/home/wissenschaft/forschungsprofil-und-projekte/fruehneuzeitliche-gelehrtenbibliotheken.html">Frühneuzeitliche Gelehrtenbibliotheken</a>, das Teil des Verbundprojekts <a href="http://www.mww-forschung.de/forschungsprojekte/autorenbibliotheken/?menuopen=1" target="_blank">Autorenbibliotheken</a> im <a href="http://www.mww-forschung.de" target="_blank">Forschungsverbund Marbach-Weimar-Wolfenbüttel</a> ist, teils als Eigenleistung des Personals der HAB sowie durch externe Forscherinnen und Forscher. Die vorliegende Website ist eine Plattform für die Präsentation einzelner Bibliotheken und wird laufend weiterentwickelt.</p>
                <p><a href="http://www.hab.de/de/home/wissenschaft/forschungsprofil-und-projekte/historische-bibliotheksrekonstruktion.html">Projekt auf der Homepage der HAB</a></p>
            </div>
            <div class="container"> 
                <h2>Visualisierungstool</h2>
                <p>Die Erfassung und Präsentation erfolgt mit dem für das Projekt entwickelten Programm <a href="https://github.com/hbeyer/libreto" target="_blank" title="Programmcode bei GitHub">LibReTo</a> (Library Reconstruction Tool), das zur freien Nachnutzung unter einer <a href="https://github.com/hbeyer/libreto/blob/master/LICENSE" target="_blank" title="Lizenzinformation zu LibReTo">MIT-Lizenz</a> veröffentlicht ist. Es verarbeitet Erschließungsdaten im CSV- oder XML-Format zu einer Visualisierung in statischem HTML mit Graphiken auf Javascript-Basis. Hinzu kommen Downloadmöglichkeiten u. a. im TEI- und RDF-Format. Eine besondere Stärke liegt darin, dass Daten aus Altkatalogen mit solchen aus der Provenienzerschließung kombiniert und gemischt werden können. Ziel ist es, Forscherinnen und Forschern ein einfach zu bedienendes Werkzeug für die Rekonstruktion historischer Sammlungen an die Hand zu geben, das gleichzeitig die Produktion hochwertiger und projektübergreifend einheitlicher Metadaten fördert. Zu diesem Zweck wurde auch eine <a href="ontology.html" title="Ontologie zum LibReTo">Ontologie</a> zur RDF-Repräsentation rekonstruierter Bibliotheken entwickelt.</p>
                <p>Für die Datenerfassung im CSV-Format steht eine ausführliche <a href="Dokumentation_CSV.doc" target="_blank" title="Dokumentation (Word)">Dokumentation</a> der vorhandenen Felder sowie eine Tabelle mit <a href="example.csv" target="_blank" title="Beispieldaten">Beispieldaten</a> zur Verfügung. In XML sind die Feldnamen dieselben wie im CSV-Format. Für die Anlage von Dokumenten kann das projekteigene <a href="uploadXML.xsd" target="_blank" title="XML Schema für den Upload">Schema</a> verwendet werden.</p>
<p>Eine Weiterentwicklung des Frontends erfolgt auf der Basis von <a href="http://lucene.apache.org/solr/" target="_blank">Apache Solr</a>. Hierzu werden die Daten durch das Visualisierungstool für die Indexierung mit Solr aufbereitet. Das Frontend wird hier unter <a href="search.php">Suchmaschine</a> zugänglich gemacht. Die zugrunde liegenden Skripte werden als <a href="https://github.com/hbeyer/libreto-search" target="_blank" title="Programmcode für libreto-search bei GitHub">LibReTo Search</a> ebenfalls bei GitHub veröffentlicht.</p>
            </div>
            <div class="container"> 
                <h2>Verfügbare Bibliotheken</h2>

                <div class="panel panel-default">
                    <div class="panel-heading">Bibliothek Carl Wolfgang Rehlinger (1575)</div>
                    <div class="panel-body">Auf Basis eines als Einblattdruck vorliegenden Katalogs rekonstruiert von Dietrich Hakelberg<br /><a href="search.php?field=fullText&value=*&owner[]=1055708286" title="">Anzeigen</a></div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Bibliothek Duncan Liddel (1613)</div>
                    <div class="panel-body">Rekonstruiert von Jane Pierie (Aberdeen) anhand der in der Sir Duncan Rice Library erhaltenen Bestände, aufbereitet von Hartmut Beyer<br /><a href="search.php?field=fullText&value=*&owner%5B%5D=117671622" title="Bibliothek Duncan Liddel (1613)">Anzeigen</a></div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Bibliothek von Benedikt Bahnsen (1670)</div>
                    <div class="panel-body">Rekonstruktion anhand des gedruckten Auktionskatalogs von Dietrich Hakelberg und Jörn Münkner, unterstützt von Katrin Schmidt<br /><a href="http://localhost/libreto/solr/search.php?field=fullText&value=*&owner%5B%5D=128989289" title="">Anzeigen</a></div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Bibliothek der Herzogin Antoinette Amalie von Braunschweig-Wolfenbüttel (1761)</div>
                    <div class="panel-body">Rekonstruiert anhand des in der Herzog August Bibliothek überlieferten Nachlassinventars von Ulrike Gleixner unter Mitarbeit von Anne Harnisch<br /><a href="search.php?field=fullText&value=*&owner[]=141678615" title="Bibliothek der Herzogin Antoinette Amalie">Anzeigen</a></div>
                </div>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>
    </body>
</html>
