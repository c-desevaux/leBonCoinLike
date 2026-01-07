<?php

    require_once('PictureException.class.php');

    class Picture {

        
        private int $idAd;
        private int $idPicture;

        public function __construct(int $idAd){

            try{

                $this->setIdAd($idAd);

            }catch(PictureException $e){
                die("Err: ".$e->getMessage());
            }
        }
//GETTERS

        public function getIdAd(): int{
            return $this->idAd;
        }


//SETTERS

        public function setIdAd($id): void{

            if(AdModele::getAdById($id)){
                $this->idAd =$id;
            }else{
                throw new PictureException("Annonce introuvable");
            }
        }

        public function setId($id): void{
            $this->idPicture;
        }



    }

