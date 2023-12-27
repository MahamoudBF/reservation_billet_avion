<?php
// Connexion à la base de données (à adapter avec vos informations de connexion)
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "recervation_billet";

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Récupérer les données soumises par le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $connexion->real_escape_string($_POST["email"]);
    $nouveauMotDePasse = $connexion->real_escape_string($_POST["nouveau_mot_de_passe"]);

    // Hacher le nouveau mot de passe avec SHA-256
    $motDePasseHache = hash('sha256', $nouveauMotDePasse);

    // Requête pour mettre à jour le mot de passe dans la base de données
    $requete = "UPDATE administrateur SET mot_de_passe = '$motDePasseHache' WHERE email_adm = '$email'";
    $resultat = $connexion->query($requete);

    if ($resultat) {
        echo "<p>Mot de passe modifié avec succès.</p>";
    } else {
        echo "<p>Erreur lors de la modification du mot de passe.</p>";
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>
