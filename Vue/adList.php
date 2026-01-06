
<?php $title="Ad List"; ?>

<?php ob_start(); ?>

<h1>Liste des annonces</h1>

<?php if($ads):foreach ($ads as $ad): ?>

    <div><?= $ad['titleAd'] ?></div>
    <div><?= $ad['priceAd'] ?>€</div>
    <a class="btn del" href="index.php?action=detailAd&id=<?= $ad['idAd'] ?>">Voir annonce</a>
    <a class="btn del-add" href="index.php?action=delAd&id=<?= $ad['idAd'] ?>"
    data-confirm="Êtes-vous sûr de vouloir supprimer cette annonce ?">Suprimer annonce</a>
    <br>

<?php endforeach; else: ?>
    <div>Aucune annonce disponible</div>
<?php endif; ?>

<a class="btn back" href="index.php?action=home">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php
        if(isLogged()){
                require 'Vue/templateLogin.php';
        }else{
                require 'Vue/templateLogout.php';
        };
?>