
<?php $title="User List"; ?>

<?php ob_start(); ?>

    <h1>Liste des utilisateurs</h1>

    <?php if($users):foreach ($users as $user): ?>

        <?php if(!($user['emailUser'] == "admin@admin.com")):?>
            <div><?= $user['pseudUser'] ?></div>
            <a class="btn del" href="index.php?action=detailUser&id=<?= $user['idUser'] ?>">Détails</a>
            <a class="btn del-user" href="index.php?action=delUser&id=<?= $user['idUser'] ?>">Suprimer</a>
            <br>
        <?php endif;?>
        

    <?php endforeach; else: ?>
        <div>Aucun utilisateur disponible</div>
    <?php endif; ?>


    <a class="btn back" href="index.php?action=home">Retour</a>
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