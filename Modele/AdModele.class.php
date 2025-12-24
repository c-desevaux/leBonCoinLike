<?php
    require_once 'Modele.class.php';

    class AdModele extends Modele {

        private $tableName = "ad";
        private $idName = "idAd";
        

//---------------------------------------------GET FUNCTIONS---------------------------------------------------
            public function getAllAds()
            {
                return parent::getAll($this->tableName);
            }

            public function getAdById(int $id){
                return parent::getBy($this->tableName, $this->idName, $id);
            }

            

            public function getAdByTitle(string $title){
                $title = "%".$title."%";
                return parent::getLike($this->tableName, "titleAd", $title);
            }






//---------------------------------------------DELETE FUNCTIONS------------------------------------------------
            public function deleteAdById(int $id): void{
                parent::delete($this->tableName, $this->idName, $id);
            }


    }