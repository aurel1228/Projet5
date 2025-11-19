<?php //require require __DIR__ . "/_head.php"; ?>
<?php //require require __DIR__ . "/_logout.php"; ?>
   <body>
      <?php if (empty($_SESSION['pseudo']))
         {echo "<h1>Connexion</h1>
         <form method=\"post\">
               <label for=\"pseudo\">Nom utilisateur</label>
               <input type=\"text\" id=\"pseudo\" name=\"pseudo\" placeholder=\"pseudo\" required>
            
          
               <label for=\"password\">mot de passe</label>
               <input type=\"password\" id=\"password\" name=\"password\" placeholder=\"mot de passe\" required>
           

               <button type=\"submit\" name=\"connexion\" value=\"1\">connexion</button>
         </form>
      </div>";}?>
      <?php echo $message; ?>
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
