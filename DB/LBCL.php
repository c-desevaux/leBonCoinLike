<?php

    require_once 'ConnexionException.class.php';

    class DbLBCL {


        private static $connexion = null;
        private static $tables = ['user_', 'ad', 'picture'];


        private function __construct(){}

        private static function connect(): PDO{

            if(file_exists("DB/config.ini")){
echo "Fichier trouvé <br>";
                $config =parse_ini_file("DB/config.ini", true);
                extract($config['database']);
                $dsn = "mysql:dbname=".$DBNAME.";host=".$HOST.":" . $PORT;
            }else{
                throw new ConnexionException ("Fichier non trouvé");
            }
            try{
                $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
                $connexion = new PDO($dsn, $USER, $PWD, $option);
echo "Connexion reussit <br>";
                return $connexion;
            }catch(PDOException $e){
                die ('Err: '.$e->getMessage());
            }

        }


        public static function getConnexion():PDO {
            return self::connect();

        }

        public static function disconnect(): void{
            self::$connexion = null;
        }

//Fonction qui permet de verifier l'existance de la table avant de faire les requetes sql
        public static function checkTables($table): bool{

            if(file_exists("DB/config.ini")){
echo "Fichier trouvé <br>";
                $config = parse_ini_file("DB/config.ini", true);
                extract($config['database']);

                if(in_array($table, self::$tables)){
                    return true;
                }else{
                    return false;
                }
            }else{
                throw new ConnexionException ("Fichier non trouvé");
            }
        }


    }