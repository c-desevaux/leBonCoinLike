<?php
    require_once 'Modele/Modele.class.php';



    function homePage(){
        require 'Vue/vueHome.php';
    }

    
//-------------------------------------------ADS CONTROLERS-----------------------------------------
    function adsList(){
        $ads  = AdModele::getAllAds();
        require 'Vue/adsList.php';
    }

    function adDetail(int $id){
        $ad = AdModele::getAdById($id);
        require 'Vue/adDetail.php';
    }



//-------------------------------------------USER CONTROLERS----------------------------------------
    function userList(){
        $users = UserModele::getAllUsers();
        require 'Vue/userList.php';
    }

    function userDetail(int $id){
        $user = UserModele::getUserById($id);
        require 'Vue/userDetail.php';
    }

    function userDelete(int $id){
        $users = UserModele::deleteUserById($id);
        userList();
    }
    