<?php
   $env = parse_ini_file(__DIR__.'/../.env');

$servername=.$env['server_name'];
$username= .$env['user_name'];
$password=.$env['password'];
$db_name= "projet5mvc";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    echo "connexion échoué";
}
echo 'Connexion réussie';

?>