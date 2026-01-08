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

        public static function getUserByEmail(string $email){
            return parent::getBy(self::$tableName, "emailUser", $email);
        }

        public static function getUserByPseudo(string $pseudo){
            $pseudo = "%".$pseudo."%";
            return parent::getLike(self::$tableName,"pseudUser",$pseudo);
        }

    //-------------------------------FUNCTION GET THAT RETURNS AN OBJECT SO WE CAN USE ITS PROPERTIES TO UPDATE--------------------------------

            public static function getUserByIdClass(string $table, string $column, int $idUser, string $pseudUser, string $emailUser, string $pwUser){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{

                    if(DbLBCL::checkTables($table)){
                        $sql = "SELECT * FROM ".$table." WHERE ".$column."=?";
                        $request = $connexion->prepare($sql);         
                        $request->execute([$idUser]);
                        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class, [$pseudUser, $emailUser, $pwUser]);
                        $record = $request->fetch();
                        $request->closeCursor();
                        if($record){
                            return $record;
                        }
                    }else{
                        throw new ModeleException("La table ciblée n'existe pas");
                    }
                    
                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }

            }

        


//-------------------------------------------DELETE FUNCTIONS------------------------------------------------  

        public static function deleteUserById(int $id): void{
            parent::delete(self::$tableName, self::$idName , $id);
            if($id == $_SESSION['login']){
                $_SESSION['login']="";
            }
        }

        public static function deleteUserByName(string $name):void{
            parent::delete(self::$tableName, 'pseudUser', $name);
        }


//--------------------------------------------ADD FUNCTION---------------------------------------------------

        public static function addUser(string $pseudo, string $email, string $pwd){
            $connexion = DbLBCL::getConnexion();

            try{
                $user = new User($pseudo, $email, $pwd);
                $pwd = password_hash($pwd, PASSWORD_BCRYPT);
                echo ($pwd);
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

    //-----------------------------------------UPDATE FUNCTIONS-----------------------------------------

            public static function updateUser(int $idUser, string $pseudUser, string $emailUser, string $pwUser){

                $connexion = DbLBCL::getConnexion();

                //Rajouter les controles que l'on a dans la class

                $user=self::getUserByIdClass(self::$tableName, self::$idName, $idUser, $pseudUser, $emailUser, $pwUser); //On peut recuprer l'objet comme ça mais c'est un faux objet    

                $user->setPseudo($pseudUser);
                
                try{

                    $sql = "UPDATE user_
                    SET pseudUser = :pseudo
                        WHERE idUser = :idUser";
                    $request = $connexion->prepare($sql);
                    $request->execute(['pseudo' => $user->getPseudo(),
                                        'idUser' => $idUser]);
                    $request->closeCursor();

                }catch(PDOException $e){
                    die("Err: ".$e->getMessage());
                }
                    
            }
        
    }