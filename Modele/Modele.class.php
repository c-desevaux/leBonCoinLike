<?php

    require_once 'index.php';
    require_once 'UserException.class.php';


        abstract class Modele {

//GET ALL TEMPLATE FUNCTION FOR ALL TABLES
            public function getAll($table){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{
                    $sql = "SELECT * FROM ".$table;
                    $request = $connexion->query($sql);         
                    $records = $request->fetchAll(PDO::FETCH_ASSOC); 

                    if($records){
                        return $records;
                    }
                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }
                

            }

//ADD TEMPLATE FUNCTION FAR ALL TABLES
            public function add($table){



            }

//DELETE USER
//UPDATE USER

//GET AD BY ID
//GET AD BY USER
//GET AD BY TITLE
//GET AD BY PRICE

//DELETE AD

//ADD AD




    }