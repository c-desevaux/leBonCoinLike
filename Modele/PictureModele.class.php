<?php
    require_once 'Modele.class.php';


    class PictureModele extends Modele {

        private static $tableName = "picture";
        private static $idName = "idPic";

    //-------------------------------GET FUNCTION-----------------------------


        public static function getPictureById(int $id){
            return parent::getBy(self::$tableName, self::$idName, $id);
        }

        public static function getPictureByAdId(int $idAd){
            return parent::getBy(self::$tableName, 'idAd', $idAd);
        }



    //-------------------------------ADD FUNCTION-----------------------------


        public static function addPictureId(int $adId, string $picName){

            $connexion = DbLBCL::getConnexion();

            try{
                $pict = new Picture($adId, $picName);

                $sql = "INSERT INTO picture (idAd, namePic)
                VALUES (:adId, :picName)";
                $request = $connexion->prepare($sql);
                $request->execute(['adId' => $pict->getIdAd(),
                                    'picName' => $pict->getNamePic()
                                ]);
                $request->closeCursor();
                //On rajoute l'id a l'objet ad creer apres l'insert
                $pict->setId($connexion->lastInsertId());
                return $pict;
            }catch(PDOException $e){
                die("Err: ".$e->getMessage());
            }

        }

    //------------------------------DELETE FUNCTION--------------------------

        public static function deletePictureById(int $id): void{
            parent::delete(self::$tableName, self::$idName, $id);
        }

    }