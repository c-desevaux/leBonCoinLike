<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';



    print_r(DbLBCL::getConnexion());

    $users = new UserModele();
    $ads = new AdModele();
    
    print_r($users->getAllUsers());
    print_r($ads->getAllAds());