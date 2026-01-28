<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\RoleEnum;
class Users extends AbstractViewController {
    public function process():void{
        $this->variableView["Users"]=User::getAll();
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }



}




?>