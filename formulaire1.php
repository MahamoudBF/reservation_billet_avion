<?php
session_start();

$serveur = "localhost"; 
$utilisateur = "root"; 
$mot_de_passe = ""; 
$base_de_donnees = "recervation_billet"; 

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$code_passport = $_POST['code_passport'];
$email = $_POST['email'];
$Numero_telephone = $_POST['Numero_telephone'];
$Sexe = $_POST['Sexe'];

// Insertion du passager
$sqlPassager = "INSERT INTO passager (nom, prenom, adresse, Email, Numero_telephone, Sexe, code_passport) 
               VALUES ('$nom', '$prenom', '$adresse', '$email', '$Numero_telephone', '$Sexe', '$code_passport')";

if ($connexion->query($sqlPassager) === TRUE) {
    // Récupération du dernier Numero_Reservation inséré
    $lastReservationID = $connexion->insert_id;

    // Redirection vers la page de paiement
    header("Location: paiement.html?reservationID=$lastReservationID");
    exit();
} else {
    echo "Erreur lors de l'enregistrement du passager : " . $connexion->error;
}

$connexion->close();
?>

