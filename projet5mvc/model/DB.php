<?php
class DB {
   private static PDO|null $conn=null;
   public static function getConn():PDO{
      if (self::$conn!==null){
         return self::$conn;
      }
      $env = parse_ini_file(__DIR__.'/../.env');
      $username=$env['user_name'];
      $password=$env['password'];
      $db_dsn=$env['db_dsn'];
   
      try {
         self::$conn = new PDO($db_dsn,$username,$password);
         self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         echo 'Connexion réussie';
      }
      catch (PDOException $exception){
         echo 'connexion echoué:'.$exception->getMessage();
      }
      return self::$conn; 
   }
   
}   
    
?>
