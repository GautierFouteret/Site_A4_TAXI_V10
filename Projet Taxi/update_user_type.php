<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'base.php'; // Assurez-vous que ce fichier contient vos informations de connexion

    $id_utilisateur = $_POST['ID_UTILISATEUR'];
    $type_utilisateur = $_POST['TYPE_UTILISATEUR'];

    $sql = "UPDATE utilisateur SET TYPE_UTILISATEUR='$type_utilisateur' WHERE ID_UTILISATEUR='$id_utilisateur'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Le type d'utilisateur a été mis à jour.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<p> 
<br>
-> <a href="gestion_utilisateur.php">Retourner à la gestion des utilisateurs </a><br>
</p>