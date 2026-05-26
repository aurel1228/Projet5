<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\Tools\RoleEnum;
class Users extends AbstractViewController {
    public function process():void{
        $this->variableView["Users"]=User::getAll();
        var_dump($_SESSION["avatar"]);
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }
}
?>