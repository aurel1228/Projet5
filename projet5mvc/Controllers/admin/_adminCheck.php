<?php

if ($_SESSION['role'] !== "admin"){
    $_SESSION["message"]="page inaccessible";
    header("location: /");
    exit();  
 }