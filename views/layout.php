<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ccd7bb19ea.js" crossorigin="anonymous"></script> 
    <link href="../assets/custom.css" rel="stylesheet">

    <title>Snowaddict Website!</title>
</head>
<body>
    <?php require_once('fragments/header.php') ?>

    <?= $content ?> <!--  <==> <?php //echo $content?> -->

    <?php require_once('fragments/footer.php') ?>
</body>
</html>