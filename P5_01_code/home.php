<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html>
<head>
    <title>projet 5</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Bonjour, <?php echo $_SESSION['name']; ?></h1>
    <a href="logout.php">Deconnexion</a>

    
    <ul style="list-style-type:none;">
    <div class="image1"><li>Projet 1 : Intégrez la maquette du site d'une agence web<a href=http://webaurelien.fr/projet1><img src="images/projet 1.png"
            alt= "logo projet1"></a></li></div>
    <div class="image1"><li>Projet 2 : créez un site en personnalisant un thème WordPress<a href=http://webaurelien.fr/projet2><img src="images/projet 2.png"
            alt= "logo projet1"></a></li></div>
            <li>Projet 3 : Concevez une carte interactive de locations de vélos<a href=http://webaurelien.fr/projet3><img src="images/projet 3.png"
            alt= "logo projet1"></a></li>
            <li>Projet 4 : Créez un blog pour écrivain<a href=http://webaurelien.fr/projet4><img src="images/projet 4.png"
            alt= "logo projet1"></a></li>
</body> 
</html>

<?php
}else{
    header("location: index.php");
    exit();
}
?>