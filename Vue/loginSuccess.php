
<?php $title="Connexion réussie"; ?>

<?php ob_start(); ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>  
        <h1 class="welcome-title">Bienvenue <?= $user['pseudUser'] ?></h1>
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