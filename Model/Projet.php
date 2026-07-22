<?php
namespace Projet5\Model;
use Generator;
use PDO;
class Projet{
    public static function getAll():Generator{
        $reponse = DB::getConn()->prepare('SELECT * FROM projets');
        $reponse->execute();
        while (($projet=$reponse->fetch(PDO::FETCH_ASSOC))!==false){
            yield $projet; 
        }
    }
 
    public static function getOne(int $projetId):array|null{
        $queryProjet= DB::getConn()->prepare('SELECT * FROM projets WHERE id=:id');  
        $queryProjet->bindValue(':id', $projetId, PDO::PARAM_INT);
        $queryProjet->execute();
        if (($projet=$queryProjet->fetch(PDO::FETCH_ASSOC))!==false){
            return $projet;
        }
        else{
            return null;
        }
    }    

    public static function projetUpdate(string $id, string $lien, ?string $icon, int $ordre):bool{
        $iconOld=static::getOne($id)['icon'];
        $update = DB::getConn()->prepare("UPDATE projets SET lien=:lien, icon=:icon, ordre=:ordre WHERE id=:id",);
        $update->bindValue("id", $id, PDO::PARAM_INT);
        $update->bindValue("lien", $lien, PDO::PARAM_STR);
        $update->bindValue("icon", $icon, PDO::PARAM_STR);
        $update->bindValue("ordre", $ordre, PDO::PARAM_INT);
        if ($update->execute()) {
            if($icon != $iconOld && $iconOld !== null && file_exists(__DIR__."/../public/images/icon/".$iconOld)){
                unlink(__DIR__."/../public/images/icon/".$iconOld);
            }
            return true;
        } 
        else {
            return false;
        }
    }   
    
    public static function addProjet(string $lien, ?string $icon, int $ordre):?int{
        $add = DB::getConn()->prepare("INSERT INTO projets (lien, icon, ordre) VALUES (:lien,:icon,:ordre)");
        $add->bindValue("lien", $lien, PDO::PARAM_STR);
        $add->bindValue("icon", $icon, PDO::PARAM_STR);
        $add->bindValue("ordre", $ordre, PDO::PARAM_INT);
        if (!$add->execute()) {
            return null;
        } 
        return DB::getConn()->lastInsertId();
    }

    public static function deleteIcon(int $id):void{
        $icon=static::getOne($id)["icon"];
        if($icon == null){
            return;
        }
        $bddUpdate = DB::getConn()->prepare("UPDATE projets SET icon=null WHERE id=:id");
        $bddUpdate->bindValue("id", $id, PDO::PARAM_INT);
        if($bddUpdate->execute()) {
            if(file_exists(__DIR__ . "/../../Public/images/icon/" .$icon)){
                unlink(__DIR__ . "/../../Public/images/icon/" .$icon);
            }
        }
    }    























}