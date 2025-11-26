<?php $titre = "page de suppression"; require __DIR__ . "/_headAdmin.php"; ?>
<?php require __DIR__ . "/../_logoutButton.php"; ?>
   <body>
      <h1>Information utilisateur</h1>
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
