<?php

require __DIR__."/../../model/User.php";  

$user=User::getOne($_GET['id']);


require __DIR__."/../../views/admin/modifier.php";  


var_dump($user);






