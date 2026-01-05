<?php
    require_once 'Modele/Modele.class.php';



    function homePage(){
        require 'Vue/vueHome.php';
    }

    
//-------------------------------------------ADS CONTROLERS-----------------------------------------
    function adList(){
        $ads  = AdModele::getAllAds();
        require 'Vue/adList.php';
    }

    function adDetail(int $id){
        $ad = AdModele::getAdById($id);
        $ad=$ad[0];
        require 'Vue/adDetail.php';
    }

    function adDelete(int $id){
        $ad = AdModele::deleteAdById($id);
        adList();
    }



//-------------------------------------------USER CONTROLERS----------------------------------------
    function userList(){
        $users = UserModele::getAllUsers();
        require 'Vue/userList.php';
    }

    function userDetail(int $id){
        $user = UserModele::getUserById($id);
        $user=$user[0];
        require 'Vue/userDetail.php';
    }

    function userDelete(int $id){
        $user = UserModele::deleteUserById($id);
        userList();
    }
    