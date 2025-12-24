<?php

    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';
    require_once 'Controler/Controler.class.php';

    try{
        if(isset($_GET['action'])){
            if($_GET['action'] == 'userList'){
                userList();
            }else if($_GET['action'] == 'adList'){
                adsList();
            }else{
                homePage();
            }
        }else{
            homePage();
        }
    }catch(Exception $e){
        die("Err: ".$e->getMessage());
    }
    

    
    
    
