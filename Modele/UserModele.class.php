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
            parent::delete(self::$tableName, self::$idName , $id);
        }

        public static function deleteUserByName(string $name):void{
            parent::delete(self::$tableName, 'pseudUser', $name);
        }


//--------------------------------------------ADD FUNCTION---------------------------------------------------

        public static function addUser(string $pseudo, string $email, string $pwd){
            $connexion = DbLBCL::getConnexion();

            try{
                $user = new User($pseudo, $email, $pwd);
                $sql = "INSERT INTO User_ (pseudUser, emailUser, pwUser)
                VALUES (:pseudo, :email, :pwd)";
                $request = $connexion->prepare($sql);
                $request->execute(['pseudo' => $user->getPseudo(),
                                    'email' => $user->getEmail(),
                                    'pwd' => $user->getPwd()]);
                $request->closeCursor();
                $user->setId($connexion->lastInsertId());       //On rajoute l'id a l'objet user creer apres l'insert
                $user->setDateCreation((UserModele::getUserById($user->getId()))[0]['dateUser']);
                return $user;
            }catch(PDOException $e){
                if(isset($e->errorInfo[1]) && $e->errorInfo[1] == 1062){
                    throw new UserException("Email déjà existant");
                }
                die("Err: ".$e->getMessage());
            }
            
        }
        
    }