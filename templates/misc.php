<?php 
	$misc = new miscellany($doc['misc'][0]);
	$linkMisc = $this->buildFacetLink('misc_str:'.$doc['misc_str'][0]);
?>
<div class="row">
    <div class="col-sm-2"><i>Kontext</i></div>
    <div class="col-sm-10">Stücktitel <?php echo $doc['positionMisc'][0]; ?> in <a href="<?php echo $linkMisc; ?>" title="Inhalt des Sammelbands anzeigen"><?php echo $misc; ?></a></div>
</div>