<?php

class User{
    public static function getAll():Generator{
        $reponse = DB::getConn()->prepare('SELECT * FROM users');
        $reponse->execute();
        while (($user=$reponse->fetch())!==false){
            yield $user; 
        }
    }


}















?>