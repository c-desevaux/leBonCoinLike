<?php

    require_once 'UserException.class.php';

    class User {

        private $pseudo;
        private $email;
        private $pwd;
        private $id;
        private $dateCreation;
        

        public function __construct(string $pseudo, string $email, string $pwd)
        {
            try{
                $this->setPseudo($pseudo);
                $this->setEmail($email);
                $this->setPwd($pwd);

            }catch(UserException $e){
                die ("Err: ".$e->getMessage());
            }
            
        }



//GETTERS

        public function getPseudo():string {
            return $this->pseudo;
        }

        public function getEmail():string {
            return $this->email;
        }

        public function getPwd():string {
            return $this->pwd;
        }

        public function getId():int {
            return $this->id;
        }

        public function getDateCreation():string {
            return $this->dateCreation;
        }

//SETTERS

        public function setPseudo($pseudo):void {

            if(preg_match('/^[a-zA-Z0-9-]{3,20}$/', $pseudo)){
                $this->pseudo = $pseudo;
            }else{
                throw new UserException("pseudo invalid");
            }

           
        }

        public function setEmail($email):void {

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->email = $email;
            }else{
                throw new UserException("email invalid");
            }
            
        }

        public function setPwd($pwd):void {

            if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pwd)){
                $this->pwd = $pwd;
            }else{
                throw new UserException("mot de passe trop faible");
            }
            $this->pwd = $pwd;
        }

        public function setId($id):void {
            $this->id = $id;
        }
        public function setDateCreation($dateCreation):void {
            $this->dateCreation = $dateCreation;
        }

    }