<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\RoleEnum;
class Modification extends AbstractViewController {
    public function process():void{
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function saveForm():?string{
    if (!isset($_POST["modifier"]) || $_POST["modifier"] !== "1") {
        return null;
    }
    $id = $_POST["id"] ?? "";
    $pseudo = $_POST["pseudo"] ?? null;
    $role = $_POST["role"] ?? "user";
    $password = $_POST["password"] ?? null;
    $passwordcheck = $_POST["passwordcheck"] ?? null;

    if(empty($_POST["pseudo"])){
        return "aucun pseudo";
    }

    if(User::hasDuplicate($id, $pseudo)){
        return "ce pseudo existe déjà pour un autre utilisateur.";
    }

    if($_POST["role"] !== "user"&& $_POST["role"] !== "admin"){
        return "mauvais rôle choisis.";
    }
    
     if (empty($_POST["password"])){
        return "Veuillez remplir le mot de passe.";
    }

    if ($_POST["password"] !== $_POST["passwordcheck"]) {
        return "votre mot de passe ne correspond pas.";
    }

    try {
        if ($id == 0){
            if (User::addUser($pseudo, $role, $password) !== null) { 
                return "ajout réussi";
            }
            else {
                return "ajout échoué";
            }    
        }
        else {
            if (User::userUpdate($id, $pseudo, $role, $password)) { 
                return "mise a jour réussi";
            }
            else {
                return "aucune mise à jour";
            }    
        }   
    } catch (Throwable $exception) {
        return "error:" . $exception->getMessage();
    }
    return null;

}


$message=saveForm();



}




?>
require __DIR__."/_adminCheck.php";
require __DIR__ . "/../../model/User.php";

$user = User::getOne($_GET["id"]);
if ($user == null){
    $user = ["id"=>0, "pseudo"=>null, "role"=>"user","password"=>null];
}
/*class formulaire*/function saveForm():?string{
    if (!isset($_POST["modifier"]) || $_POST["modifier"] !== "1") {
        return null;
    }
    $id = $_POST["id"] ?? "";
    $pseudo = $_POST["pseudo"] ?? null;
    $role = $_POST["role"] ?? "user";
    $password = $_POST["password"] ?? null;
    $passwordcheck = $_POST["passwordcheck"] ?? null;

    if(empty($_POST["pseudo"])){
        return "aucun pseudo";
    }

    if(User::hasDuplicate($id, $pseudo)){
        return "ce pseudo existe déjà pour un autre utilisateur.";
    }

    if($_POST["role"] !== "user"&& $_POST["role"] !== "admin"){
        return "mauvais rôle choisis.";
    }
    
     if (empty($_POST["password"])){
        return "Veuillez remplir le mot de passe.";
    }

    if ($_POST["password"] !== $_POST["passwordcheck"]) {
        return "votre mot de passe ne correspond pas.";
    }

    try {
        if ($id == 0){
            if (User::addUser($pseudo, $role, $password) !== null) { 
                return "ajout réussi";
            }
            else {
                return "ajout échoué";
            }    
        }
        else {
            if (User::userUpdate($id, $pseudo, $role, $password)) { 
                return "mise a jour réussi";
            }
            else {
                return "aucune mise à jour";
            }    
        }   
    } catch (Throwable $exception) {
        return "error:" . $exception->getMessage();
    }
    return null;

}


$message=saveForm();


require __DIR__ . "/../../views/admin/modifier.php";
