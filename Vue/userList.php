
<?php $title="User List"; ?>

<?php ob_start(); ?>


<?php foreach ($users as $user): ?>

    <div>Pseudo de l'utilisateur: <?= $user['pseudUser'] ?></div>
    <div>Email de l'utilisateur: <?= $user['emailUser'] ?></div>
    <div>Date d'inscription de l'utilisateur: <?= $user['dateUser'] ?></div>
    <div>Identifiant de l'utilisateur: <?= $user['idUser'] ?></div>
    <br>

<?php endforeach;?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>