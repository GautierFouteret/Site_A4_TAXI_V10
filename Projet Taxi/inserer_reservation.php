<?php
include 'base.php'; // Inclusion du fichier de connexion à la base de données
include 'fonction_calcul_tarif.php'; // Inclusion du fichier de calcul des tarifs

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire et supprimer les guillemets simples indésirables
    $nom_user = trim($_POST['NOM_USER']);
    $prenom_user = trim($_POST['PRENOM_USER']);
    $courriel_user = trim($_POST['COURRIEL_USER']);
    $lieu_depart = trim($_POST['departure']);
    $lieu_arrive = trim($_POST['arrival']);
    $date_depart = trim($_POST['DATE_DEPART']);
    $heure_depart = trim($_POST['HEURE_DEPART']);
    $taxi_choisi = trim($_POST['ID_TAXI']);
    $tarif_choisi = trim($_POST['ID_TYPE_TARIF']);

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparer la première requête pour insérer l'utilisateur
    $stmt = $conn->prepare("INSERT INTO `utilisateur` (`TYPE_UTILISATEUR`, `NOM_USER`, `PRENOM_USER`, `COURRIEL_USER`) VALUES (?, ?, ?, ?)");
    $type_utilisateur = 'Client';
    $stmt->bind_param("ssss", $type_utilisateur, $nom_user, $prenom_user, $courriel_user);

    // Exécuter la première requête
    if ($stmt->execute()) {
        // Récupérer l'ID de l'utilisateur inséré
        $utilisateur_id = $stmt->insert_id;

        // Préparer la deuxième requête pour insérer la réservation
        $stmt = $conn->prepare("INSERT INTO `reservation` (`ID_UTILISATEUR`, `LIEU_DE_DEPART`, `LIEU_D_ARRIVE`, `DATE_DEPART`, `HEURE_DEPART`, `ID_TAXI`, `ID_TYPE_TARIF`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssi", $utilisateur_id, $lieu_depart, $lieu_arrive, $date_depart, $heure_depart, $taxi_choisi, $tarif_choisi);

        // Exécuter la deuxième requête
        if ($stmt->execute()) {
            // Calculer le tarif en fonction des données du formulaire
            $tarif = calculer_tarif($date_depart, $heure_depart, $lieu_depart, $lieu_arrive, $tarif_choisi);

            // Message de réservation réussie
            $reservation_message = "Réservation effectuée avec succès !";

            // Redirection vers reservation.php avec les variables de message et de tarif
            header("Location: reservation.php?message=" . urlencode($reservation_message) . "&tarif=" . urlencode($tarif));
            exit();
        } else {
            echo "Erreur : " . $conn->error;
        }
    } else {
        echo "Erreur : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>