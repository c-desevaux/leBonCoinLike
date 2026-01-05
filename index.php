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
                adList();
            }else if($_GET['action'] == 'adListByUser'){
                adListByUser($_GET['idUser']);
            }else if($_GET['action'] == 'delUser'){
                userDelete($_GET['id']);
            }else if($_GET['action'] == 'delAd'){
                adDelete($_GET['id']);
            }else if($_GET['action'] == 'detailUser'){
                userDetail($_GET['id']);
            }else if($_GET['action'] == 'detailAd'){
                adDetail($_GET['id']);
            }else{
                homePage();
            }
        }else{
            homePage();
        }
    }catch(Exception $e){
        die("Err: ".$e->getMessage());
    }
    

    
    
    
