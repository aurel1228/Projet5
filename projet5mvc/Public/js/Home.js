document.getElementById("search-btn").addEventListener("click", () => {
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

function displayWeather(data) {
  document.getElementById("error-message").textContent = "";
  document.getElementById("city-name").textContent = `Weather in ${data.name}`;
  document.getElementById("temperature").textContent = `Temperature: ${data.main.temp}°C`;
  document.getElementById("description").textContent = `Condition: ${data.weather[0].description}`;
  document.getElementById("humidity").textContent = `Humidity: ${data.main.humidity}%`;
}
