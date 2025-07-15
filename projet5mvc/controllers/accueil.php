<?php
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


 
$servername="localhost";
$username="root";
$password="";
$db_name= "projet5mvc";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    echo "connexion échoué";
}
echo 'Connexion réussie';



  require __DIR__."/../views/accueil.php";  
?>