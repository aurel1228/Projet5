<?php
namespace Projet5\Controllers;
class Logout extends AbstractUserController{
   public function process():void {
      session_unset();
      header("location: /");
      exit();
   }
}

?>