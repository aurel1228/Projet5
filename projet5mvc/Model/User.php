<?php
namespace Projet5\Model;
use Generator;
use PDO;
class User{
    public static function getAll():Generator{
        $reponse = DB::getConn()->prepare('SELECT * FROM users');
        $reponse->execute();
        while (($user=$reponse->fetch(PDO::FETCH_ASSOC))!==false){
            yield $user; 
        }
    }

    public static function getOne(int $userId):array|null{
        $queryUser= DB::getConn()->prepare('SELECT * FROM users WHERE id=:id');  
        $queryUser->bindValue(':id', $userId, PDO::PARAM_INT);
        $queryUser->execute();
        if (($user=$queryUser->fetch(PDO::FETCH_ASSOC))!==false){
            return $user;
        }
        else{
            return null;
        }
    }

    public static function hasDuplicate(int $userId, string $pseudo):bool{
        $duplicate= DB::getConn()->prepare("SELECT count(*) as nb from users where pseudo=:pseudo and id!=:id");
        $duplicate->bindValue(':id', $userId, PDO::PARAM_INT);
        $duplicate->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $duplicate->execute();
        $nbLigne=(int)$duplicate->fetch(PDO::FETCH_COLUMN);
        if ($nbLigne===0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function userUpdate(string $id, string $pseudo, string $role, #[SensitiveParameter]string $password):bool{
        $update = DB::getConn()->prepare("UPDATE users SET pseudo=:pseudo, role=:role, password=:password WHERE id=:id",);
        $update->bindValue("id", $id, PDO::PARAM_INT);
        $update->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
        $update->bindValue("role", $role, PDO::PARAM_STR);
        $update->bindValue("password",password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR,);
        if ($update->execute()) {
            return true;
        } 
        else {
            return false;
        }
    }

    public static function addUser(string $pseudo, string $role, #[SensitiveParameter]string $password):?int{
        $add = DB::getConn()->prepare("INSERT INTO users (pseudo, role, password) VALUES (:pseudo,:role,:password)");
        $add->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
        $add->bindValue("role", $role, PDO::PARAM_STR);
        $add->bindValue("password",password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR,);
        if (!$add->execute()) {
            return null;
        } 
        return DB::getConn()->lastInsertId();
    }

    public static function deleteUser(string $id):bool{
        $delete = DB::getConn()->prepare("DELETE FROM users WHERE id=:id");
        $delete->bindValue("id", $id, PDO::PARAM_INT);
         if ($delete->execute()) {
            return true;
        } 
        else {
            return false;
        }
    }
   
    public static function loginUser(string $pseudo, #[SensitiveParameter]string $password):bool{
        $login = DB::getConn()->prepare('SELECT pseudo,password,role FROM users WHERE pseudo=:pseudo'); 
        $login->bindValue("pseudo", $pseudo, PDO::PARAM_STR); 
        $login->execute();
        $info=$login->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $info['password'])) {
            $_SESSION['pseudo'] = $info['pseudo'];
            $_SESSION['role'] = $info['role'];
            return true;
        } 
        else {
            return false;
       
        }    
    }
    

}
?>