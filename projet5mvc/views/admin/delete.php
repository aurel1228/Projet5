<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/style/style.css">
      <title>Page de suppression</title>
      <h1>Information utilisateur</h1>
   </head>
   <body>
      ID utilisateur:<?php echo($user['id'])?><br>
      pseudo utilisateur : <?php echo($user['pseudo'])?><br>
      rôle utilisateur : <?php echo($user['role'])?><br>
      <form method="post">
      <button type="submit" name="delete" value="1">Supprimer</button>
      </form >
      <a href="/admin">Annuler</a>
      <?php echo $message ?>
   </body>
</html>
