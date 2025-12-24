<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';



    
 

 

    
    print_r(UserModele::getAllUsers());
    echo "<br> <br> <br>";
    print_r(AdModele::getAllAds());

   
    echo "<br> <br> <br>";
    print_r(UserModele::getAllUsers());