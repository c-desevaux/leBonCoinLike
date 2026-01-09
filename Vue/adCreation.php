
<?php $title="Ad Creation"; ?>

<?php ob_start(); ?>

<div class="d-flex flex-column justify-content-center align-items-center">
    <h1>Votre annonce</h1>

    <form class="form d-flex flex-column justify-content-center align-items-left" method="POST" action="index.php?action=addAd" enctype="multipart/form-data">
        <div class="d-flex flex-column">
            <label for="title">Titre</label>
            <input class="edit" id="title" name="titleAd">
        </div>
        <br>
        <div class="d-flex flex-column w-100">
            <label for="description">Descriptif</label>
            <textarea id="description" name="txtAd"></textarea>
        </div>
        <br>
        
        <label for="picture">Photos</label>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <input class="w-100" type="file" class="pic-input" name="pic" accept="image/*">
        </div>
        <br>
        <div class="d-flex flex-column w-100">
            <label for="price">Prix</label>
            <input class="edit" id="price" name="priceAd">
        </div>
        <input type="hidden" name="idUser" value="<?= UserModele::getUserByEmail($_SESSION['login'])[0]['idUser'] ?>">
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