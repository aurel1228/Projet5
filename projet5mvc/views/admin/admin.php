<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/style/style.css">
      <title>Page Administration</title>
   </head>
   <body>
<table>
    <thead>
        <tr>
            <th scope="col">Nom utilisateur</th>
            <th scope="col">Rôle</th>
            <th scope="col">Modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php while (($user=$reponse->fetch())!==false){?>   
        <tr>
            <td><?= $user["pseudo"] ?></td>
            <td><?= $user["role"] ?></td>
            <td><a href="/admin/modifier.php?id=<?= $user["id"] ?>">modifier</a></td>
        </tr>
        <?php
        }   

        ?>
    </tbody>
</table>  
   </body>
</html>
