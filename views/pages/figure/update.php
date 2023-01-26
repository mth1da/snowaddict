<?php ob_start(); ?>

<div class="container mb-3">
  <?php if ($isSent) { ?>
    <div class="alert alert-success" role="alert">
      Votre figure a bien été mise à jour.
    </div>
  <?php } ?>

<form action="/devweb/snowaddict/index.php?action=update&controller=figure&id=<?= $figure->getId(); ?>" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= $figure->getName();?>">
    </div>

    <div class="form-floating">
      <textarea class="form-control" placeholder="Description" name="description"><?= $figure->getDescription();?></textarea>
      <label for="description">Description</label>
    </div>

    <div class="mb-3">
      <label for="picture" class="form-label">Picture path</label>
      <input type="text" class="form-control" id="picture" name="picture" value="<?= $figure->getPicturePath();?>">
    </div>

    <div class="mb-3">
      <label for="video" class="form-label">Video path</label>
      <input type="text" class="form-control" id="video" name="video" value="<?= $figure->getVideoPath();?>">
    </div>

    <button type="submit" class="mb-3 btn btn-primary">Update</button>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>