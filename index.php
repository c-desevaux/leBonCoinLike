<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';
    require_once 'Controler/Controler.class.php';

    //print_r(UserModele::getAllUsers());
    echo "<br><br><br>";

    //UserModele::deleteUserByName('corentin');
    //UserModele::addUser('tristan', 'tristan.tristan@gmail.com', 'Caca08++');
    //print_r(UserModele::getUserByPseudo('tristan'));
    //print_r(UserModele::getUserByPseudo('tristan')[0]['idUser']);

    
    
    //AdModele::addAd('Fifa 15', 'jeu en tres bon etat a vendre sur region ebreuïtienne', 13.99, UserModele::getUserByPseudo('tristan')[0]['idUser']);
    //print_r(AdModele::getAdByTitle('Fifa'));

    echo "<body style='background-color: lightblue;'></body>";

    print_r(UserModele::getAllUsers());

    echo "<br><br><br>";

    adsList();
    userList();
    
