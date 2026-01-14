<?php
namespace Projet5\Controllers;
abstract class AbstractUserController implements ControllerInterface{
    public function checkUser():bool{
        $roletest=$this->getRole();
        if($roletest===true){
            if(!empty($_SESSION["role"])){
                return true;
            }
            else{
                return false;
            }
        }
        if($roletest===false){
            if(!empty($_SESSION["role"])){
                return false;
            }
            else{
                return true;
            }
        }
        if($roletest===null){
            return true;
        }
        if ($_SESSION["role"]==$roletest){
            return true;
        }
        else{
            return false;
        }
        
    }
    /**
     * récupère le role requis pour la page
     * @return bool|string|null true=connécté peu importe le role, false=pas connecté, string=role, null=connecté ou non connecté
     */
    protected function getRole():bool|string|null{
        return null;
    }

}






