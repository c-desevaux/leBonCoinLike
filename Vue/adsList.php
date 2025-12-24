
<?php $title="Ads List"; ?>

<?php ob_start(); ?>

<h1>Liste des annonces</h1>

<?php foreach ($ads as $ad): ?>

    <div>Titre de l'annonce: <?= $ad['titleAd'] ?></div>
    <div>Description de l'annonce: <?= $ad['txtAd'] ?></div>
    <div>Date de création de l'annonce: <?= $ad['dateAd'] ?></div>
    <div>Prix de l'annonce: <?= $ad['priceAd'] ?>€</div>
    <div>Identifiant de l'annonce: <?= $ad['idAd']?></div>
    <div>Identifiant de l'auteur de l'annonce: <?=  $ad['idUser']?></div>
    <br>

<?php endforeach;?>

<a href="index.php?action=home">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>