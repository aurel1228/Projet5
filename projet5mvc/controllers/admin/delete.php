<?php
/*
analyse page suppression:
- ajouter la page au routeur

- lancer depuis la page depuis 	- tableau admin
				                - la page de modification

- url = admin/delete?id= user

- les 2 liens renvoient sur la meme page avec
demande de confirmation sur les 2 pages via un popup pour valider.

- test de sécurité:
récupérer les infos utilisateurs 
avant suppression:
		- id,pseudo,role	

 test:
    - id non valide /-> message d'erreur
    - validation de la suppression avec bouton valider/annuler
    - message de validation -> retour sur le pannel admin      
    - annuler / renvoi sur le meme lien

*/
require __DIR__ . "/../../model/User.php";


$user = User::getOne($_GET["id"]);


function delete($user):?string{
    if (!isset($_POST["delete"]) || $_POST["delete"] !== "1"){
        return null;
    }
    if ($user["id"] > 0){
       User::deleteUser($user["id"]);
       $_SESSION["message"]="suppression réussi";
       header("location:/admin");
       exit();          
    } else {
          return "id non valide";
        } 





}
$message=delete($user);





















require __DIR__ . "/../../views/admin/delete.php";