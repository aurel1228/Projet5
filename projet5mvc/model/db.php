<?php
   $env = parse_ini_file(__DIR__.'/../.env');
   
   $username=$env['user_name'];
   $password=$env['password'];
   $db_dsn=$env['db_dsn'];
   
   try {
    $conn = new PDO($db_dsn,$username,$password);
    echo 'Connexion réussie';
   }
   catch (PDOException $exception){
    echo 'connexion echoué:'.$exception->getMessage();
    $conn = null;
   }
    
?>
