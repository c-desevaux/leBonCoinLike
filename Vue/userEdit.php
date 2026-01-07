
<?php $title="Modification du profile"; ?>

<?php ob_start(); ?>

    <div>  
        <h1>Modification du Profil</h1>

        <form class="form d-flex flex-column" method="POST" action="index.php?action=editUserValidation">
            <label for="pseudoEdit">Votre pseudo</label>
            <input id="pseudoEdit" name="pseudUser" value="<?= $user['pseudUser'] ?>">
            <input type="hidden" name="idUser" value="<?= $user['idUser'] ?>">
            <input type="hidden" name="emailUser" value="<?= $user['emailUser'] ?>">
            <input type="hidden" name="pwUser" value="<?= $user['pwUser'] ?>">
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