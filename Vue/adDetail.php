
<?php $title=$ad['titleAd']; ?>

<?php ob_start(); ?>

    <h1><?= $ad['titleAd'] ?></h1>



    <div><?= $ad['txtAd'] ?></div>
    <div>Date: <?= $ad['dateAd'] ?></div>
    <div>Prix: <?= $ad['priceAd'] ?>€</div>
    <div>Annonce de: <?= $user['pseudUser']?></div>
    <br>
    <div>
        <a class="btn del" href="index.php?action=detailUser&id=<?=  $ad['idUser']?>">Voir le profil de l'annonceur(e)</a>
       
        <?php if(isLogged() && $ad['idUser'] == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']):?>
            <form method="POST" action="index.php?action=delete">
                <input type="hidden" name="id" value=<?= $ad['idAd'] ?>>
                <input type="hidden" name="toDelete" value="Ad">
                <button class="btn del-add" type="submit">Suprimer l'annonce</button>
            </form>
            <a class="btn del-add" href="index.php?action=editAd&id=<?= $ad['idAd'] ?>">Editer l'annonce</a>
        <?php endif;?> 
        
    </div>

    <br>
    <a class="btn back" href="index.php?action=listAd">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php
        if(isLogged()){
                require 'Vue/templateLogin.php';
        }else{
                require 'Vue/templateLogout.php';
        };
?>