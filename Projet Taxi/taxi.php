<!DOCTYPE html>
<html>
<head>
    <title>Taxi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php include 'base.php'; ?> <!-- Inclusion de base.php -->

<h2>Calcul de la distance entre deux points géographiques</h2>

<form id="distanceForm">
    <label for="latitude1">Latitude 1:</label>
    <input type="text" id="latitude1" name="latitude1"><br><br>
  
    <label for="longitude1">Longitude 1:</label>
    <input type="text" id="longitude1" name="longitude1"><br><br>
  
    <label for="latitude2">Latitude 2:</label>
    <input type="text" id="latitude2" name="latitude2"><br><br>
  
    <label for="longitude2">Longitude 2:</label>
    <input type="text" id="longitude2" name="longitude2"><br><br>
  
    <input type="button" value="Calculer la distance" onclick="calculateDistance()">
</form>

<!-- Paragraphe pour afficher la distance -->
<p id="result"></p>

<script>
    // Fonction pour calculer la distance entre deux points géographiques
    function calculateDistance() {
        var lat1 = parseFloat(document.getElementById('latitude1').value);
        var lon1 = parseFloat(document.getElementById('longitude1').value);
        var lat2 = parseFloat(document.getElementById('latitude2').value);
        var lon2 = parseFloat(document.getElementById('longitude2').value);

        var distanceInKm = distance(lat1, lon1, lat2, lon2);

        // Affichage de la distance dans le paragraphe avec l'id "result"
        document.getElementById('result').innerHTML = "La distance entre les deux points est de " + distanceInKm.toFixed(2) + " km.";
    }
    
</script>

<!-- Script pour calculer la distance -->
<script src="script.js"></script>


</body>
</html>











