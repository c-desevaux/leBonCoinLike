<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';



    print_r(DbLBCL::getConnexion());

    $users = new Modele();
    print_r($users->getAllUsers());