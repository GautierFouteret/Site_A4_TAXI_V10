<?php
include 'base.php'; // Inclusion du fichier de connexion à la base de données
include 'fonction_calcul_tarif.php'; // Inclusion du fichier de calcul des tarifs
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Réservation A4 Taxi</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Réservation A4 Taxi</h1>
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
    
    <section id="reservation">
        <h1>Réserver un taxi</h1>
        <form action="inserer_reservation.php" method="POST" enctype="multipart/form-data">
            <!-- Votre formulaire de réservation ici -->
            <h1>Formulaire de réservation</h1>
            <form action="inserer_reservation.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend><h2>Réserver un taxi</h2></legend>
                    
                    <!-- Champs de formulaire ici -->
                    <label for="NOM_USER">Nom :</label>
                    <input type="text" name="NOM_USER" id="NOM_USER" value="<?php echo isset($nom_user) ? htmlspecialchars($nom_user) : ''; ?>"><br><br>

                    <label for="PRENOM_USER">Prénom :</label>
                    <input type="text" name="PRENOM_USER" id="PRENOM_USER" value="<?php echo isset($prenom_user) ? htmlspecialchars($prenom_user) : ''; ?>"><br><br>

                    <label for="COURRIEL_USER">Adresse email :</label>
                    <input type="email" name="COURRIEL_USER" id="COURRIEL_USER" value="<?php echo isset($courriel_user) ? htmlspecialchars($courriel_user) : ''; ?>"><br><br>

                <form id="reservation-form">
                        <div class="form-group">
                            <label for="departure">Lieu de départ :</label>
                            <input type="text" id="departure" name="departure">
                    </div>
                    <div class="form-group">
                            <label for="arrival">Lieu d'arrivée :</label>
                            <input type="text" id="arrival" name="arrival">
                    </div>
                </form>

                <div id="tarif-message" class="tarif-message"></div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="script.js"></script>

                    <label for="DATE_DEPART">Date de départ :</label>
                    <input type="date" name="DATE_DEPART" id="DATE_DEPART" value="<?php echo isset($date_depart) ? htmlspecialchars($date_depart) : ''; ?>"><br><br>

                    <label for="HEURE_DEPART">Heure de départ :</label>
                    <input type="time" name="HEURE_DEPART" id="HEURE_DEPART" value="<?php echo isset($heure_depart) ? htmlspecialchars($heure_depart) : ''; ?>"><br><br>

                    <label for="ID_TAXI">Taxi</label>
                    <select id="ID_TAXI" name="ID_TAXI">
                        <option>1 : XYZ123</option> 
                        <option>2 : ABC456</option>
                        <option>3 : LMN789</option>
                        <option>8 : ABC001</option>
                        <option>9 : XYZ002</option>
                        <option>10 : DEF003</option>
                    </select><br><br>

                    <label for="ID_TYPE_TARIF">Choix des conditions de trajet : </label>
                    <select id="ID_TYPE_TARIF" name="ID_TYPE_TARIF">
                        <option>1 = Aller-retour entre 7h et 19h</option> 
                        <option>2 = Aller-retour entre 19h et 7h</option>
                        <option>3 = Aller OU retour entre 7h et 19h</option>
                        <option> 4 = Aller OU retour entre 19h et 7h</option>
                    </select><br><br>
                    
                    <input type="submit" value="Enregistrer">
                </fieldset>
            </form>
        </form>

        <?php
        // Affichage du message de réservation et du tarif si les variables sont définies
        if (isset($_GET['message'])) {
            echo "<p class='success-message'>" . htmlspecialchars($_GET['message']) . "</p>";
        }
        if (isset($_GET['tarif'])) {
            // Arrondir le tarif à deux décimales
            $tarif_arrondi = round($_GET['tarif'], 2);
            echo "<p class='tarif-message'>Le tarif de votre course est de : $tarif_arrondi euros</p>";
        }
        ?>
    </section>
    
    <footer>
        <p>&copy; 2024 A4 Taxi - Tous droits réservés</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>