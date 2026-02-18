<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\RoleEnum;
class Modifier extends AbstractViewController {
    private int $userId;
    public function process():void{
        $this->userId=$_GET["id"];
        $this->variableView["message"]=$this->saveForm();
        $this->variableView["user"]=$this->userDefault();
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function userDefault():array{
        $user = User::getOne($this->userId);
        if ($user == null){
            $user = ["id"=>0, "pseudo"=>null, "role"=>"user","password"=>null];
        }
        return $user;
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
                $id=User::addUser($pseudo, $role, $password);
                if ($id !== null) { 
                    $this->userId=$id;
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
}