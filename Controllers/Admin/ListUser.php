<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\Tools\RoleEnum;
class ListUser extends AbstractViewController {
    public function process():void{
        $currentPage=$_GET["page"];
        $start = User::MAX * ($currentPage-1) + 1;
        $this->variableView["Users"]=User::getPage($start);
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }
}