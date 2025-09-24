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
         <form action="/page-traitement-donnees" method="post">
            <div>
               <label for="nom">Nom utilisateur : <?php echo($user['pseudo'])?></label>
               <input type="text" id="pseudo" name="pseudo" placeholder="<?php echo($user['pseudo'])?>" required>
            </div>
            <div>
               <label for="mdp">rôle : <?php echo($user['role'])?></label>
               <input type="text" id="role" name="role" placeholder="<?php echo($user['role'])?>" required>
            </div>
            <div>
                <div>
               <label for="nom">mot de passe: <?php echo($user['password'])?></label>
               <input type="password" id="password" name="password" placeholder="<?php echo($user['password'])?>" required>
            </div>
            <div>
                <div>
               <label for="nom">confirmation mot de passe: <?php echo($user['password'])?></label>
               <input type="password" id="password" name="password" placeholder="<?php echo($user['password'])?>" required><button type="submit">modifier</button>
            </div>
            </div>
         </form>
      </div>
 




   </body>
</html>
