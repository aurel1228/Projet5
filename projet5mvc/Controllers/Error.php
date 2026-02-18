<?php
namespace Projet5\Controllers;
class Error extends AbstractViewController{
    public function process():void{
        http_response_code(404);
        parent::process(); 
    } 
}    
