const p = trustedTypes.createPolicy('inner', {
   createHTML: function (input){
      return DOMPurify.sanitize(input);
   }
});

document.getElementById("search-btn").addEventListener("click", (event) => {
  const city = document.getElementById("city-input").value;
  console.log(city);
  if (city) {
    fetchWeather(city);
  } else {
    displayError("Entez nom d'une ville");
  }
});

function fetchWeather(city) {
  const apiURL = `/ApiHome?city=${city}`;

  fetch(apiURL)
    .then(response => {
      if (!response.ok) {
        throw new Error("Ville non trouvé");
      }
      return response.json();
    })
    .then(data => displayWeather(data))
    .catch(error => displayError(error.message));
}

const iderror = document.getElementById("error");

function displayWeather(data) {
  iderror.textContent = "";
  const temp =  data.main.temp;
  const feel_like = data.main.feel_like;
  const speed = data.wind.speed;
  const deg = data.wind.deg;
  console.log(temp);
  let html;
  switch(data.weather[0].main){ 
    case "Clear":
      html=`<div class="icon sunny">
         <div class="sun">
            <div class="rays"></div>
         </div>
      </div>`;
      break;
      case "Drizzle":
         html=`<div class="icon sun-shower">
         <div class="cloud"></div>
         <div class="sun">
            <div class="rays"></div>
         </div>
         <div class="rain"></div>
      </div>`;
      break;
      case "Rain":
         html=`<div class="icon rainy">
         <div class="cloud"></div>
         <div class="rain"></div>
      </div>`;
      break;
      case "Clouds":
         html=`<div class="icon cloudy">
         <div class="cloud"></div>
         <div class="cloud"></div>
      </div>`;
      break;
      case "Thunderstorm":
         html=`<div class="icon thunder-storm">
         <div class="cloud"></div>
         <div class="lightning">
            <div class="bolt"></div>
            <div class="bolt"></div>
         </div>
      </div>`;
      break;
      case "Snow":
         html=`<div class="icon flurries">
         <div class="cloud"></div>
         <div class="snow">
            <div class="flake"></div>
            <div class="flake"></div>
         </div>
      </div>`;
      break;
  }
document.getElementById("apimeteo").innerHTML= p.createHTML(html);

}

function displayError(error) {
  iderror.textContent = error;
}
document.getElementById("temp").textcontent="température";

 /*    <?php 
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
      */