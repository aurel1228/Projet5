<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\Tools\RoleEnum;
class Users extends AbstractViewController {
    private const MAX=10;
    public function process():void{
        $this->variableView["Users"]=User::getPage(1, self::MAX); //préparer ? pour choisir le numéro de la page mais pas le start

        var_dump(ceil(User::userCount()/self::MAX)); 
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }
}
?>