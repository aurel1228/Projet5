<!DOCTYPE html>
<html>
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link rel="stylesheet" href="style/style.css">
        <title>projet 5</title>
</head>
<body>
    <form action="login.php" method="post">
        <h2>CONNEXION</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p
        <?php } ?>

        <label>Nom d'utilisateur</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Mot de passe</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Connexion</button>
    </form>
</body>

</html>