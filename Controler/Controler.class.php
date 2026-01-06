<?php
    require_once 'Modele/Modele.class.php';



    function homePage(){
        require 'Vue/vueHome.php';
    }

    function isLogged(){
        if(isset($_SESSION) && isset($_SESSION['login']) && $_SESSION['login']){
                return true;
        }else{
                return false;
        }
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
        $msg="";
        require 'Vue/vueLogin.php';
    }

    function connexion($email, $pwd){
        $user = UserModele::getUserByEmail($email);
        if(isset($user)){
            $user=$user[0];
            if($user['pwUser'] == $pwd){
                $_SESSION['login']=$email;
                require 'Vue/loginSuccess.php';
            }else{
                $msg="identifiant ou mot de passe incorrect";
                require 'Vue/vueLogin.php';
            }
        }else{
                $msg="identifiant ou mot de passe incorrect";
                require 'Vue/vueLogin.php';
            }
    }

    function logout(){
        $_SESSION['login']="";
        $msg="Connectez vous à un autre compte";
        require 'Vue/vueLogin.php';
    }

    function deleteConfirm($toDelete, $id){
        if($toDelete == "Ad"){
            $x=AdModele::getAdById($id);
            $x=$x[0];
            $name=$x['titleAd'];
        }else if($toDelete == "User"){
            $x=UserModele::getUserById($id);
            $x=$x[0];
            $name=$x['pseudUser'];
        }
        
        require 'Vue/deleteConfirm.php';
    }

    
//-------------------------------------------ADS CONTROLERS-----------------------------------------
    function adList(){
        $ads  = AdModele::getAllAds();
        require 'Vue/adList.php';
    }

    function adListByUser($userId){
        $ads = AdModele::getAdByUserId($userId);
        require 'Vue/adList.php';
    }

    function adDetail(int $id){
        $ad = AdModele::getAdById($id);
        $ad=$ad[0];
        $user = UserModele::getUserById($ad['idUser']);
        $user = $user[0];
        require 'Vue/adDetail.php';
    }

    function newAd(){
        require 'Vue/adCreation.php';
    }

    function addAd(string $title, string $desc, float $price, int $userId){
        $ad = AdModele::addAd($title, $desc, $price, $userId);
        $ad = AdModele::getAdById($ad->getId());
        $ad = $ad[0];
        $user = UserModele::getUserById($userId);
        $user=$user[0];
        require 'Vue/adDetail.php';
    }

    function editAd(int $id){
        $ad = AdModele::getAdById($id);
        $ad=$ad[0];
        require 'Vue/adEdit.php';
    }

    function editAdValidation(int $id, string $title, string $txt, float $price){
       $ad = AdModele::updateAd($id, $title, $txt, $price);
        adDetail($id);
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
        $count = AdModele::getNbAdByUser($id);
        $count=$count[0];
        require 'Vue/userDetail.php';
    }

    function userDelete(int $id){
        $user = UserModele::deleteUserById($id);
        userList();
    }

    function userAdd($pseudo, $email, $pwd){
        $user =UserModele::addUser($pseudo, $email, $pwd);
        return $user;
    }
    