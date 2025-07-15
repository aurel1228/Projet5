<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Boostrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- Style -->
      <link rel="stylesheet" href="./style/style.css">
      <title>projet 5</title>
   </head>
   <body>
      <div class="login">
         <h1>Connexion</h1>
         <form action="/page-traitement-donnees" method="post">
            <div>
               <label for="nom">login</label>
               <input type="text" id="login" name="login" placeholder="login" required>
            </div>
            <div>
               <label for="mdp">mot de passe</label>
               <input type="password" id="mdp" name="mdp" placeholder="mot de passe" required>
            </div>
            <div>
               <button type="submit">connexion</button>
            </div>
         </form>
      </div>
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
   </body>
</html>
