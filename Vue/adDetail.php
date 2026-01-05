
<?php $title=$ad['titleAd']; ?>

<?php ob_start(); ?>

    <h1><?= $ad['titleAd'] ?></h1>



    <div>Titre de l'annonce: <?= $ad['titleAd'] ?></div>
    <div>Description de l'annonce: <?= $ad['txtAd'] ?></div>
    <div>Date de création de l'annonce: <?= $ad['dateAd'] ?></div>
    <div>Prix de l'annonce: <?= $ad['priceAd'] ?>€</div>
    <div>Identifiant de l'annonce: <?= $ad['idAd']?></div>
    <div>Identifiant de l'auteur de l'annonce: <?=  $ad['idUser']?></div>
    <div>
        <a class="btn del" href="index.php?action=detailUser&id=<?=  $ad['idUser']?>">Voir le profil de l'annonceur(e)</a>
        <a class="btn del-add" href="index.php?action=delAd&id=<?= $ad['idAd'] ?>"
        data-confirm="Êtes-vous sûr de vouloir supprimer cette annonce ?">Suprimer l'annonce</a>
    </div>

    <br>
    <a class="btn back" href="index.php?action=adList">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>