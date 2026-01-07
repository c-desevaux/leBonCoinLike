<?php

    require_once 'UserException.class.php';

    class User {

        private string $pseudUser;
        private string $emailUser;
        private String $pwUser;
        private int $idUser;
        private $dateUser;
        

        public function __construct(string $pseudUser, string $emailUser, string $pwUser)
        {
            try{
                $this->setPseudo($pseudUser);
                $this->setEmail($emailUser);
                $this->setPwd($pwUser);

            }catch(UserException $e){
                die ("Err: ".$e->getMessage());
            }
            
        }



//GETTERS

        public function getPseudo():string {
            return $this->pseudUser;
        }

        public function getEmail():string {
            return $this->emailUser;
        }

        public function getPwd():string {
            return $this->pwUser;
        }

        public function getId():int {
            return $this->idUser;
        }

        public function getDateCreation():string {
            return $this->dateUser;
        }

//SETTERS

        public function setPseudo($pseudo):void {

            if(preg_match('/^[a-zA-Z0-9-]{3,20}$/', $pseudo)){
                $this->pseudUser = $pseudo;
            }else{
                throw new UserException("pseudo invalid");
            }

           
        }

        public function setEmail($email):void {

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->emailUser = $email;
            }else{
                throw new UserException("email invalid");
            }
            
        }

        public function setPwd($pwd):void {

            if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/u', $pwd)){
                $this->pwUser = $pwd;
            }else{
                throw new UserException("mot de passe trop faible");
            }
            $this->pwUser = $pwd;
        }

        public function setId($id):void {
            $this->idUser = $id;
        }
        public function setDateCreation($dateCreation):void {
            $this->dateUser = $dateCreation;
        }

    }