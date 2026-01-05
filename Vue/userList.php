
<?php $title="User List"; ?>

<?php ob_start(); ?>

<h1>Liste des utilisateurs</h1>

<?php if($users){foreach ($users as $user): ?>

    <div><?= $user['pseudUser'] ?></div>
    <a class="btn del" href="index.php?action=detailUser&id=<?= $user['idUser'] ?>">Détail</a>
    <a class="btn del" href="index.php?action=delUser&id=<?= $user['idUser'] ?>">Suprimer</a>
    <br>

<?php endforeach;}?>


<a class="btn back" href="index.php?action=userList">Retour</a>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>