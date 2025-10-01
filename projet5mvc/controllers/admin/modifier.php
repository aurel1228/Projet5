<?php

require __DIR__ . "/../../model/User.php";

$user = User::getOne($_GET["id"]);

if (isset($_POST["modifier"]) && $_POST["modifier"] === "1") {
  $id = $_POST["id"] ?? "";
  $pseudo = $_POST["pseudo"] ?? null;
  $role = $_POST["role"] ?? "user";
  $password = $_POST["password"] ?? null;
  $passwordcheck = $_POST["passwordcheck"] ?? null;

  var_dump($pseudo);
  var_dump($role);
  var_dump($password);
  var_dump($passwordcheck);
  var_dump($id);

  //$duplicate=mysqli_query("SELECT * from users where pseudo=:pseudo");
  //if (mysqli_num_rows($duplicate)>0)

  if ($_POST["password"] === $_POST["passwordcheck"]) {
  } else {
    echo "votre mot de passe ne correspond pas.";
    return;
  }

  try {
    $update = DB::getConn()->prepare(
      "UPDATE users SET pseudo=:pseudo, role=:role, password=:password WHERE id=:id",
    );
    $update->bindValue("id", $id, PDO::PARAM_INT);
    $update->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
    $update->bindValue("role", $role, PDO::PARAM_STR);
    $update->bindValue(
      "password",
      password_hash($password, PASSWORD_DEFAULT),
      PDO::PARAM_STR,
    );

    if ($update->execute()) {
      $message = "changement validé";
    } else {
      $message = "aucune mise a jour";
    }
  } catch (Throwable $exception) {
    $message = "error:" . $exception->getMessage();
  }
}

//var_dump($message);

require __DIR__ . "/../../views/admin/modifier.php";
