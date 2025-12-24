<?php

    require_once 'AdException.class.php';

    class Ad {


        private $title;
        private $txt;
        private $price;
        private $userId;
        private $id;
        private $dateCreation;


        public function __construct(string $title, string $txt, float $price, int $userId){


            try{

                $this->setTitle($title);
                $this->setTxt($txt);
                $this->setPrice($price);
                $this->setUserId($userId);

            }catch(AdException $e){
                die("Err: ".$e->getMessage());
            }

        }

//GETTERS

        public function getTitle():string {           
            return $this->title;
        }

        public function getTxt():string {
            return $this->txt;
        }

        public function getPrice():float {
            return $this->price;
        }

        public function getUserId():int {
            return $this->userId;
        }
        public function getId():int {
            return $this->id;
        }

        public function getDateCreation():string {
            return $this->dateCreation;
        }


//SETTERS
        
        public function setTitle($title): void{

            if(preg_match('/^[a-zA-Z0-9À-ÿ ,.\'-]{3,20}$/u', $title)){
                $this->title=$title;
            }else{
                throw new AdException ("Titre non valide");
            }

        }

        public function setTxt($txt): void{

            if(preg_match('/^[a-zA-Z0-9À-ÿ ,.\'-]{3,500}$/u', $txt)){
                $this->txt=$txt;
            }else{
                throw new AdException ("Description non valide");
            }

        }

        public function setPrice($price): void{

            if(preg_match('/^\d+([.,]\d{1,2})?$/', $price)){
                $this->price=$price;
            }else{
                throw new AdException ("Prix non valide");
            }

        }

        public function setUserId($userId): void {

            if(UserModele::getUserById($userId)){ //On regarde si l'utilisateur existe dans la base de donnée
                $this->userId = $userId;
            }else{
                throw new AdException ("Utilisateur introuvable");
            }
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setDateCreation($dateCreation): void {
            $this->dateCreation = $dateCreation;
        }




    }