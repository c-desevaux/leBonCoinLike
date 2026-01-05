<?php $title="Login";?>

<?php ob_start(); ?>

<h1>Connexion à votre compte</h1>

<form method="POST" action="index.php/?action=validation">
    <div>
        <label for="email">Votre email</label>
        <input id="email" name="emailUser" type="email" placeholder="gotaga@M8.com" required>
    </div>
    <div>
        <label for="pwd">Votre mot de passe</label>
        <input id="pwd" name="pwUser" type="password" placeholder="********" required>
    </div>
   
    <button class="btn" id="btn-submit-account" type="submit">Connexion</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php' ?>