<div class="panel panel-default">
    <div class="panel-heading">Eingeschränkt auf</div>
    <div class="panel-body">
<?php foreach ($_GET['refine'] as $refine): ?>
        <?php $removeLink = $this->buildRemoveLink($refine); ?>
        <p><?php echo displayRefine($refine, $removeLink); ?></p>
<?php endforeach; ?>
</div>
</div>
