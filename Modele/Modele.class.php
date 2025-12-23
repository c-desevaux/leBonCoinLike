<?php

    require_once 'index.php';
    require_once 'ModeleException.class.php';


        abstract class Modele {


//-----------------------------------------------------GET FUNCTIONS--------------------------------------------------------------------



//GET ALL TEMPLATE FUNCTION, FOR ALL TABLES
            public function getAll(string $table){

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

//Get one or more record from a specific table choosing the column name
            public function getBy(string $table, string $column, string $value){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{

                    if(DbLBCL::checkTables($table)){
                        $sql = "SELECT * FROM ".$table." WHERE ".$column."=?";
                        $request = $connexion->prepare($sql);         
                        $request->execute([$value]);
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

//Template for all search with LIKE functions
            public function getLike(string $table, string $column, string $value){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{

                    if(DbLBCL::checkTables($table)){
                        $sql = "SELECT * FROM ".$table." WHERE ".$column." LIKE ?";
                        $request = $connexion->prepare($sql);         
                        $request->execute([$value]);
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

            

//---------------------------------------------------------------DELETE FUNCTIONS---------------------------------------------------

//DELETE * BY ID
            public function delete(string $table, int $id){

                $connexion = DbLBCL::getConnexion();            //start connexion

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




//ADD TEMPLATE FUNCTION FAR ALL TABLES
            public function add($table){

                $connexion = DbLBCL::getConnexion();            //start connexion

                if(DbLBCL::checkTables($table)){

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