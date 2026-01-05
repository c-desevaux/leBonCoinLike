
<?php $title=$user['pseudUser']; ?>

<?php ob_start(); ?>

<h1><?= $title ?></h1>


    <div>Pseudo de l'utilisateur: <?= $user['pseudUser'] ?></div>
    <div>Email de l'utilisateur: <?= $user['emailUser'] ?></div>
    <div>Date d'inscription de l'utilisateur: <?= $user['dateUser'] ?></div>
    <div>Identifiant de l'utilisateur: <?= $user['idUser'] ?></div>
    <a class="btn del" href="index.php?action=delUser&id=<?= $user['idUser'] ?>">Suprimer</a>
    <br>

<?php $content = ob_get_clean(); ?>

<a class="btn back" href="index.php?action=home">Retour</a>

<?php require 'template.php' ?>