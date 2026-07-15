<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\Tools\RoleEnum;
class Users extends AbstractViewController {
    public function process():void{
        $this->variableView["Users"]=User::getPage(1);
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }
}
/*        $this->variableView["Users"]=User::getPage(1, self::MAX); //préparer ? pour choisir le numéro de la page mais pas le start
      var_dump(ceil(User::userCount()/self::MAX)); 
    private const MAX=10;
    public function process():void{
        $totalPages=(ceil(User::userCount()/self::MAX));
        $currentpage=1;
      for ($i = 1; $i <= $totalPages; $i++) { 
            echo($i);
        }
        $this->variableView["Users"]=User::getPage($i, self::MAX); 
*/           
?>

