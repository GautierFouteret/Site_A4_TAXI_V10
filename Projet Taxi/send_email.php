<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adresse e-mail de destination (vous pouvez remplacer par votre adresse e-mail)
    $to = "votre@email.com";

    // Sujet de l'e-mail
    $subject = "Demande de course - A4 Taxi";

    // Corps de l'e-mail
    $body = "Bonjour $firstname $lastname,\n\n";
    $body .= "Votre demande a bien été enregistrée. Un chauffeur va bientôt vous contacter pour la course.\n\n";
    $body .= "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        // Redirection après l'envoi du message
        header("Location: index.php?success=true");
    } else {
        // Redirection en cas d'échec de l'envoi du message
        header("Location: index.php?success=false");
    }
}
?>