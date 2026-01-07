
<?php $title=$user['pseudUser']; ?>


<?php ob_start(); ?>

    <h1><?= $title ?></h1>


    
    <div>Email de l'utilisateur: <?= $user['emailUser'] ?></div>
    <div>Date d'inscription de l'utilisateur: <?= $user['dateUser'] ?></div>
    <div>Nombre d'annonce(s) de l'utilisateur: <?= $count ?></div>
    <br>
    <div>
        
    <?php if(isLogged() && $user['idUser'] == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']):?>
        
        <div class="d-flex">
            <form method="POST" action="index.php?action=editUser">
                <input type="hidden" name="idUser" value="<?= $user['idUser'] ?>">
                <button class="btn del-user" type="submit">Modifier mon compte</button>
            </form>
            
            <form method="POST" action="index.php?action=delete">
                <input type="hidden" name="id" value=<?= $user['idUser'] ?>>
                <input type="hidden" name="toDelete" value="User">
                <button class="btn del-add" type="submit">Suprimer mon compte</button>
            </form>
        </div>
        
        <a class="btn del" href="index.php?action=adListByUser&idUser=<?=$user['idUser']?>">Toutes mes annonces</a>
        <a class="btn del-user" href="index.php?action=newAd">Publier une annonce</a>
    <?php else:?>
        <a class="btn del" href="index.php?action=adListByUser&idUser=<?=$user['idUser']?>">Toutes les annonces de <?= $user['pseudUser'] ?></a>
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