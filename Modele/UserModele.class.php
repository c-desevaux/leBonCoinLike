<?php

    require_once 'Modele.class.php';

    class UserModele extends Modele {

        private $tableName = "user_";
        private $idName = "idUser";



//---------------------------------------------GET FUNCTIONS-------------------------------------------------
        public function getAllUsers(){
            return parent::getAll($this->tableName);
        }

        public function getUserById(int $id){
            return parent::getBy($this->tableName, $this->idName, $id);
        }

        public function getUserByPseudo(string $pseudo){
            $pseudo = "%".$pseudo."%";
            return parent::getLike($this->tableName,"pseudUser",$pseudo);
        }


//-------------------------------------------DELETE FUNCTIONS------------------------------------------------        
        public function deleteUserById(int $id): void{
            parent::delete($this->tableName, $this->idName ,$id);
        }
        
    }