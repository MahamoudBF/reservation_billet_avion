<?php
// Connexion à la base de données (à ajuster selon vos paramètres)
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "recervation_billet";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['vol_selectionne'])) {
    // Récupérer l'ID du vol sélectionné
    $volID = $_POST['vol_selectionne'];

    // Insérer le vol sélectionné dans la table de réservation
    $insertSQL = "INSERT INTO Reservation (volID) VALUES ('$volID')";

    if ($connexion->query($insertSQL) === TRUE) {
        header("Location: formulaire1.html");
    } else {
        echo "Erreur lors de l'enregistrement du vol : " . $connexion->error;
    }
} else {
    echo "Aucun vol sélectionné pour l'enregistrement.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
