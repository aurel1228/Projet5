<?php

    // Url de l'API
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Paris&lang=fr&units=metric&appid=mykey";

    // On get les resultat
    $raw = file_get_contents($url);
    // Décode la chaine JSON
    $json = json_decode($raw);

    //var_dump($json);

    // Nom de la ville
    $name = $json->name;
    
    // Météo
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;

    // Températures
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;

    // Vent
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;

    
?>