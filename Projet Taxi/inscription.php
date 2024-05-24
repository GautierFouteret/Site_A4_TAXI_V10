<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <h1>Inscription</h1>
        <nav>
            <ul>
            <li><a href="index.php #header">Accueil</a></li>
                <li><a href="index.php #contact">Contact</a></li>
                <li><a href="index.php #flotte">Flotte</a></li>
                <li><a href="index.php #services">Services</a></li>
                <li><a href="reservation.php">Réserver un taxi</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <?php
                    session_start();
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
    <h2>Inscription</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="S'inscrire">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    include 'base.php'; // Assurez-vous que ce fichier contient vos informations de connexion

    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO utilisateur (TYPE_UTILISATEUR, NOM_USER, PRENOM_USER, MDP_USER, COURRIEL_USER) VALUES ('Client', '$nom', '$prenom', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Votre compte a bien été créé.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
</body>
</html>