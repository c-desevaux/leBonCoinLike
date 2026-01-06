
<?php $title=$user['pseudUser']; ?>



<?php ob_start(); ?>

    <h1><?= $title ?></h1>


    
    <div>Email de l'utilisateur: <?= $user['emailUser'] ?></div>
    <div>Date d'inscription de l'utilisateur: <?= $user['dateUser'] ?></div>
    <div>Nombre d'annonce(s) de l'utilisateur: <?= $count ?></div>
    <div>
        

    <?php if(isLogged() && $user['idUser'] == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']):?>
        <a class="btn del" href="index.php?action=adListByUser&idUser=<?=$user['idUser']?>">Toutes mes annonces</a>
        <a class="btn del-user" href="index.php?action=delUser&id=<?= $user['idUser'] ?>">Suprimer mon compte</a>
    <?php else:?>
        <a class="btn del" href="index.php?action=adListByUser&idUser=<?=$user['idUser']?>">Toutes les annonces de <?= $user['pseudUser'] ?></a>
    <?php endif;?>
        
    </div>

    <br>
    <a class="btn back" href="index.php?action=adListByUser&idUser=<?= $user['idUser'] ?>">Retour</a>

<?php $content = ob_get_clean(); ?>



<?php
        if(isLogged()){
                require 'Vue/templateLogin.php';
        }else{
                require 'Vue/templateLogout.php';
        };
?>