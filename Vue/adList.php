
<?php $title="Ad List"; ?>

<?php ob_start(); ?>

<h1>Liste des annonces</h1>

<?php if($ads):foreach ($ads as $ad): ?>

    <div><?= $ad['titleAd'] ?></div>
    <div><?= $ad['priceAd'] ?>€</div>
    <a class="btn del" href="index.php?action=detailAd&id=<?= $ad['idAd'] ?>">Voir annonce</a>

    <?php if(isLogged() && $ad['idUser'] == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']):?>
        <form method="POST" action="index.php?action=delete">
            <input type="hidden" name="id" value=<?= $ad['idAd'] ?>>
            <input type="hidden" name="toDelete" value="Ad">
            <button class="btn del-add">Suprimer annonce</button>
        </form>
        
    <?php endif;?> 
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