<?php
namespace Projet5\Controllers;
abstract class AbstractViewController extends AbstractUserController implements ControllerInterface{
    /**
     * @var array tableau des variables de la vue
     */
    protected array $variableView=[];
    public function process():void {
        $viewName=(new ReflectionClass($this))->getShortName();
        $viewName=mb_substr($viewName, 0, mb_strlen($viewName)-10);
        require 'views/' . $viewName. '.php';

    }








}

