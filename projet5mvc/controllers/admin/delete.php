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

*/
require __DIR__ . "/../../model/User.php";

//$user = User::getInfo($_GET["id"]);

$user = User::getOne($_GET["id"]);


var_dump($user);













require __DIR__ . "/../../views/admin/delete.php";