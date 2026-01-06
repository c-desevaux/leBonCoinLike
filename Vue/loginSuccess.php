
<?php $title="Connexion réussie"; ?>

<?php ob_start(); ?>

    <div>  
        <h1>Bienvenu(e) <?= $user['pseudUser'] ?></h1>
    </div>

<?php $content = ob_get_clean(); ?>

<?php
        if(isLogged()){
                require 'Vue/templateLogin.php';
        }else{
                require 'Vue/templateLogout.php';
        };
?>