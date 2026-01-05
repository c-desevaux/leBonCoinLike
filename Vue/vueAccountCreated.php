<?php $title="Login";?>

<?php ob_start(); ?>

    <h1>Votre compte a bien été créer</h1>
    <a class="btn del" href="index.php?action=login">Login</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>