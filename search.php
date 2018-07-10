<?php
include('classes/class_solr_request.php');
include('classes/class_solr_response.php');
include('classes/class_reference.php');
include('templates/functions.php');
if (!isset($_GET['field'])) {
    $_GET['field'] = 'fullText';
}
if (!isset($_GET['value'])) {
    $_GET['value'] = '';
}
if (!isset($_GET['owner'])) {
    $_GET['owner'] = array('all');
}
if (!isset($_GET['fuzzy'])) {
    $_GET['fuzzy'] = false;
}
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
            
            <div class="row" style="margin-bottom:30px;">
                <h1>Rekonstruktion historischer Bibliotheken</h1>
            </div>
            
            
            <div class="row">
                <form action="search.php" method="get">

                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding:0px;">
                                <select name="field" style="height:32px;">
                                    <?php
                                    foreach (solr_request::SEARCH_FIELDS as $field => $label) {
                                    $selected = '';
                                    if ($_GET['field'] == $field) {
                                    $selected = ' selected';
                                    }
                                    echo '<option value="'.$field.'"'.$selected.'>'.$label.'</option>';
                                    }
                                    ?>
                                </select>
                            </span>
                            <div class="input-group">
                                <input type="text" name="value" class="form-control" placeholder="Suchwort" <?php if ($_GET['value']) { echo 'value="'.$_GET['value'].'"'; } ?>>
                                <div class="input-group-btn">
<a href="search.php?field=fullText&value=<?php foreach ($_GET['owner'] as $gnd) echo '&owner[]='.$gnd; ?>" class="btn btn-default" role="button" title="Suche zurücksetzen"><i class="glyphicon glyphicon-remove"></i></a>
                                    <button class="btn btn-default" type="submit" title="Suche ausführen"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <span class="help-block">Rechts- und Linkstrunkierung mit *</span>
                        <div class="checkbox" style="float:left;">
                            <div class="form-inline">
                                <label style="color:#737373;"><input style="margin-top:2px;" type="checkbox" name="fuzzy" value="yes" <?php if ($_GET['fuzzy'] == 'yes') { echo 'checked'; } ?> />Unscharfe Suche</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select multiple class="form-control" name="owner[]" size="5">
                                <?php
                                foreach (solr_request::FILTER_FIELDS as $field => $label) {
                                    $selected = '';
                                    if (in_array($field, $_GET['owner'])) {
                                        $selected = ' selected';
                                    }
                                    echo '<option value="'.$field.'"'.$selected.'>'.$label.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <hr />            
            <div class="row">
                <div class="col-sm-8">
                <?php
                    $request = new solr_request($_GET);
                    if ($request->url) {
                        $response = new solr_response($request->url);
                    }
                    if ($response->errorMessage) {
                        echo '<div class="alert alert-warning">'.$response->errorMessage.'</div>';
                    }
                    else {
                        $response->displayHTML();
                    }
                ?>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>
        <!-- <footer class="container-fluid">
            <p><a href="../index.html" style="color:white" target="_blank">Start</a>&nbsp;&nbsp;<a href="http://www.hab.de/de/home/impressum.html" style="color:white" target="_blank">Impressum</a></p>
        </footer> -->
    </body>
</html>
