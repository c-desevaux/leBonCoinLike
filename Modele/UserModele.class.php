<?php

    require_once 'Modele.class.php';

    class UserModele extends Modele {

        private static $tableName = "user_";
        private static $idName = "idUser";



//---------------------------------------------GET FUNCTIONS-------------------------------------------------
        public static function getAllUsers(){
            return parent::getAll(self::$tableName);
        }

        public static function getUserById(int $id){
            return parent::getBy(self::$tableName, self::$idName, $id);
        }

        public static function getUserByPseudo(string $pseudo){
            $pseudo = "%".$pseudo."%";
            return parent::getLike(self::$tableName,"pseudUser",$pseudo);
        }


//-------------------------------------------DELETE FUNCTIONS------------------------------------------------        
        public static function deleteUserById(int $id): void{
            parent::delete(self::$tableName, self::$idName ,$id);
        }


//--------------------------------------------ADD FUNCTION---------------------------------------------------

        public static function addUser(string $pseudo, string $email, string $pwd){
            $user = new User($pseudo, $email, $pwd);


        }
        
    }