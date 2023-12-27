<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Vol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4 url("k1.jpg"); 
            background-size: cover;
            background-repeat: no-repeat;
        }

        header {
            background: linear-gradient(#c5c3ce,#333);
            color: white;
            padding: 1em;
            text-align: center;
            color:black;
        }
        #logo {
            float: left;
        }
        main {
            max-width: 1300px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: auto;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
           
            padding: 15px;
            text-align: center;
            white-space: nowrap;
        }

        th {
            background-color: #4CAF50;
            color: white;
            
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <img src="logotiket.png" alt="Logo" width="5*70" height="50" id="logo">
        <h1> Vol disponible </h1>
    </header>

    <main>
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

        // Vérifier si le formulaire de recherche a été soumis
        if (isset($_POST['rechercher'])) {
            // Récupérer les données du formulaire
            $typeVoyage = $_POST['typeVoyage'];
            $villeDepart = $_POST['villeDepart'];
            $villeArrivee = $_POST['villearrive'];
            $dateDepart = $_POST['datedepart'];
            $dateRetour = $_POST['dateRetour'];



          
                // Construire la requête SQL en fonction du type de voyage
                $sql = "SELECT v.*, c.nom AS nom_compagnie";

                // Si le type de voyage est "allerSimple"
                if ($typeVoyage == "allerSimple") {
                    $sql .= " FROM Vol v, Compagnie c
                              WHERE v.compagnieID = c.compagnieID
                              AND v.lieu_depart = '$villeDepart' AND v.lieu_arrivee = '$villeArrivee'
                              AND v.date_depart = '$dateDepart'
                              AND v.Heure_depart > NOW()"; // Ajout de la condition pour vérifier l'heure de départ
                }
                // Si le type de voyage est "aller retour"
                elseif ($typeVoyage == "allerRetour" && !empty($dateRetour)) {
                    $sql .= " FROM Vol v, Compagnie c
                              WHERE v.compagnieID = c.compagnieID
                              AND v.lieu_depart = '$villeDepart' AND v.lieu_arrivee = '$villeArrivee'
                              AND v.date_depart = '$dateDepart' AND v.date_retour = '$dateRetour'
                              AND v.Heure_depart > NOW()"; // Ajout de la condition pour vérifier l'heure de départ
                }
                

                // Exécuter la requête SQL
                $result = $connexion->query($sql);

                // Vérifier si la requête s'est bien déroulée
                if ($result === false) {
                    echo "Erreur lors de l'exécution de la requête SQL : " . $connexion->error;
                } else {
                    
                    // Afficher les résultats sous forme de tableau avec boutons de sélection
                    if ($result->num_rows > 0) {
                        echo "<form action='enregistrer_reservation.php' method='post'>";
                        echo "<table border='1'>
                                <tr>
                                    <th>Vol ID</th>
                                    <th>Nom Compagnie</th>
                                    <th>Lieu de départ</th>
                                    <th>Lieu d'arrivée</th>
                                    <th>Heure de départ</th>
                                    <th>Heure d'arrivée</th>
                                    <th>Nombre d'escales</th>
                                    <th>Prix</th>";

                        // Si le type de voyage est "aller retour", ajouter la colonne "Date de Retour"
                        if ($typeVoyage == "allerRetour") {
                            echo "<th>Date de Retour</th>";
                        }

                        echo "<th>Sélection</th>
                                </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['volID'] . "</td>";
                            echo "<td>" . $row['nom_compagnie'] . "</td>";
                            echo "<td>" . $row['lieu_depart'] . "</td>";
                            echo "<td>" . $row['lieu_arrivee'] . "</td>";
                            echo "<td>" . $row['Heure_depart'] . "</td>";
                            echo "<td>" . $row['Heure_arrivee'] . "</td>";
                            echo "<td>" . $row['nombre_escale'] . "</td>";
                            echo "<td>" . $row['Prix'] . "</td>";

                            // Si le type de voyage est "aller retour", ajouter la colonne "Date de Retour"
                            if ($typeVoyage == "allerRetour") {
                                echo "<td>" . $row['date_retour'] . "</td>";
                            }

                            echo "<td>
                            <button type='submit' name='vol_selectionne' value='" . $row['volID'] . "'>Sélectionner</button>
                        </td>";

                

                echo "</tr>";
            }

            echo "</table>";
            
        } else {
            echo "Aucun vol trouvé pour les critères spécifiés.";
        }
                }
            }
        

        // Fermer la connexion à la base de données
        $connexion->close();
        ?>
      
    </main>

    <footer>
        <p>&copy; 2023 Air Ticket booking </p>
    </footer>
</body>
</html>
