<?php

require __DIR__."/../../model/User.php";  

$user=User::getOne($_GET['id']);
var_dump($username);

require __DIR__."/../../views/admin/modifier.php";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['pseudo'];
    $role = $_POST['rolel'];
    $password = $_POST['password'];



    } else {
        $update = $conn->prepare("INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)");
        $update->bind_param($username, $role, $password);

        if ($update->execute()) {
            $message = "changement validé";

        } else {
            $message = "Error: " . $update->error;
        }

    }

var_dump($conn);



