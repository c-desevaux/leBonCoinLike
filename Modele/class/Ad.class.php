<?php

    require_once 'AdException.class.php';

    class Ad {


        private string $titleAd;
        private string $txtAd;
        private float $priceAd;
        private int $idUser;
        private int $idAd;
        private $dateAd;


        public function __construct(string $titleAd, string $txtAd, float $priceAd, int $idUser){


            try{

                $this->setTitle($titleAd);
                $this->setTxt($txtAd);
                $this->setPrice($priceAd);
                $this->setUserId($idUser);

            }catch(AdException $e){
                die("Err: ".$e->getMessage());
            }

        }

//GETTERS

        public function getTitle():string {           
            return $this->titleAd;
        }

        public function getTxt():string {
            return $this->txtAd;
        }

        public function getPrice():float {
            return $this->priceAd;
        }

        public function getUserId():int {
            return $this->idUser;
        }
        public function getId():int {
            return $this->idAd;
        }

        public function getDateCreation():string {
            return $this->dateAd;
        }


//SETTERS
        
        public function setTitle($title): void{

            if(preg_match('/^[a-zA-Z0-9À-ÿ ,.\'-]{3,20}$/u', $title)){
                $this->titleAd=$title;
            }else{
                throw new AdException ("Titre non valide");
            }

        }

        public function setTxt($txt): void{

            if(preg_match('/^[a-zA-Z0-9À-ÿ ,.\'-]{3,500}$/u', $txt)){
                $this->txtAd=$txt;
            }else{
                throw new AdException ("Description non valide");
            }

        }

        public function setPrice($price): void{

            if(preg_match('/^\d+([.,]\d{1,2})?$/', $price)){
                $this->priceAd=$price;
            }else{
                throw new AdException ("Prix non valide");
            }

        }

        public function setUserId($userId): void {

            if(UserModele::getUserById($userId)){ //On regarde si l'utilisateur existe dans la base de donnée
                $this->idUser = $userId;
            }else{
                throw new AdException ("Utilisateur introuvable");
            }
        }

        public function setId($id): void {
            $this->idAd = $id;
        }

        public function setDateCreation($dateCreation): void {
            $this->dateAd = $dateCreation;
        }




    }