<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';



    $users = new UserModele();
    $ads = new AdModele();

 

    
    print_r($users->getAllUsers());
    echo "<br> <br> <br>";
    print_r($ads->getAllAds());

    $users->deleteUserById(6);
    echo "<br> <br> <br>";
    print_r($users->getAllUsers());