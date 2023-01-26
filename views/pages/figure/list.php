<?php ob_start(); ?>

<div class="container mb-3">
  <?php if (isset($isDeleted)) { ?>
    <div class="alert alert-success" role="alert">
      Votre figure a bien été supprimée.
    </div>
  <?php } ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Figure</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Video</th>
      <th scope="col">Date de création</th>
      <th scope="col">Date de modification</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tabFigures as $figure){ ?> <!--$tabFigures initialisée dans figureRepository-->
      <tr>
        <th scope='row'> <?= $figure->getId(); ?> </th>
        <td> <?= $figure->getName(); ?> </td>
        <td> <?= $figure->getDescription(); ?> </td>
        <td> <?= $figure->getPicturePath(); ?> </td>
        <td> <?= $figure->getVideoPath(); ?> </td>
        <td> <?= $figure->getCreatedAt(); ?> </td>
        <td> <?= $figure->getUpdatedAt(); ?> </td>
        <td> <a href="/devweb/snowaddict/index.php?action=read&controller=figure&id=<?=$figure->getId();?>">
          <button type="button" class="btn btn-primary">
              <i class="fa-solid fa-eye"></i>
            </button>

            <a href="/devweb/snowaddict/index.php?action=update&controller=figure&id=<?=$figure->getId();?>">
            <button type="button" class="btn btn-success">
              <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <a href="/devweb/snowaddict/index.php?action=list&controller=figure&id=<?=$figure->getId();?>">
            <button type="button" class="btn btn-danger">
              <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    <?php } ?>

    <!-- OU
    $tab=$figureController->list_();
    foreach($tab as $cle => $val){
    // ou $figure getname();
      		echo "<tr><th scope='row'>.$tab[$cle]['id'].</td>";
        	echo "<td>.$tab[$cle]['name'].</td>";
        	echo "<td>'.$tab[$cle]['description'].</td>";
            echo "<td>.$tab[$cle]['picture'].</td>";
            echo "<td>.$tab[$cle]['video'].</td>";
            echo "<td>.$tab[$cle]['createdAt'].</td></tr>";
      	}
    ?>-->

  </tbody>
</table>


<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>