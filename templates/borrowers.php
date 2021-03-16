<?php

$borrowers = array();
//$borrowerArray = explode(';', $doc['borrower'][0]);
foreach ($doc['borrower'] as $borrower) {
	preg_match('%([^#]+)#([^~]+)~(([0-9]{4})-([0-9]{2})-([0-9]{2}))%', $borrower, $hits);	
	if (empty($borrowers[$hits[1]])) {
		$borrowers[$hits[1]] = array();
	}
	$borrowers[$hits[1]][] = array('name' => $hits[1], 'gnd' => $hits[2], 'date' => $hits[3], 'year' => $hits[4], 'month' => $hits[5], 'day' => $hits[6]);
}
ksort($borrowers);
?>
<?php foreach ($borrowers as $key => $loans): ?>
	<?php echo $key; ?><?php if ($loans[0]['gnd']): ?> <a href="http://beaconfinder.mww-forschung.de/index.php?gnd=<?php echo $loans[0]['gnd']; ?>" title="Informationsseite zur Person anzeigen" target="_blank"><span class="glyphicon glyphicon-info-sign"></span></a><?php endif; ?>
	<?php $dates = array();	foreach ($loans as $loan) { $dates[] = $loan['date']; } echo implode(', ', $dates);	?><br>
<?php endforeach; ?>
