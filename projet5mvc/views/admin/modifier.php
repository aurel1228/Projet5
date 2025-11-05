<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/style/style.css">
      <title>Page de modification</title>
   </head>
   <h1>ID UTILISATEUR :<?php echo($user['id'])?></h1>
   <body>
      <div class="login">
      <h2>modification</h2>
      <form method="post">
         <input type="hidden" name="id" value="<?php echo($user['id'])?>">
         <div>
            <label for="pseudo">Nom utilisateur : <?php echo($user['pseudo'])?></label>
            <input type="text" id="pseudo" name="pseudo" value="<?php echo($user['pseudo'])?>" required>
         </div>
         <div>
            <label for="role">rôle : <?php echo($user['role'])?></label>
            <input type="text" id="role" name="role" value="<?php echo($user['role'])?>" required>
         </div>
         <div>
            <div>
               <label for="password">mot de passe :</label>
               <input type="password" id="password" name="password" required>
            </div>
            <div>
               <div>
                  <label for="passwordcheck">confirmation mot de passe :</label>
                  <input type="password" id="passwordcheck" name="passwordcheck" required><button type="submit" name="modifier" value="1"><?php if ($user['id'] == 0){ echo "ajouter";}
                  else{echo "modifier";}?></button>
                  <button type="submit" name="delete" value="1">Supprimer</button>
                  <?php echo($message)?>
               </div>
            </div>
      </form>
      </div>
   </body>
</html>
