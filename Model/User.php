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

    public static function userUpdate(string $id, string $pseudo, string $role, #[SensitiveParameter]string $password, ?string $avatar):bool{
        $avatarOld=static::getOne($id)['avatar'];
        $update = DB::getConn()->prepare("UPDATE users SET pseudo=:pseudo, role=:role, password=:password, avatar=:avatar WHERE id=:id",);
        $update->bindValue("id", $id, PDO::PARAM_INT);
        $update->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
        $update->bindValue("role", $role, PDO::PARAM_STR);
        $update->bindValue("password",password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR,);
        $update->bindValue("avatar", $avatar, PDO::PARAM_STR);
        if ($update->execute()) {
            if($avatar != $avatarOld && $avatarOld !== null && file_exists(__DIR__."/../public/images/avatar/".$avatarOld)){
                unlink(__DIR__."/../public/images/avatar/".$avatarOld);
            }
            return true;
        } 
        else {
            return false;
        }
    }

    public static function addUser(string $pseudo, string $role, #[SensitiveParameter]string $password, ?string $avatar):?int{
        $add = DB::getConn()->prepare("INSERT INTO users (pseudo, role, password, avatar) VALUES (:pseudo,:role,:password,:avatar)");
        $add->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
        $add->bindValue("role", $role, PDO::PARAM_STR);
        $add->bindValue("password",password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR,);
        $add->bindValue("avatar", $avatar, PDO::PARAM_STR);
        if (!$add->execute()) {
            return null;
        } 
        return DB::getConn()->lastInsertId();
    }

    public static function deleteAvatar(int $id):void{
        $avatar=static::getOne($id)["avatar"];
        if($avatar == null){
            return;
        }
        $bddUpdate = DB::getConn()->prepare("UPDATE users SET avatar=null WHERE id=:id");
        $bddUpdate->bindValue("id", $id, PDO::PARAM_INT);
        if($bddUpdate->execute()) {
            if(file_exists(__DIR__ . "/../../Public/images/avatar/" .$avatar)){
                unlink(__DIR__ . "/../../Public/images/avatar/" .$avatar);
            }
        }
    }

    public static function deleteUser(string $id):bool{
        $avatar=static::getOne($id)['avatar'];
        $delete = DB::getConn()->prepare("DELETE FROM users WHERE id=:id");
        $delete->bindValue("id", $id, PDO::PARAM_INT);
         if ($delete->execute()) {
            if (file_exists(__DIR__."/../public/images/avatar/".$avatar)){
                unlink(__DIR__."/../public/images/avatar/".$avatar);
            }
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