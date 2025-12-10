<?php
namespace Projet5\Controllers;
/**
 * interface des controlleurs
 */
interface ControllerInterface {
    /**
     * traitement du controller
     * @return void
     */
    public function process():void;  
    public function checkUser():bool;  
}







