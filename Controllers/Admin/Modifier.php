<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\User;
use Projet5\Tools\RoleEnum;
use Exception;
use Throwable;
class Modifier extends AbstractViewController {
    private int $userId;
    public function process():void{
        $this->userId=$_GET["id"];
        //  supprime avatar via button   
        if (isset($_GET["delete_avatar"]) && $_GET["delete_avatar"] == "1"){
            User::deleteAvatar($this->userId);
            header("location:?id=$this->userId");
            exit();
        }
        $this->variableView["roles"]=RoleEnum::cases();
        $this->saveForm(); //récupérer message erreur 
        $this->variableView["user"]=$this->userDefault();
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function userDefault():array{
        $user = User::getOne($this->userId);
        if ($user == null){
            $user = ["id"=>0, "pseudo"=>null, "role"=>"user","password"=>null];
        }
        return $user;
    }

    private function saveForm():void{
        if (!isset($_POST["modifier"]) || $_POST["modifier"] !== "1") {
            return ;
        }
        $id = $_POST["id"] ?? "";
        $pseudo = $_POST["pseudo"] ?? null;
        $role = $_POST["role"] ?? "user";
        $password = $_POST["password"] ?? null;
        $passwordcheck = $_POST["passwordcheck"] ?? null;
        $avatar = $_FILES["avatar"] ?? null; 

        try {
            if  ($avatar ["size"] !== 0 && $avatar["tmp_name"] !==""){
                if($avatar["error"] !== UPLOAD_ERR_OK){
                   throw new Exception("erreur envoi fichier");
                } 
                $avatarSize = filesize($avatar["tmp_name"]);
                if ($avatarSize <= 0) {
                    throw new Exception("fichier vide"); // stop si l'image ne pèse rien
                }
                $tailleMax = 2097152;
                if ($avatarSize >= $tailleMax){
                    throw new Exception("fichier trop lourd"); // stop si le fichier est trop volumineux
                }
                $image_type = exif_imagetype($avatar["tmp_name"]);
                if (!$image_type) {
                    throw new Exception("le fichier n'est pas une image");  // stop si ce n'est pas une image valide
                }

                // choisi l'extension des images
                $image_extension = image_type_to_extension($image_type, true);
                if(!in_array($image_extension, array(".png", ".gif", ".jpeg"))){
                    throw new Exception("mauvaise extension");
                }

                // créer un nom unique aux images
                $image_name = bin2hex(random_bytes(16)) . $image_extension;

                move_uploaded_file($avatar["tmp_name"],  __DIR__ . "/../../Public/images/avatar/" . $image_name); // déplacer image temporaire dans le bon répertoire

                // taille(largueur, hauteur) MAX image reformater l'image au bon ratio
                // charge l'image
                
                list($width, $height) = getimagesize( __DIR__ . "/../../Public/images/avatar/" . $image_name);

                // on redimmensionne en 400x400
                if ($width != 400){
                    $newWidth = 400;
                    $newHeight =  (int)round($newWidth * (float)$height / $width,0);
                }

                elseif ($height != 400){
                    $newHeight = 400;
                    $newWidth =  (int)round($newHeight * (float)$width / $height,0);
                }

                // nouvelle image
                $source = imagecreatefromjpeg( __DIR__ ."/../../Public/images/avatar/" . $image_name);
                $thumb = imagecreatetruecolor($newWidth, $newHeight);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                // sauvegarde de l'image final
                imagejpeg($thumb,  __DIR__ . "/../../Public/images/avatar/" . $image_name, 75);
            
            }
            else { 
                if ($id !=""){ 
                    $image_name = User::getOne($id)['avatar'];
                }else{
                    $image_name = null;
                }
            }    
            

            if(empty($_POST["pseudo"])){
                throw new Exception("aucun pseudo");
            }

            if(User::hasDuplicate($id, $pseudo)){
                throw new Exception("ce pseudo existe déjà pour un autre utilisateur");
            }

            if($_POST["role"] !== "user"&& $_POST["role"] !== "admin"){
                 throw new Exception("mauvais rôle choisis");
            }
            
            if (empty($_POST["password"])){
                 throw new Exception("Veuillez remplir le mot de passe");
            }

            if ($_POST["password"] !== $_POST["passwordcheck"]) {
                 throw new Exception("votre mot de passe ne correspond pas");
            }
    
            if ($id == 0){
                $id=User::addUser($pseudo, $role, $password, $image_name);
                if ($id !== null) { 
                    $this->userId=$id;
                    throw new Exception("ajout réussi");
                }
                else {
                throw new Exception("ajout échoué");
                }    
            }
            else {
                if (User::userUpdate($id, $pseudo, $role, $password, $image_name)) { 
                    throw new Exception("mise a jour réussi");
                }
                else {
                    throw new Exception("aucune mise à jour");
                }    
            }   
        } catch (Throwable $exception) {
            $this->variableView["message"]="error:" . $exception->getMessage();
        } 
    }
}   