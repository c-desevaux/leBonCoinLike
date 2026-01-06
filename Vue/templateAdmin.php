<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <nav class="d-flex justify-content-center align-items-center gap-3 p-3" id="nav-bar">
        <a class="btn nav-btn" href="index.php?action=home">Accueil</a>
        <a class="btn nav-btn" href="index.php?action=listAd">Annonces</a>
        <a class="btn nav-btn" href="index.php?action=listUser">Utilisateurs</a>
        <a class="btn nav-btn" href="index.php?action=login">Se connecter</a>
        
    </nav>
    <br>
    <div class="d-flex flex-column justify-content-center align-items-center pb-3" id='content'>
        <?= $content ?>
    </div>


    


    <!-- Correction affichage fond input MacOS -->
    <script>
        document.querySelectorAll('input[type="text"], input[type="password"]').forEach(input => {
            if (navigator.platform.toUpperCase().indexOf('MAC') >= 0) {
                input.style.backgroundColor = '#fff'; // force le fond blanc
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>