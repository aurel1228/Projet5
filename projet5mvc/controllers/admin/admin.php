<?php

$reponse = $conn->prepare('SELECT * FROM users');
$reponse->execute();

 require __DIR__."/../../views/admin/admin.php";  


?>