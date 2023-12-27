<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations de vols</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            
      background-size: cover;
      background-repeat: no-repeat;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
  <center> <h1>Reservation des vols qui n'ont pas encore passer</h1></center>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recervation_billet";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête SQL pour récupérer les informations nécessaires avec jointure simple et ajout du prénom du passager
$sql = "SELECT r.Numero_Reservation, v.lieu_depart, v.lieu_arrivee, v.date_depart, v.Heure_depart, v.Heure_arrivee, c.nom AS nom_compagnie, p.Nom AS nom_passager, p.Prenom AS prenom_passager
        FROM Vol v, Reservation r, Compagnie c, Passager p
        WHERE v.volID = r.volID
        AND v.compagnieID = c.compagnieID
        AND r.Numero_Reservation = p.Numero_Reservation
        AND CONCAT(v.date_depart, ' ', v.Heure_depart) > NOW()";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les en-têtes
    echo "<table><tr><th>Numéro de Réservation</th><th>Lieu Départ</th><th>Lieu Arrivée</th><th>Date Départ</th><th>Heure Départ</th><th>Heure Arrivée</th><th>Nom Compagnie</th><th>Nom Passager</th><th>Prénom Passager</th></tr>";

    // Afficher les données
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Numero_Reservation"]. "</td><td>" . $row["lieu_depart"]. "</td><td>" . $row["lieu_arrivee"]. "</td><td>" . $row["date_depart"]. "</td><td>" . $row["Heure_depart"]. "</td><td>" . $row["Heure_arrivee"]. "</td><td>" . $row["nom_compagnie"]. "</td><td>" . $row["nom_passager"]. "</td><td>" . $row["prenom_passager"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion
$conn->close();
?>



</body>
</html>
