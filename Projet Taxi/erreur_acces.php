<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur d'accès</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Erreur d'accès</h1>
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
    <h2>Vous devez être un administrateur de notre entreprise pour accéder à cette page.</h2>
    <p><a href="connexion.php">Se connecter</a></p>
</body>
</html>
