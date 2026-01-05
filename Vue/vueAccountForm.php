<?php $title="Registration";?>

<?php ob_start(); ?>

<div class="d-flex flex-column align-items-center w-75 login-form">
    <h1 class="text-dark log-title p-0 m-0">Créez votre compte</h1>
    <br>
    <form class="form d-flex flex-column justify-content-center align-items-center w-100" method="POST" action="index.php?action=validation">
        <div class="d-flex flex-column w-100">
            <label for="pseudo">Votre pseudo</label>
            <input class="form-control" id="pseudo" name="pseudUser" type="text" placeholder="gotaga" required>
        </div>
        <br>
        <div class="d-flex flex-column w-100">
            <label for="email">Votre email</label>
            <input id="email" name="emailUser" type="email" placeholder="gotaga@M8.com" required>
        </div>
        <br>
        <div class="d-flex flex-column w-100">
            <label for="pwd">Votre mot de passe</label>
            <input id="pwd" name="pwUser" type="password" placeholder="********" required>
        </div>
        <br>
        <button class="btn btn-title w-100" id="btn-submit-account" type="submit">Créer</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>