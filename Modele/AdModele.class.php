<?php
    require_once 'Modele.class.php';

    class AdModele extends Modele {

        private static $tableName = "ad";
        private static $idName = "idAd";
        

//---------------------------------------------GET FUNCTIONS---------------------------------------------------

            public static function getAllAds()
            {
                return parent::getAll(self::$tableName);
            }

            public static function getAdById(int $id){
                return parent::getBy(self::$tableName, self::$idName, $id);
            }

            public static function getAdByIdClass(int $id){
                return parent::getByClass(self::$tableName, self::$idName, $id);
            }

            public static function getAdByTitle(string $title){
                $title = "%".$title."%";
                return parent::getLike(self::$tableName, "titleAd", $title);
            }

            public static function getAdByUserId(int $userId){
                return parent::getBy(self::$tableName, 'idUser', $userId);
            }

            

           


//---------------------------------------------DELETE FUNCTIONS------------------------------------------------

            public static function deleteAdById(int $id): void{
                parent::delete(self::$tableName, self::$idName, $id);
            }

    

//-----------------------------------------------ADD FUNCTION--------------------------------------------------

            public static function addAd(string $title, string $txt, float $price, int $userId){

                $connexion = DbLBCL::getConnexion();

                try{
                    $ad = new Ad($title, $txt, $price, $userId);

                    $sql = "INSERT INTO ad (titleAd, txtAd, priceAd, idUser)
                    VALUES (:title, :txt, :price, :userId)";
                    $request = $connexion->prepare($sql);
                    $request->execute(['title' => $ad->getTitle(),
                                        'txt' => $ad->getTxt(),
                                        'price' => $ad->getPrice(),
                                        'userId' => $ad->getUserId()]);

                    $request->closeCursor();
                    //On rajoute l'id a l'objet ad creer apres l'insert
                    $ad->setId($connexion->lastInsertId());
                    $ad->setDateCreation((UserModele::getUserById($ad->getUserId()))[0]['dateUser']);
                }catch(PDOException $e){
                    die("Err: ".$e->getMessage());
                }

            }
//-----------------------------------------UPDATE FUNCTIONS-----------------------------------------

            public static function updateAd(int $idAd, string $title, string $txt, float $price){

                $connexion = DbLBCL::getConnexion();

                //Rajouter les controles que l'on a dans la class

                $ad=self::getAdByIdClass($idAd); //On peut recuprer l'objet comme ça mais c'est un faux objet 
                $ad=$ad[0];    //On ne peux pas avoir acces aux fonction de la class....

                try{

                    $sql = "UPDATE ad 
                    SET titleAd = :title,
                        txtAd = :txt,
                        priceAd = :price
                        WHERE idAd = :idAd";
                    $request = $connexion->prepare($sql);
                    $request->execute(['title' => $title,
                                        'txt' => $txt,
                                        'price' => $price,
                                        'idAd' => $idAd]);
                    $request->closeCursor();

                }catch(PDOException $e){
                    die("Err: ".$e->getMessage());
                }
                    
            }

    }