<?php

    require_once 'Modele.class.php';

    class UserModele extends Modele {

        

        public function getAllUsers(){
            return parent::getAll("user_");
        }

        public function deleteAd(int $id): void{
            parent::delete("user_", $id);
        }
        
    }