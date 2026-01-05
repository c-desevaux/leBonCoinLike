
<?php $title="Le Presque Bon Coin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur le presque bon coin</h1>

<a class="btn home" href="index.php?action=account">Créer un compte</a>
<a class="btn home" href="index.php?action=login">Se connecter</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>