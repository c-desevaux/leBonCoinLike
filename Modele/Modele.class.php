<?php

    require_once 'index.php';
    require_once 'ModeleException.class.php';
    require_once 'class/Ad.class.php';
    require_once 'class/User.class.php';
    require_once 'class/Picture.class.php';


        abstract class Modele {


//-----------------------------------------------------GET FUNCTIONS--------------------------------------------------------------------



//-----------------------------------------GET ALL TEMPLATE FUNCTION, FOR ALL TABLES-------------------------------
            public static function getAll(string $table){

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

//-----------------------Get one or more record from a specific table choosing the column name----------------------
            public static function getBy(string $table, string $column, string $value){

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
//-----------------------------------Get a count from a specific table--------------------------------------------

            public static function getCount(string $tableCounter, string $tableCounted, int $idCounter ){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{
                    if(DbLBCL::checkTables($tableCounted)){
                        $sql="SELECT COUNT(*)
                        FROM ".$tableCounted."
                        WHERE ".$tableCounter." =?";
                        $request = $connexion->prepare($sql);
                        $request->execute([$idCounter]);
                        $record = $request->fetch();
                        $request->closeCursor();
                        if($record){
                            return $record;
                        }
                    }else{
                        throw new ModeleException("La table ciblée n'existe pas");
                    }

                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }

            }




//-----------------------------Template for all search with LIKE functions-----------------------------------
            public static function getLike(string $table, string $column, string $value){

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

//-----TEMPLATE DELETE * BY *
            public static function delete(string $table, string $column, $value){

                $connexion = DbLBCL::getConnexion();            //start connexion

                try{
                    if(DbLBCL::checkTables($table)){

                        $sql = "DELETE FROM ".$table." WHERE ".$column." = ?";
                        $request = $connexion->prepare($sql);
                        $request->execute([$value]);
                        $request->closeCursor();

                    }
                }catch(ModeleException $e){
                    die('Err: '.$e->getMessage());
                }

            }




//-------------------------------------------------ADD TEMPLATE FUNCTION FAR ALL TABLES-------------------------------------------------------

            public static function add($table){

                $connexion = DbLBCL::getConnexion();            //start connexion

                if(DbLBCL::checkTables($table)){

                }

            }

//UPDATE USER


//GET AD BY PRICE



    }