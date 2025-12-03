<?php if($user['id']>=1){ $titre = "page de modification"; }
       else { $titre = "page d'ajout"; }
       require __DIR__ . "/_headAdmin.php"; ?>
<?php require __DIR__ . "/../_logoutButton.php"; ?>
   <h1>ID UTILISATEUR :<?php echo($user['id'])?></h1>
   <body>
      <div class="login">
         <h2>modification</h2>
         <form method="post">
            <input type="hidden" name="id" value="<?php echo($user['id'])?>">

            <label for="pseudo">Nom utilisateur : <?php echo($user['pseudo'])?></label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo($user['pseudo'])?>" required>

            <label for="role">rôle : <?php echo($user['role'])?></label>
            <input type="text" id="role" name="role" value="<?php echo($user['role'])?>" required>
            
            <label for="password">mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="passwordcheck">confirmation mot de passe :</label>
            <input type="password" id="passwordcheck" name="passwordcheck" required><button type="submit" name="modifier" value="1"><?php if ($user['id'] == 0){ echo "ajouter";}
            else{echo "modifier";}?></button>
            <?php echo($message)?>
         </form>
      </div>
      <?php if($user['id'] > 0) {echo "<a href=\"/admin/delete?id=".$user['id']."\">suppression</a>";}?>
      <a href="/admin">Annuler</a>
   </body>
</html>
