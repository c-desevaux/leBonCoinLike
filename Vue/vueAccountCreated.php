<?php $title="Login";?>

<?php ob_start(); ?>
    <h1>Votre compte a bien été crée</h1>
    <a class="btn del" href="index.php?action=login">Login</a>

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