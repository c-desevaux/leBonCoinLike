
<?php $title="Ad List"; ?>

<?php ob_start(); ?>

<h1>Liste des annonces</h1>

<div class="d-flex justify-content-center">
    <?php if($ads):foreach ($ads as $ad): ?>

        <div class="d-flex flex-column justify-content-center align-items-center mx-3">
            <div class="title"><?= $ad['titleAd'] ?></div>

            <?php if($pics):foreach($pics as $picture):?>
                <?php if($picture['idAd'] == $ad['idAd']):?>
                    <div class="img-container list">
                        <img src="img/<?= $picture['namePic'] ?>" id="<?= $picture['idPic'] ?>" alt="<?= $ad['titleAd'] ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; endif;?>

            <div><?= $ad['priceAd'] ?>€</div>
            <a class="btn del" href="index.php?action=detailAd&id=<?= $ad['idAd'] ?>">Voir annonce</a>

            <?php if(isLogged() && ($ad['idUser'] == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser'] || isAdmin())):?>
                <form method="POST" action="index.php?action=delete">
                    <input type="hidden" name="id" value=<?= $ad['idAd'] ?>>
                    <input type="hidden" name="toDelete" value="Ad">
                    <button class="btn del-add">Suprimer annonce</button>
                </form>
                
            <?php endif;?> 
        </div>
        <br>
    <?php endforeach; else: ?>
        <div>Aucune annonce disponible</div>
    <?php endif; ?>
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