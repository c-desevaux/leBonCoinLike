<?php
    require_once 'Modele.class.php';

    class AdModele extends Modele {
        
            public function getAllAds()
            {
                return parent::getAll("ad");
            }

            public function deleteAd(int $id): void{
                parent::delete("ad", $id);
            }


    }