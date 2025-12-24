
<?php $title="Ads List"; ?>

<?php ob_start(); ?>


<?php foreach ($ads as $ad): ?>

    <div>Titre de l'annonce: <?= $ad['titleAd'] ?></div>
    <div>Description de l'annonce: <?= $ad['txtAd'] ?></div>
    <div>Date de création de l'annonce: <?= $ad['dateAd'] ?></div>
    <div>Prix de l'annonce: <?= $ad['priceAd'] ?></div>
    <div>Identifiant de l'annonce: <?= $ad['idAd']?></div>
    <div>Identifiant de l'auteur de l'annonce: <?=  $ad['idUser']?></div>
    <br>

<?php endforeach;?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>