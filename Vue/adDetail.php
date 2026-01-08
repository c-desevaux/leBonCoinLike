
<?php $title=$ad['titleAd']; ?>

<?php ob_start(); ?>

    <h1><?= $ad['titleAd'] ?></h1>

    <div class="img-container">
        <?php if($pics):foreach ($pics as $pic): ?>
            <img src="img/<?= $pic['namePic'] ?>" id="<?= $pic['idPic'] ?>" alt="<?= $ad['titleAd'] ?>">
        <?php endforeach; endif;?>
    </div>
    <br>

    <div class="d-flex justify-content-center w-75"><?= $ad['txtAd'] ?></div>
    <div>Date: <?= $ad['dateAd'] ?></div>
    <div>Prix: <?= $ad['priceAd'] ?>€</div>
    <div>Annonce de: <?= $user['pseudUser']?></div>
    <div>
        <br>
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
    <a class="btn back">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php
        if(isLogged()){
                if($_SESSION['login']=="admin@admin.com"){
                    require 'Vue/templateAdmin.php';
                }else{
                    require 'Vue/templateLogin.php';
                }
        }else{
                require 'Vue/templateLogout.php';
        };
?>