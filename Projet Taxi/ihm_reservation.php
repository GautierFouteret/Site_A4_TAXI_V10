<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
</head>
<body>
    <h2>Formulaire de réservation</h2>
    <form action="inserer_reservation.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Réserver un taxi</legend>
            <!-- Votre formulaire de réservation ici -->
            <label for="NOM_USER">Nom :</label>
            <input type="text" id="NOM_USER" name="NOM_USER" required><br><br>
            <label for="PRENOM_USER">Prénom :</label>
            <input type="text" id="PRENOM_USER" name="PRENOM_USER" required><br><br>
            <label for="COURRIEL_USER">Courriel :</label>
            <input type="email" id="COURRIEL_USER" name="COURRIEL_USER" required><br><br>
            <!-- Ajoutez les autres champs ici -->
            <button type="submit">Réserver</button>
        </fieldset>
    </form>
    <?php
    // Vérifier si le formulaire a été soumis et afficher le message de confirmation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Merci pour votre réservation !</p>";
    }
    ?>
</body>
</html>