<?php
namespace Projet5\Controllers\Admin;
use Projet5\Controllers\AbstractViewController;
use Projet5\Model\Projet;
use Projet5\Tools\RoleEnum;
use Exception;
use Throwable;
class ProjetsModifier extends AbstractViewController {
    private int $projetId;
    public function process():void{
        $this->projetId=$_GET["id"];
        //  supprime icon via button   
        if (isset($_GET["delete_icon"]) && $_GET["delete_icon"] == "1"){
            Projet::deleteIcon($this->projetId);
            header("location:?id=$this->projetId");
            exit();
        }
        $this->saveForm(); //récupérer message erreur 
        $this->variableView["projet"]=$this->projetDefault();
        parent::process();  
    }

    protected function getRole():RoleEnum{
        return RoleEnum::Admin;
    }

    private function projetDefault():array{
        $projet = Projet::getOne($this->projetId);
        if ($projet == null){
            $projet = ["id"=>0, "lien"=>null, ];
        }
        return $projet;
    }

    private function saveForm():void{
        if (!isset($_POST["modifier"]) || $_POST["modifier"] !== "1") {
            return ;
        }
        $id = $_POST["id"] ?? "";
        $lien = $_POST["lien"] ?? null;
        $icon = $_FILES["icon"] ?? null; 
        $ordre = $_POST["ordre"] ?? null;
        

        try {
            if  ($icon ["size"] !== 0 && $icon["tmp_name"] !==""){
                if($icon["error"] !== UPLOAD_ERR_OK){
                   throw new Exception("erreur envoi fichier");
                } 
                $iconSize = filesize($icon["tmp_name"]);
                if ($icon <= 0) {
                    throw new Exception("fichier vide"); // stop si l'image ne pèse rien
                }
                $tailleMax = 2097152;
                if ($iconSize >= $tailleMax){
                    throw new Exception("fichier trop lourd"); // stop si le fichier est trop volumineux
                }
                $image_type = exif_imagetype($icon["tmp_name"]);
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

                move_uploaded_file($icon["tmp_name"],  __DIR__ . "/../../Public/images/icon/" . $image_name); // déplacer image temporaire dans le bon répertoire

                // taille(largueur, hauteur) MAX image reformater l'image au bon ratio
                // charge l'image
                
                list($width, $height) = getimagesize( __DIR__ . "/../../Public/images/icon/" . $image_name);

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
                $source = imagecreatefromjpeg( __DIR__ ."/../../Public/images/icon/" . $image_name);
                $thumb = imagecreatetruecolor($newWidth, $newHeight);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                // sauvegarde de l'image final
                imagejpeg($thumb,  __DIR__ . "/../../Public/images/icon/" . $image_name, 75);
            
            }
            else { 
                if ($id != 0){ 
                    $image_name = Projet::getOne($id)['icon'];
                }else{
                    $image_name = null;
                }
            }    
            

            if(empty($_POST["lien"])){
                throw new Exception("aucun lien");
            }
  
            if ($id == 0){
                $id=Projet::addProjet($lien, $image_name, $ordre);
                if ($id !== null) { 
                    $this->projetId=$id;
                    throw new Exception("ajout réussi");
                }
                else {
                throw new Exception("ajout échoué");
                }    
            }
            else {
                if (Projet::projetUpdate($id, $lien, $image_name, $ordre)) { 
                    throw new Exception("mise a jour réussi");
                }
                else {
                    throw new Exception("aucune mise à jour");
                }    
            }   
        } catch (Throwable $exception) {
            $this->variableView["message"]=$exception->getMessage();
        } 
    }
}   






