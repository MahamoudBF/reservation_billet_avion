<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du Mot de Passe</title>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555555;
        }

        input[type='password'] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type='submit'] {
            background-color: #4caf50;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type='submit']:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
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
    $questionIndex = $connexion->real_escape_string($_POST["question"]);
    $reponse = $connexion->real_escape_string($_POST["reponse"]);

    // Requête pour vérifier la réponse à la question de sécurité
    $requete = "SELECT administrationID, nom_adm, email_adm,  reponse_securite FROM administrateur WHERE email_adm = '$email'";
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        $administrateur = $resultat->fetch_assoc();

        // Vérifier la réponse à la question de sécurité
        if ( $administrateur["reponse_securite"] == $reponse) {
            // Afficher le formulaire pour saisir le nouveau mot de passe
            echo "<h1>Réinitialisation du mot de passe</h1>";
            echo "<form action='mise_a_jour_password.php' method='post'>";
            echo "<label for='nouveau_mot_de_passe'>Nouveau Mot de Passe :</label>";
            echo "<input type='password' name='nouveau_mot_de_passe' required>";
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<input type='submit' value='Modifier le mot de passe'>";
            echo "</form>";
        } else {
            // Afficher un message d'erreur si la réponse est incorrecte
            echo "<p>La réponse à la question de sécurité est incorrecte.</p>";
        }
    } else {
        // Afficher un message d'erreur si l'e-mail n'est pas trouvé
        echo "<p>Aucun administrateur trouvé avec cet e-mail.</p>";
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>

</body>

</html>