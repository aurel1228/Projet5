<?php
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







