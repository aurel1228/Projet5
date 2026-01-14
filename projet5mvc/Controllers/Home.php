<?php
namespace Projet5\Controllers;
class Home extends AbstractViewController{
    public function process():void{
        parent::process();
    }
    
    public function connexion():?string{
    if (!isset($_POST["connexion"]) || $_POST["connexion"] !== "1") {
        return null;
    }

    if(empty($_POST["pseudo"])){
        return "aucun pseudo";
    }

    if (empty($_POST["password"])){
        return "Veuillez remplir le mot de passe.";
    }
    else{
      if (User::loginUser($_POST["pseudo"], $_POST["password"])){
         if ($_SESSION['role'] == "admin"){
            header("location:/admin");
            exit();
         }
         return null;

      }else{
      return "connexion échoué";
      }
         
    }
    
    }    
}
  
/*
   require __DIR__ . "/../model/User.php";

   $env = parse_ini_file(__DIR__.'/../.env');
   
   // Url de l'API
   $url = "http://api.openweathermap.org/data/2.5/weather?q=Strasbourg&lang=fr&units=metric&appid=".$env['API_KEY'];
   
   // On get les resultat
   $raw = file_get_contents($url);
   
   // Décode la chaine JSON
   $json = json_decode($raw);
   
   // Nom de la ville
   $name = $json->name;
   
   // Météo
   $weather = $json->weather[0]->main;
   $desc = $json->weather[0]->description;
   
   // Températures
   $temp = $json->main->temp;
   $feel_like = $json->main->feels_like;
   
   // Vent
   $speed = $json->wind->speed;
   $deg = $json->wind->deg;

/*class connexion function connexion():?string{
    if (!isset($_POST["connexion"]) || $_POST["connexion"] !== "1") {
        return null;
    }

    if(empty($_POST["pseudo"])){
        return "aucun pseudo";
    }

    if (empty($_POST["password"])){
        return "Veuillez remplir le mot de passe.";
    }
    else{
      if (User::loginUser($_POST["pseudo"], $_POST["password"])){
         if ($_SESSION['role'] == "admin"){
            header("location:/admin");
            exit();
         }
         return null;

      }else{
      return "connexion échoué";
      }
         
    }
    

}    

$message=connexion();
   
   require __DIR__."/../views/accueil.php";  
   ?>
*/