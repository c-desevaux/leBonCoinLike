<?php


    class User {

        private $pseudo;
        private $email;
        private $pwd;
        

        public function __construct(string $pseudo, string $email, string $pwd)
        {
            $this->setPseudo($pseudo);
            $this->setEmail($email);
            $this->setPwd($pwd);
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


//SETTERS

        public function setPseudo($pseudo):void {
            $this->pseudo = $pseudo;
        }

        public function setEmail($email):void {
            $this->email = $email;
        }

        public function setPwd($pwd):void {
            $this->pwd = $pwd;
        }



    }