<?php

    require_once 'index.php';
    require_once 'ModeleException.class.php';


        abstract class Modele {

//GET ALL TEMPLATE FUNCTION FOR ALL TABLES
            public function getAll($table){

                
                $connexion = DbLBCL::getConnexion();            //start connexion

                try{

                    if(DbLBCL::checkTables($table)){
                        $sql = "SELECT * FROM ".$table;
                        $request = $connexion->query($sql);         
                        $records = $request->fetchAll(PDO::FETCH_ASSOC); 
                        $request->closeCursor();
                        if($records){
                            return $records;
                        }
                    }else{
                        throw new ModeleException("La table ciblée n'existe pas");
                    }
                    
                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }
                

            }

//ADD TEMPLATE FUNCTION FAR ALL TABLES
            public function add($table){

                $connexion = DbLBCL::getConnexion();            //start connexion

                if(DbLBCL::checkTables($table)){

                }

            }
            
//DELETE * BY ID
            public function delete(string $table, int $id){

                $connexion = DbLBCL::getConnexion();

                try{
                    if(DbLBCL::checkTables($table)){

                        $sql = "DELETE FROM ".$table." WHERE id=?";
                        $request = $connexion->prepare($sql);
                        $request->execute([$id]);
                        $request->closeCursor();

                    }
                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }

                

            }




//UPDATE USER

//GET AD BY ID
//GET AD BY USER
//GET AD BY TITLE
//GET AD BY PRICE

//DELETE AD BY ID

//ADD AD




    }