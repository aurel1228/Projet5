<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\Projet;
use Projet5\Tools\RoleEnum;
class ProjetsDelete extends AbstractViewController {
    public function process():void{
        $currentProjet=Projet::getOne($_GET["id"]);
        $this->variableView["message"]=$this->delete($currentProjet);
        $this->variableView["projet"]=$currentProjet;
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function delete($projet):?string{
        if (!isset($_POST["delete"]) || $_POST["delete"] !== "1"){
            return null;
        }
        if ($projet["id"] > 0){
            Projet::deleteProjet($projet["id"]);
            $_SESSION["message"]="suppression réussi";
            header("location:/Admin/Projets");
            exit();          
        } else {
            return "id non valide";
        } 
    }
}
?>