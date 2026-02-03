<?php
namespace Projet5\Controllers;
use Reflectionclass;
abstract class AbstractViewController extends AbstractUserController implements ControllerInterface{
    /**
     * @var array tableau des variables de la vue
     */
    protected array $variableView=[];
    public function process():void {
        $viewName=(new ReflectionClass($this))->getName(); //permet de récupérer le nom de la classe
        $viewName=mb_substr($viewName, mb_strlen("Projet5\\Controllers\\")); //récupère le nom de la classe et enlève projet5/controllers
        $twigLoader=new \Twig\Loader\FilesystemLoader(); 
        $twigLoader->prependPath(__DIR__."/../views");
        $enviLoader=new \Twig\Environment($twigLoader, ["cache"=>false]); // créer environnement twig
        $htmlView= $enviLoader->render($viewName.".html.twig",$this->variableView + ["SESSION"=>$_SESSION]);// ajouter a twig des variables de la vue et $Session
        echo $htmlView;
        unset($_SESSION["message"]);
    }


/*
list variable:


*/


}

