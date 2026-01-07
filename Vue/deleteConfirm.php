
<?php $title="ATTENTION"; ?>

<?php ob_start(); ?>



    <div>  
        
        <h1>Suppression de: <?= $name ?></h1>
    

        
        <h2>Etes vous sur de vouloir continuer ?</h2>
        <div>
            <form method="POST" action="index.php?action=del<?= $toDelete ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button class="btn del" type="submit">oui</button>
            </form>
            <?php if($toDelete=="User"):?>
                <a class="btn del" href="index.php?action=selfUser">non</a>
            <?php else:?>
                <a class="btn del" href="index.php?action=list<?= $toDelete ?>">non</a>
            <?php endif;?>
        </div>


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