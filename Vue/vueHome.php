
<?php $title="Le Presque Bon Coin"; ?>

<?php ob_start(); ?>


<?php if(!isAdmin()):?>
    <h1 class="welcome-title">Bienvenue
        <?php if(isset($user)): ?>
            <?= $user['pseudUser'] ?>
        <?php endif; ?>
        <br> sur le presque bon coin</h1>
    <?php if(isLogged()): ?>
        <a class="btn del-user" href="index.php?action=newAd">Publier une annonce</a>
    <?php else: ?>
        <a class="btn home d-flex justify-content-center align-items-center" href="index.php?action=account">Créer un compte</a>
    <?php endif;?>
<?php else:?>
    <h1>Compte administrateur root</h1>
<?php endif;?>


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