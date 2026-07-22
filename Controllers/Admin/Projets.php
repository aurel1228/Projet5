<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Tools\RoleEnum;
use Projet5\Model\Projet;
class Projets extends AbstractViewController {
    public function process():void{
        $this->variableView["Projets"]=Projet::getAll();
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }
}
?>

