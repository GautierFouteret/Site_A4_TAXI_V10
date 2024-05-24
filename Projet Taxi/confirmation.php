<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $lieu_depart = $_POST['LIEU_DE_DEPART'];
    $lieu_arrive = $_POST['LIEU_D_ARRIVE'];

    // Vous pouvez effectuer d'autres opérations ici, telles que l'insertion dans une base de données, etc.

    // Par exemple, affichage des données de réservation confirmées
    echo "<h2>Votre réservation a été confirmée :</h2>";
    echo "<p>Lieu de départ : $lieu_depart</p>";
    echo "<p>Lieu d'arrivée : $lieu_arrive</p>";
    // Vous pouvez ajouter d'autres détails de réservation ici
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: reservation.php");
    exit();
}
?>
