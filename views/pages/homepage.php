<?php ob_start(); //enregistre/capture tout ce qui se passe à partir d'ici ?>

<h1>Welcome to the homepage!</h1>

<?php $content = ob_get_clean(); //enregistre le buffer dans $content et vide la mémoire tampon  ?>

<?php require_once('views/layout.php'); ?>