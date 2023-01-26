<?php ob_start(); ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= $figure->getName();?></h5>
    <p class="card-text">
        Description : <?= $figure->getDescription();?> <br>
        Picture path : <?= $figure->getPicturePath();?> <br>
        Video path : <?= $figure->getVideoPath();?>
    </p>
    <a href="/devweb/snowaddict/index.php?action=list&controller=figure" class="btn btn-primary">Back to list of figures</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>