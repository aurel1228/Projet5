const p = trustedTypes.createPolicy('inner', {
   createHTML: function (input){
      return DOMPurify.sanitize(input);
   }
});

document.getElementById("search-btn").addEventListener("click", (event) => {
  const city = document.getElementById("meteo").value;
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
      console.log(response);
      return response.json();
    })
    .then(data => displayWeather(data))
    .catch(error => displayError(error.message));
}

const iderror = document.getElementById("error");

function displayWeather(data) {
  const temp =  data.main.temp;
  const feels_like = data.main.feels_like;
  const speed = data.wind.speed;
  const desc = data.weather[0].description;
  iderror.textContent = "";
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
   document.getElementById("temp").innerText= temp+" °C";
   document.getElementById("ressenti").innerText= feels_like+" °C ressenti";
   document.getElementById("speed").innerText= speed+" Km/h";
   document.getElementById("desc").innerText= desc;
}

function displayError(error) {
  iderror.textContent = error;
}
