<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\RoleEnum;
class Delete extends AbstractViewController {
    public function process():void{
        $currentUser=User::getOne($_GET["id"]);
        $this->variableView["message"]=$this->delete($currentUser);
        $this->variableView["user"]=$currentUser;
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function delete($user):?string{
        if (!isset($_POST["delete"]) || $_POST["delete"] !== "1"){
            return null;
        }
        if ($user["id"] > 0){
            User::deleteUser($user["id"]);
            $_SESSION["message"]="suppression réussi";
            header("location:/Admin/Users");
            exit();          
        } else {
            return "id non valide";
        } 
    }
}
?>