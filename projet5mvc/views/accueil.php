<!DOCTYPE html>
<html lang="fr">>
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link rel="stylesheet" href="./pulic/style/style.css">
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

    <div class="container text-center py-5">
            <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>

            <div class="row justify-content-center align-items-center">
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                                <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
</body>

</html>