<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/style/style.css">
      <title>Page de modification</title>
   </head>
         <h1><?php echo($user['id'])?></h1>
         <h2><?php echo($user['pseudo'])?></h2>
   <body>
<p> information :


   Nom utilisateur : <?php echo($user['pseudo'])?>
   rôle : <?php echo($user['role'])?>
   mot de passe: <?php echo($user['password'])?>




</p>   




   </body>
</html>
