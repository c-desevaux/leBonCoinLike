<?php

    require_once 'index.php';
    require_once 'UserException.class.php';


        class Modele {



            public function getAllUsers(){



                $connexion = DbLBCL::getConnexion();

                try{
                    $sql = "SELECT * FROM user_";
                    $request = $connexion->query($sql);
                    $records = $request->fetchAll(PDO::FETCH_ASSOC);

                    if($records){
                        return $records;
                    }
                }catch(UserException $e){
                    die('Err: '.$e->getMessage());
                }
                

            }

            public function addUser(){

            }

            public function deleteUser(){

            }

            public function updateUser(){

            }




            //Ads

            public function getAllAds(){

            }

            public function getAdById(){

            }

            public function getAdByUser(){

            }

            public function getAdByTitle(){

            }

            public function getAdByPrice(){

            }

            public function deleteAd(){

            }

            public function updateAd(){

            }
            public function addAd(){

            }






    }