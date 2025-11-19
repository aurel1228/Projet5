<?php require __DIR__ . "/_headAdmin.php"; ?>
   <body>
      <table>
         <thead>
            <tr>
               <th scope="col">Nom utilisateur</th>
               <th scope="col">Rôle</th>
               <th scope="col">Modifier</th>
               <th scope="col">Supprimer</th>
               
            </tr>
         </thead>
         <tbody>
            <?php foreach(User::getAll()as $user){?>   
            <tr>
               <td><?= $user["pseudo"] ?></td>
               <td><?= $user["role"] ?></td>
               <td><a href="/admin/modifier?id=<?= $user["id"] ?>">modifier</a></td>
               <td><a href="/admin/delete?id=<?= $user["id"] ?>">supprimer</a></td>
            </tr>
            <?php
               }   
               
               ?>
         </tbody>
      </table>
<a href="/admin/modifier?id=<?= $user["id"]=0 ?>">ajouter</a>
<?php echo $_SESSION["message"]??""; unset($_SESSION["message"]);?>

   </body>
</html>
