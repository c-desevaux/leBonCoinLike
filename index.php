<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';

    print_r(UserModele::getUserByPseudo('corentin'));
    echo "<br><br><br>";

    UserModele::deleteUserByName('corentin');
    UserModele::addUser('corentin', 'coco@gmail.com', 'hHefhehef8222++');

    print_r(UserModele::getUserByPseudo('corentin'));

