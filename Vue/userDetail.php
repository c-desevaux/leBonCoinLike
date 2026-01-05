
<?php $title=$user['pseudUser']; ?>



<?php ob_start(); ?>

    <h1><?= $title ?></h1>


    <div>Pseudo de l'utilisateur: <?= $user['pseudUser'] ?></div>
    <div>Email de l'utilisateur: <?= $user['emailUser'] ?></div>
    <div>Date d'inscription de l'utilisateur: <?= $user['dateUser'] ?></div>
    <div>Identifiant de l'utilisateur: <?= $user['idUser'] ?></div>
    <div>
        <a class="btn del" href="index.php?action=adListByUser&idUser=<?=$user['idUser']?>">Toutes les annonces de <?= $user['pseudUser'] ?></a>
        <a class="btn del-user" href="index.php?action=delUser&id=<?= $user['idUser'] ?>">Suprimer utilisateur</a>
    </div>

    <br>
    <a class="btn back" href="index.php?action=adListByUser&idUser=<?= $user['idUser'] ?>">Retour</a>

<?php $content = ob_get_clean(); ?>



<?php require 'template.php' ?>