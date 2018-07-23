<?php
include('classes/class_beacon_repository.php');
include('classes/class_gnd_request.php');
include('templates/functions.php');
$beacon_request = new beacon_repository;
if (!isset($_GET['gnd'])) {
    $gnd = null;
}
else {
    $gnd = substr($_GET['gnd'], 0, 15);
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Personeninformation</title>
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
            
            <div class="row">
            <?php
            if ($gnd) {
                $gndRequest = new gnd_request($gnd);
                $links = $beacon_request->getLinks($gnd, '_blank');
                include('templates/gndData.php');
            }
            ?>
            </div>        
            <div class="row">
                <i>Ausgewertet wurden:</i> 
                <?php 
                    $labels = array();
                    foreach (beacon_repository::BEACON_SOURCES as $source) { 
                        $labels[] = $source['label'];  
                    }
                    echo implode('; ', $labels);
                ?>
                <br />
                <i>Letztes Update:</i> <?php echo $beacon_request->lastUpdate; ?>
            </div>
            
        </div>
<?php include('templates/footer.php'); ?>
    </body>
</html>
