<?php
namespace Projet5\Controllers;
class ApiHome extends AbstractUserController{
    public function process():void{
        $env = parse_ini_file(__DIR__.'/../.env');
        $url = "http://api.openweathermap.org/data/2.5/weather?q=".$_GET["city"]."&lang=fr&units=metric&appid=".$env['API_KEY'];
        $raw = file_get_contents($url);
        header("content-type: application/json; charset=utf-8");
        echo $raw;
        exit();
    }

}
