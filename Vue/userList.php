
<?php $title="User List"; ?>

<?php ob_start(); ?>

    <h1>Liste des utilisateurs</h1>

    <div class="d-flex flex-wrap">
        <?php if($users):foreach ($users as $user): ?>

            <div class="d-flex flex-column justify-content-center align-items-center">
                <?php if(!($user['emailUser'] == "admin@admin.com")):?>
                    <div><?= $user['pseudUser'] ?></div>
                    <a class="btn del" href="index.php?action=detailUser&id=<?= $user['idUser'] ?>">Détails</a>
                    <form method="POST" action="index.php?action=delete">
                        <input type="hidden" name="toDelete" value='User'>
                        <input type="hidden" name="id" value="<?= $user['idUser'] ?>">
                        <button class="btn del-user" type="submit">Suprimer</button>
                    </form>
                    
                    <br>
                    <?php endif;?>
            </div>
            
        <?php endforeach; else: ?>
            <div>Aucun utilisateur disponible</div>
        <?php endif; ?>
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