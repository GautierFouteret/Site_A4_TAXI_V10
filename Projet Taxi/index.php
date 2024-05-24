<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Taxi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>A4 Taxi</h1>
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
    
    <section id="banner">
        <h2>Bienvenue chez A4 Taxi</h2>
        <p>Réservez un taxi en toute simplicité et profitez d'un service fiable et sécurisé pour vos déplacements.</p>
        <a href="#services" class="button">Découvrir nos services</a>
    </section>

    <section id="contact">
        <h2>Une question ? Contactez-nous ! </h2>
        <form id="contact-form" method="post" action="send_email.php">
            <div class="form-group">
                <label for="firstname">Prénom :</label><br>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Nom :</label><br>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="message">Message :</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="button">Envoyer</button>
        </form>
        <p id="confirmation-message">Votre message a bien été envoyé ! Nous vous contacterons bientôt.</p>
    </section>
    
    <section id="flotte">
        <h2>Notre Flotte</h2>
        <div id="gallery">
            <!-- Images de la flotte -->
        </div>
    </section>
    
    <section id="services">
        <h2>Nos Services</h2>
        <ul>
            <li>
                <h3>Service de Transport Urbain</h3>
                <p>Notre service de Transport Urbain est idéal pour vos déplacements quotidiens en ville. Nos chauffeurs expérimentés vous conduiront à destination en toute sécurité et dans les meilleurs délais. Que vous soyez un travailleur matinal, un étudiant pressé ou un touriste explorant la ville, notre service de taxi urbain répondra à tous vos besoins.</p>
            </li>
            <li>
                <h3>Service de Navette Aéroport</h3>
                <p>Ne manquez plus jamais votre vol avec notre Service de Navette Aéroport. Nous assurons des transferts rapides et fiables vers tous les aéroports de la région. Nos chauffeurs vous récupéreront à votre domicile ou à tout autre endroit convenu et vous déposeront à l'aéroport en temps voulu. Profitez d'un trajet confortable sans stress avant votre prochain vol.</p>
            </li>
            <li>
                <h3>Service de Tourisme</h3>
                <p>Explorez les merveilles de la région avec notre Service de Tourisme. Nos chauffeurs connaissent les meilleurs endroits à visiter et seront heureux de vous emmener découvrir les attractions locales, les sites historiques, les parcs naturels et bien plus encore. Profitez d'une expérience de voyage personnalisée et inoubliable avec A4 Taxi.</p>
            </li>
            <li>
                <h3>Service de Livraison de Colis</h3>
                <p>Besoin de livrer un colis en urgence ? Notre Service de Livraison de Colis est là pour vous. Que ce soit pour des documents importants, des paquets ou des courses urgentes, nous assurons une livraison rapide et sécurisée à destination. Faites confiance à notre équipe pour gérer vos envois avec le plus grand soin.</p>
            </li>
            <li>
                <h3>Service de Navette Événementielle</h3>
                <p>Organisez-vous un événement spécial ? Notre Service de Navette Événementielle est là pour vous garantir un transport confortable et sans souci pour vous et vos invités. Que ce soit pour un mariage, une fête d'anniversaire, un événement d'entreprise ou tout autre événement, nous nous assurons que vous arriviez à destination en toute sécurité et dans le style.</p>
            </li>
        </ul>
    </section>
    
    <footer>
        <p>&copy; 2024 A4 Taxi - Tous droits réservés</p>
    </footer>
    
    <script src="script.js"></script>

</body>
</html>