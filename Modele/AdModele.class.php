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






//---------------------------------------------DELETE FUNCTIONS------------------------------------------------

            public static function deleteAdById(int $id): void{
                parent::delete(self::$tableName, self::$idName, $id);
            }


    }