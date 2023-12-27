<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #ffffff;
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

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            form {
                width: 90%;
            }
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

    // Récupérer l'e-mail soumis par le formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $connexion->real_escape_string($_POST["email"]);

        // Requête pour rechercher l'e-mail dans la table des administrateurs
        $requete = "SELECT administrationID,nom_adm,email_adm
         FROM administrateur WHERE email_adm = '$email'";
        $resultat = $connexion->query($requete);

        if ($resultat->num_rows > 0) {
            // Afficher les informations sous forme de tableau
            echo "<h1>Informations de l'administrateur</h1>";
            echo "<table>";
            echo "<tr><th>Attribut</th><th>Valeur</th></tr>";

            $row = $resultat->fetch_assoc();
            foreach ($row as $attribut => $valeur) {
                echo "<tr><td>$attribut</td><td>$valeur</td></tr>";
            }

            echo "</table>";
 // Formulaire pour répondre à la question de sécurité choisie
 echo "<form action='verifier_reponse.php' method='post'>";
 echo "<h2>Choisissez une question de sécurité :</h2>";

 // Questions de sécurité (à personnaliser selon vos besoins)
 $questions = array(
     "Quel est le nom de votre premier animal de compagnie?",
     "Dans quelle ville êtes-vous né(e)?",
     "Quel est le prenom de ton meilleur ami du quartier?",
     "Quel est le prénom de votre grand-père maternel?",
     "Quel est votre plat préféré?"
 );

 // Afficher la liste déroulante des questions
 echo "<label for='question'>Choisissez une question :</label>";
 echo "<select name='question' id='question' required>";
 foreach ($questions as $index => $question) {
     echo "<option value='$index'>$question</option>";
 }
 echo "</select>";

 // Champ pour saisir la réponse
 echo "<label for='reponse'>Réponse à la question choisie :</label>";
 echo "<input type='text' name='reponse' required>";

 // Champ caché pour stocker l'e-mail
 echo "<input type='hidden' name='email' value='$email'>";

 // Bouton pour soumettre la réponse
 echo "<input type='submit' value='Soumettre la réponse'>";
 echo "</form>";
} else {
 // Afficher un message d'erreur si l'e-mail n'est pas trouvé
 echo "<p>Aucun administrateur trouvé avec cet e-mail.</p>";
}

// Fermer la connexion à la base de données
$connexion->close();
}
?>

</body>

</html>
