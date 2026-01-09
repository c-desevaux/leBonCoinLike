<?php
    require_once 'Modele/Modele.class.php';

//--------------------------------------MAIN PAGES CONTROLLER-------------------------------

    function homePage(){

        if(!UserModele::getUserByEmail('admin@admin.com')){
            UserModele::addUser('admin', 'admin@admin.com', 'Admin999**');
        }
        require 'Vue/vueHome.php';
    }

    function wipPage(){
        require 'Vue/wipPage.php';
    }

    function errorPage(){
        require 'Vue/vueError.php';
    }

    function errorManager(){
        if(isset($_GET['id'])){
            if(((str_contains($_GET['action'], 'User') && !isUserExist($_GET['id'])) || (str_contains($_GET['action'], 'Ad') && !isAdExist($_GET['id'])) )){
                errorPage();
            }
        }
    }

    function accountPage(){
        $msg='';
        require 'Vue/vueAccountForm.php';
    }


    function validation($pseudo, $email, $pwd){
       $msg='';
        if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/u', $pwd)){
            if(userAdd($pseudo, $email, $pwd)){
                require 'Vue/vueAccountCreated.php';
            }else{
                $msg='Erreur lors de la création du profil';
            }
        }else{
            $msg='Mot de passe trop faible';
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
            
            if(password_verify($pwd, $user['pwUser'])){
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

    //----------------------------BOOLEAN CONNEXION AND AUTHORISATION------------------------

    function isLogged(){
        if(isset($_SESSION) && isset($_SESSION['login']) && $_SESSION['login']){
                return true;
        }else{
                return false;
        }
    }

    function isAuthorised($id){
        if(($id == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']) || ($_SESSION['login']=="admin@admin.com")){
            return true;
        }else{
            return false;
        }
    }

    function isAdmin(){
        if(isLogged() && $_SESSION['login']=="admin@admin.com"){
            return true;
        }else{
            return false;
        }
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
        if($ad){
            $ad=$ad[0];
            $user = UserModele::getUserById($ad['idUser']);
            $user = $user[0];
            $pics = PictureModele::getPictureByAdId($id);
            require 'Vue/adDetail.php';
        }
    }

    function newAd(){
        $msg="";
        require 'Vue/adCreation.php';
    }

    function addAd(string $title, string $desc, float $price, int $userId, $pics){
        $msg="";
        
        if(strlen($title)>1 && strlen($desc)>2 && $price>=0){
            $ad = AdModele::addAd($title, $desc, $price, $userId);
            $ad = AdModele::getAdById($ad->getId());
            $ad = $ad[0];
            if($pics){
                picAdd($ad['idAd']);
            }
            $user = UserModele::getUserById($userId);
            $user=$user[0];
            adDetail($ad['idAd']);
        }else{
            $msg.="Le(s) champ(s): ";
            if(!(strlen($title)>1)){
                $msg.="TITRE ";
            }if(!(strlen($desc)>2)){
                $msg.="DESCRIPTIF ";
            }if(!($price>=0)){
                $msg.="PRIX ";
            }
            $msg.="est/sont incorrect(s)";

            require 'Vue/adCreation.php';
            }
        
    }

    function editAd(int $id){
        $msg="";
        $ad = AdModele::getAdById($id);
        $ad=$ad[0];
        require 'Vue/adEdit.php';
    }

    function editAdValidation(int $id, string $title, string $txt, float $price, int $idUser){

        if(strlen($title)>1 && strlen($txt)>2 && $price>=0){
            $ad = AdModele::updateAd($id, $title, $txt, $price, $idUser);
            adDetail($id);
        }else{
            $msg="Champs incorrect";
            $ad = AdModele::getAdById($id);
            $ad=$ad[0];
            require 'Vue/adEdit.php';
        }
       
        
    }

    function adDelete(int $id){
        $ad = AdModele::deleteAdById($id);
        adList();
    }

    function isAdExist($id){
        if(AdModele::getAdById($id)){
            return true;
        }else{
            return false;
        }
    }



//-------------------------------------------USER CONTROLERS----------------------------------------
    function userList(){
        if(isAdmin()){
            $users = UserModele::getAllUsers();
            require 'Vue/userList.php';
        }else{
            require 'Vue/vueHome.php';
        }
        
    }

    function userDetail(int $id){
        $user = UserModele::getUserById($id);
        $user=$user[0];
        $count = AdModele::getNbAdByUser($id);
        $count=$count[0];
        require 'Vue/userDetail.php';
    }

    function userDelete(int $id){

        if(islogged() && $id == UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']){
            $_SESSION['login']="";
            $user = UserModele::deleteUserById($id);
            homePage();
        }else if(isAdmin()){
            $user = UserModele::deleteUserById($id);
            userList();
        }
        
    }

    function editUser(int $id){
        $msg="";
        $user = UserModele::getUserById($id);
        $user = $user[0];
        require 'Vue/userEdit.php';
    }

    function editUserValidation(int $idUser, string $pseudUser, string $emailUser, string $pwUser){
        
        if(strlen($pseudUser)>2){
            $user = UserModele::updateUser($idUser, $pseudUser, $emailUser, $pwUser);
            userDetail($idUser);
        }else{
            $msg="Champs incorrect";
            $user = UserModele::getUserById($idUser);
            $user = $user[0];
            require 'Vue/userEdit.php';
        }
        
    }

    function userAdd($pseudo, $email, $pwd){
        $user =UserModele::addUser($pseudo, $email, $pwd);
        return $user;
    }

    function isUserExist($id){
        if(UserModele::getUserById($id)){
            return true;
        }else{
            return false;
        }
    }

//----------------------------------PICTURE CONTROLER---------------------------------

    function picAdd($idAd){

        if($_FILES['pic']['error'] === 0){
            $source = $_FILES['pic']['tmp_name'];
            $originalName = $_FILES['pic']['name'];
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);

            $rename = substr(password_hash($source, PASSWORD_BCRYPT), 10, 10);
            $rename = str_replace(['/', '.', '$'], '0', $rename);
            $rename .= rand(0, 10000);

            $finalName = $rename. "." . $extension;  
            $destination = "img/".$finalName;


            if(move_uploaded_file($source, $destination)){
                PictureModele::addPictureId($idAd, $finalName);
            }

        }

    }
    