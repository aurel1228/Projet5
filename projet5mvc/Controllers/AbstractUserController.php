<?php
namespace Projet5\Controllers;
use Projet5\RoleEnum;
abstract class AbstractUserController implements ControllerInterface{
    // test des roles utilisateurs pour connecté  / pas connecté / connecté et non connecté
    public function checkUser():bool{
        $roletest=$this->getRole();
        if($roletest===RoleEnum::Connected){
            if(!empty($_SESSION["role"])){
                return true;
            }
            else{
                return false;
            }
        }
        if($roletest===RoleEnum::NotConnected){ 
            if(!empty($_SESSION["role"])){
                return false;
            }
            else{
                return true;
            }
        }
        if($roletest===RoleEnum::ConnectedOrNot){
            return true;
        }
        if ($_SESSION["role"]===$roletest->value){
            return true;
        }
        else{
            return false;
        }
        
    }
    /**
     * récupère le role requis pour la page
     * @return RoleEnum role requis pour la page
     */
    protected function getRole():RoleEnum{
        return RoleEnum::ConnectedOrNot;
    }
}






