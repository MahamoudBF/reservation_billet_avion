<?php
 session_start();
$SERVEUR = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "recervation_billet";
$c = mysqli_connect($SERVEUR, $utilisateur, $motdepasse, $base);

$nom = $_POST['nom'];
$password = $_POST['mot_passe'];

// Sélectionner le mot de passe haché associé au nom d'utilisateur
$query = mysqli_query($c, "SELECT mot_de_passe FROM administrateur WHERE nom_adm='$nom'");

if ($row = mysqli_fetch_assoc($query)) {
    $hashedPassword = $row['mot_de_passe'];
    $_SESSION['nom'] = $nom;
    $_SESSION['mot_passe'] = $password;

    // Vérifier le mot de passe haché
    if (hash('sha256', $password) == $hashedPassword) {
        // Mot de passe correct
        header("location: menuGenerale.php");
        exit();
    } else {
        // Mot de passe incorrect
        echo "Le nom ou le mot de passe est incorrect";
    }
} else {
    // L'utilisateur n'existe pas
    echo "Le nom ou le mot de passe est incorrect";
}
?>
