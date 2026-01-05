<?php $title="Login";?>

<?php ob_start(); ?>

<div class="d-flex flex-column align-items-center w-75 login-form">
    <h1 class="text-dark log-title p-0 m-0">Connectez-vous à votre compte lepresqueboncoin</h1>
    <br>
    <form class="form d-flex flex-column justify-content-center align-items-center w-100" method="POST" action="index.php/?action=validation">
        <div class="d-flex flex-column w-100">
            <label for="email-login">E-mail *</label>
            <input id="email-login" name="emailUser" type="email" placeholder="gotaga@M8.com" required>
        </div>
        <br>
        <div class="d-flex flex-column w-100">
            <label for="pwd">Votre mot de passe</label>
            <input id="pwd" name="pwUser" type="password" placeholder="********" required>
            <a class="mdp text-muted" href="#">Mot de passe oublié</a>
        </div>
    <br>
        <button class="btn btn-title w-100" id="btn-submit-account" type="submit">Connexion</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>