
<?php $title="Le Presque Bon Coin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur le presque bon coin</h1>

<a class="btn" href="index.php?action=userList">Afficher la liste des utilisateurs</a>
<a class="btn" href="index.php?action=adList">Afficher la liste des annonces</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>