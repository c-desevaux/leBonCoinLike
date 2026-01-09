<?php

    require_once('PictureException.class.php');

    class Picture {

        
        private int $idAd;
        private int $idPic;
        private string $namePic;

        public function __construct(int $idAd, string $namePic){

            try{

                $this->setIdAd($idAd);
                $this->setNamePic($namePic);

            }catch(PictureException $e){
                die("Err: ".$e->getMessage());
            }
        }
//GETTERS

        public function getIdAd(): int{
            return $this->idAd;
        }

        public function getNamePic(): string{
            return $this->namePic;
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
            $this->idPic;
        }

        public function setNamePic(): void{
            $this->namePic;
        }



    }

