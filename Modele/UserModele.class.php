<?php

    require_once 'Modele.class.php';

    class UserModele extends Modele {

        

        public function getAllUsers(){
            return parent::getAll("user_");
        }

        
    }