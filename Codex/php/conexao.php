<?php
  
class conexao
{
   private static $connection;
  
   private function __construct(){}
  
   public static function getConnection() {
  
       $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
       $pdoConfig .= "Database=".DB_NAME.";";
       
       //echo DB_DRIVER." - ".DB_HOST." ---- ";
       
       try {
           if(!isset($connection)){
               $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
               $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }
           return $connection;
       } catch (PDOException $e) {
           $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
           $mensagem .= "\nErro: " . $e->getMessage();
           throw new Exception($mensagem);
       }
   }
}

   define('DB_HOST'        , "SRV-BD-1"); //10.67.22.216
   define('DB_USER'        , "q118_a");
   define('DB_PASSWORD'    , "q118ta");
   define('DB_NAME'        , "BIBLIOTECA");
   define('DB_DRIVER'      , "sqlsrv"); //NÃO PRECISA ALTERAR!!! 