<!-- calcule_distance.php -->
<?php
// Récupérer les noms des villes depuis les paramètres GET
$departure = $_GET['departure'];
$arrival = $_GET['arrival'];

// Clé API Google Maps
$api_key = 'AIzaSyCto3m-EidklhWd4_fhLW_ix4PT2qiEONU';

// URL de l'API de géocodage de Google Maps
$geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=";

// Construire l'URL pour la ville de départ
$departure_url = $geocode_url . urlencode($departure) . "&key=" . $api_key;

// Faire la requête à l'API de géocodage pour la ville de départ
$departure_response = file_get_contents($departure_url);
$departure_data = json_decode($departure_response);

// Extraire les coordonnées GPS de la ville de départ
$departure_latitude = $departure_data->results[0]->geometry->location->lat;
$departure_longitude = $departure_data->results[0]->geometry->location->lng;

// Faire de même pour la ville d'arrivée

// Construire l'URL pour la ville d'arrivée
$arrival_url = $geocode_url . urlencode($arrival) . "&key=" . $api_key;

// Faire la requête à l'API de géocodage pour la ville d'arrivée
$arrival_response = file_get_contents($arrival_url);
$arrival_data = json_decode($arrival_response);

// Extraire les coordonnées GPS de la ville d'arrivée
$arrival_latitude = $arrival_data->results[0]->geometry->location->lat;
$arrival_longitude = $arrival_data->results[0]->geometry->location->lng;

// Maintenant on peut utiliser $departure_latitude, $departure_longitude,
// $arrival_latitude et $arrival_longitude dans votre calcul de distance.
?>
