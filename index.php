<?php
    
    require_once 'DB/LBCL.php';
    require_once 'Modele/Modele.class.php';
    require_once 'Modele/AdModele.class.php';
    require_once 'Modele/UserModele.class.php';
    require_once 'Modele/PictureModele.class.php';
    require_once 'Controler/Controler.class.php';

    session_start();

    try{
        if(isset($_GET['action'])){
            
            
            if($_GET['action'] == 'listUser'){
                userList();
            }else if($_GET['action'] == 'listAd'){
                adList();
            }else if($_GET['action'] == 'adListByUser'){
                errorManager();
                adListByUser($_GET['idUser']);
            }else if($_GET['action'] == 'delete'){
                deleteConfirm($_POST['toDelete'], $_POST['id']);
            }else if($_GET['action'] == 'delUser'){
                userDelete($_POST['id']);
            }else if($_GET['action'] == 'editUser'){
                editUser($_POST['idUser']);
            }else if($_GET['action'] == 'editUserValidation'){
                editUserValidation($_POST['idUser'], $_POST['pseudUser'], $_POST['emailUser'],$_POST['pwUser']);
            }else if($_GET['action'] == 'delAd'){
                adDelete($_POST['id']);
            }else if($_GET['action'] == 'newAd'){
                newAd();
            }else if($_GET['action'] == 'addAd'){
                if(isset($_FILES['pic'])){
                    addAd($_POST['titleAd'], $_POST['txtAd'], (float)$_POST['priceAd'], $_POST['idUser'], $_FILES['pic']['name']);
                }else{
                    addAd($_POST['titleAd'], $_POST['txtAd'], (float)$_POST['priceAd'], $_POST['idUser'], "");
                }
            }else if($_GET['action'] == 'editAd'){
                editAd($_GET['id']);
            }else if($_GET['action'] == 'editAdValidation'){
                editAdValidation($_POST['idAd'], $_POST['titleAd'], $_POST['txtAd'], (float)$_POST['priceAd'], UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']);
            }else if($_GET['action'] == 'detailUser'){
                errorManager();
                userDetail($_GET['id']);
            }else if($_GET['action'] == 'selfUser'){
                userDetail(UserModele::getUserByEmail($_SESSION['login'])[0]['idUser']);
            }else if($_GET['action'] == 'detailAd'){
                errorManager();
                adDetail($_GET['id']);
            }else if($_GET['action'] == 'account'){
                accountPage();
            }else if($_GET['action'] == 'validation'){
                validation($_POST['pseudUser'], $_POST['emailUser'], $_POST['pwUser']);
            }else if($_GET['action'] == 'login'){
                loginPage();
            }else if($_GET['action'] == 'connexion'){
                connexion($_POST['emailUser'], $_POST['pwUser']);
            }else if($_GET['action'] == 'logout'){
                logout();
            }else if($_GET['action'] == 'wip'){
                wipPage();
            }else{
                homePage();
            }
        }else{
            homePage();
        }
    }catch(Exception $e){
        die("Err: ".$e->getMessage());
    }
    

    
    
    
