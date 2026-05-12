<?php
namespace Projet5\Controllers;
use Projet5\Model\User;
use Exception;
use Throwable;
class Home extends AbstractViewController{
    public function process():void{
        $this->connexion(); //récupérer message erreur
        parent::process();     
    }

    private function connexion():void{
        if (!isset($_POST["connexion"]) || $_POST["connexion"] !== "1") {
            return;
        }

        try{
            if(empty($_POST["pseudo"])){
                 throw new Exception("aucun pseudo");
            }

            if (empty($_POST["password"])){
                 throw new Exception("veuillez remplir le mot de passe");
            }

            else{
                if (User::loginUser($_POST["pseudo"], $_POST["password"])){
                    if ($_SESSION['role'] == "admin"){
                        header("location:/Admin/Users");
                        exit();
                    }
                    return;
                }
                else{
                     throw new Exception("connexion échoué");
                }   
            }          
        }catch (Throwable $exception) {
            $this->variableView["message"]="error:" . $exception->getMessage();
        }
    }    
}
