
<?php $title="Le Presque Bon Coin"; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur le presque bon coin</h1>

<a class="btn home d-flex justify-content-center align-items-center" href="index.php?action=account">Créer un compte</a>
<a class="btn home d-flex justify-content-center align-items-center" href="index.php?action=login">Se connecter</a>

<?php $content = ob_get_clean(); ?>

<?php
        if(isLogged()){
                require 'Vue/templateLogin.php';
        }else{
                require 'Vue/templateLogout.php';
        };
?>