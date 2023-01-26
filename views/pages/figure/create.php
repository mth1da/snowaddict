<?php ob_start(); ?>

<div class="container mb-3">
  <?php if ($isSent) { ?>
    <div class="alert alert-success" role="alert">
      Votre figure a bien été créée.
    </div>
  <?php } ?>

  <form action="/devweb/snowaddict/index.php?action=create&controller=figure" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="form-floating">
      <textarea class="form-control" placeholder="Description" name="description"></textarea>
      <label for="description">Description</label>
    </div>

    <div class="mb-3">
      <label for="picture" class="form-label">Picture path</label>
      <input type="text" class="form-control" id="picture" name="picture">
    </div>

    <div class="mb-3">
      <label for="video" class="form-label">Video path</label>
      <input type="text" class="form-control" id="video" name="video">
    </div>

    <button type="submit" class="mb-3 btn btn-primary">Create</button>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>