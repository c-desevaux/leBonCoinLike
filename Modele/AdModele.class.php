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

            

            public static function getAdByTitle(string $title){
                $title = "%".$title."%";
                return parent::getLike(self::$tableName, "titleAd", $title);
            }

            public static function getAdByUserId(int $userId){
                return parent::getBy(self::$tableName, 'idUser', $userId);
            }

            public static function getNbAdByUser(int $userId){
                return parent::getCount('idUser', self::$tableName, $userId);
            }


    //-------------------------------FUNCTION GET THAT RETURNS AN OBJECT SO WE CAN USE ITS PROPERTIES TO UPDATE--------------------------------

            public static function getAdByIdClass(string $table, string $column, int $idAd, string $titleAd, string $txtAd, float $priceAd, int $idUser){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{

                    if(DbLBCL::checkTables($table)){
                        $sql = "SELECT * FROM ".$table." WHERE ".$column."=?";
                        $request = $connexion->prepare($sql);         
                        $request->execute([$idAd]);
                        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Ad::class, [$titleAd, $txtAd, $priceAd, $idUser]);
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



//---------------------------------------------DELETE FUNCTIONS------------------------------------------------

            public static function deleteAdById(int $id): void{
                $picTab = PictureModele::getPictureByAdId($id);
                if($picTab){                                    //S'il y a des images dans l'annonce
                    foreach($picTab as $pic){                   //On les parcours
                        $picPath = "img/" . $pic['namePic'];    //On retrouve leurs emplacement
                        if (file_exists($picPath)) {            //On verifie quelles existent
                            unlink($picPath);                   //On les supprimes
                        }
                    }
                }
                
                parent::delete(self::$tableName, self::$idName, $id);       //Puis on supprime lannonce
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
                    return $ad;
                }catch(PDOException $e){
                    die("Err: ".$e->getMessage());
                }

            }
//-----------------------------------------UPDATE FUNCTIONS-----------------------------------------

            public static function updateAd(int $idAd, string $title, string $txt, float $price, int $idUser){

                $connexion = DbLBCL::getConnexion();

                //Rajouter les controles que l'on a dans la class

                $ad=self::getAdByIdClass(self::$tableName, self::$idName, $idAd, $title, $txt, $price, $idUser); //On peut recuprer l'objet comme ça mais c'est un faux objet    

                

                $ad->setTitle($title);
                $ad->setTxt($txt);
                $ad->setPrice($price);

                try{

                    $sql = "UPDATE ad
                    SET titleAd = :title,
                        txtAd = :txt,
                        priceAd = :price
                        WHERE idAd = :idAd";
                    $request = $connexion->prepare($sql);
                    $request->execute(['title' => $ad->getTitle(),
                                        'txt' => $ad->getTxt(),
                                        'price' => $ad->getPrice(),
                                        'idAd' => $idAd]);
                    $request->closeCursor();

                }catch(PDOException $e){
                    die("Err: ".$e->getMessage());
                }
                    
            }

    }