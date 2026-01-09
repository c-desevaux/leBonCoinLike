
<?php $title="Edit Ad"; ?>

<?php ob_start(); ?>

<div class="d-flex flex-column justify-content-center align-items-center w-50">
    <h1><?= $ad['titleAd'] ?></h1>

    <form class="form d-flex flex-column justify-content-center align-items-left w-100" method="POST" action="index.php?action=editAdValidation">
        <div class="d-flex flex-column">
            <label for="title">Titre</label>
            <input class="edit w-100" id="title" name="titleAd" value="<?= $ad['titleAd'] ?>">
        </div>
        <br>
        <div class="d-flex flex-column">
            <label for="description">Descriptif</label>
            <textarea id="description" name="txtAd" class="w-100"><?= $ad['txtAd'] ?></textarea>
        </div>
        <br>
        <div class="d-flex flex-column">
            <label for="price">Prix</label>
            <input class="edit w-100" id="price" name="priceAd" value="<?= $ad['priceAd'] ?>">
        </div>
        <input type="hidden" name="idAd" value="<?= $ad['idAd'] ?>">
        <div class="d-flex justify-content-center"><?= $msg ?></div>
        <br>
        <div class="d-flex justify-content-center">
            <button class="btn del" type="submit">Valider</button>
        </div>
    </form>
    
</div>

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