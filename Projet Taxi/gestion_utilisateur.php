<?php
// Vérifier si une session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté et s'il a le bon type d'utilisateur
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["user_type"] !== "Admin") {
    // Rediriger vers une page d'erreur d'accès
    header("location: erreur_acces.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<header>
        <h1>Gestion des utilisateurs</h1>
        <nav>
            <ul>
                <li><a href="index.php #header">Accueil</a></li>
                <li><a href="index.php #contact">Contact</a></li>
                <li><a href="index.php #flotte">Flotte</a></li>
                <li><a href="index.php #services">Services</a></li>
                <li><a href="reservation.php">Réserver un taxi</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <?php
                    // Vérifier si une session est déjà démarrée
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        echo "<li><a href='deconnexion.php'>Se déconnecter</a></li>";
                    } else {
                        echo "<li><a href='connexion.php'>Connexion</a></li>";
                    }
                ?>
                <li><a href="gestion_utilisateur.php">Gérer un utilisateur</a></li>
                <li><a href="statut_reservation.php">Statut des réservations</a></li>
            </ul>
        </nav>
    </header>
    <?php
include 'base.php'; // Assurez-vous que ce fichier contient vos informations de connexion

$sql = "SELECT ID_UTILISATEUR, TYPE_UTILISATEUR, NOM_USER, PRENOM_USER, MDP_USER, COURRIEL_USER FROM utilisateur"; // Modifié selon la partie de la base de base de données
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID_UTILISATEUR</th>
                <th>TYPE_UTILISATEUR</th>
                <th>NOM_USER</th>
                <th>PRENOM_USER</th>
                <th>MDP_USER</th>
                <th>COURRIEL_USER</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["ID_UTILISATEUR"]."</td>
                <td>".$row["TYPE_UTILISATEUR"]."</td>
                <td>".$row["NOM_USER"]."</td>
                <td>".$row["PRENOM_USER"]."</td>
                <td>".$row["MDP_USER"]."</td>
                <td>".$row["COURRIEL_USER"]."</td>
                <td>
                    <form method='post' action='update_user_type.php'>
                        <input type='hidden' name='ID_UTILISATEUR' value='".$row["ID_UTILISATEUR"]."'>
                        <select name='TYPE_UTILISATEUR'>
                            <option value='Client'>Client</option>
                            <option value='Chauffeur'>Chauffeur</option>
                            <option value='Admin'>Admin</option>
                        </select>
                        <input type='submit' value='Mettre à jour'>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}

$conn->close();
?>
</body>
</html>
