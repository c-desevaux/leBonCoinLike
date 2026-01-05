<?php
    require_once 'Modele/Modele.class.php';



    function homePage(){
        require 'Vue/vueHome.php';
    }

    function accountPage(){
        require 'Vue/vueAccountForm.php';
    }

    function validation($pseudo, $email, $pwd){
        if(userAdd($pseudo, $email, $pwd)){
            require 'Vue/vueAccountCreated.php';
        }else{
            require 'Vue/vueAccountForm.php';
        }
    }

    function loginPage(){
        require 'Vue/vueLogin.php';
    }

    
//-------------------------------------------ADS CONTROLERS-----------------------------------------
    function adList(){
        $ads  = AdModele::getAllAds();
        require 'Vue/adList.php';
    }

    function adListByUser($userId){
        $ads =AdModele::getAdByUserId($userId);
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

    function userAdd($pseudo, $email, $pwd){
        $user = UserModele::addUser($pseudo, $email, $pwd);
        if(isset($user)){
            return true;
        }else{
            throw new UserException("Erreur lors de la création de l'utilisateur");
            return false;
        }
    }
    