<?php
    require_once 'Modele.class.php';

    class AdModele extends Modele {
        
            public function getAllAds()
            {
                return parent::getAll("ad");
            }


    }