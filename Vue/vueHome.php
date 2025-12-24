
<?php $title="Le Presque Bon Coin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur le presque bon coin</h1>

<a href="index.php?action=userList">Afficher la liste des utilisateur</a>
<a href="index.php?action=adList">Afficher la liste des annonces</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>