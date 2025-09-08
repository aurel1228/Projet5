<?php

class User{
    public static function getAll():Generator{
        $reponse = DB::getConn()->prepare('SELECT * FROM users');
        $reponse->execute();
        while (($user=$reponse->fetch())!==false){
            yield $user; 
        }
    }

    public static function getOne(int $userId):array|null{
        $queryUser= DB::getConn()->prepare('SELECT * FROM users WHERE id=:id');  
        $queryUser->bindValue(':id', $userId, PDO::PARAM_INT);
        $queryUser->execute();
        if (($user=$queryUser->fetch())!==false){
            return $user;
        }
        else{
            return null;
        }


    }

}
?>