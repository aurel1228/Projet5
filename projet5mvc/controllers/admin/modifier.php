<?php

require __DIR__ . "/../../model/User.php";

$user = User::getOne($_GET["id"]);
function saveForm():?string{
    if (!isset($_POST["modifier"]) || $_POST["modifier"] !== "1") {
        return null;
    }
    $id = $_POST["id"] ?? "";
    $pseudo = $_POST["pseudo"] ?? null;
    $role = $_POST["role"] ?? "user";
    $password = $_POST["password"] ?? null;
    $passwordcheck = $_POST["passwordcheck"] ?? null;

    var_dump($pseudo);
    var_dump($role);
    var_dump($password);
    var_dump($passwordcheck);
    var_dump($id);

    if(User::hasDuplicate($id, $pseudo)){
        return "ce pseudo existe déjà pour un autre utilisateur.";
    }

    if ($_POST["password"] !== $_POST["passwordcheck"]) {
        return "votre mot de passe ne correspond pas.";
    }

    try {
        if (User::userUpdate($id, $pseudo, $role, $password)) { 
            return "mise a jour réussi";
        }
        else {
            return "aucune mise à jour";
        }    
    } catch (Throwable $exception) {
        echo "error:" . $exception->getMessage();
    }
    return null;

}
$message=saveForm();


require __DIR__ . "/../../views/admin/modifier.php";
