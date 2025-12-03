<?php
require __DIR__."/_adminCheck.php";
require __DIR__ . "/../../model/User.php";

$user = User::getOne($_GET["id"]);

/*class delete*/ function delete($user):?string{
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