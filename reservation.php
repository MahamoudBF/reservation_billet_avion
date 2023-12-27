
        <?php
        // Vérifie si l'ID du vol sélectionné a été transmis
        if (isset($_POST['vol_selectionne'])) {
            // Récupère l'ID du vol sélectionné
            $id_vol_selectionne = $_POST['vol_selectionne'];

            // Connexion à la base de données (à ajuster selon vos paramètres)
            $serveur = "localhost";
            $utilisateur = "root";
            $mot_de_passe = "";
            $base_de_donnees = "recervation_billet";

            $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

            // Vérifie la connexion
            if ($connexion->connect_error) {
                die("La connexion a échoué : " . $connexion->connect_error);
            }

            // Construit la requête SQL pour récupérer les détails du vol sélectionné
            $sql = "SELECT * FROM Vol WHERE volID = '$id_vol_selectionne'";
            $result = $connexion->query($sql);

            // Vérifie si la requête s'est bien déroulée
            if ($result === false) {
                echo "Erreur lors de l'exécution de la requête SQL : " . $connexion->error;
            } else {
                // Affiche les détails du vol sélectionné
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    echo "<h2>Détails du Vol</h2>";
                    echo "<p><strong>Lieu de départ:</strong> " . $row['lieu_depart'] . "</p>";
                    echo "<p><strong>Lieu d'arrivée:</strong> " . $row['lieu_arrivee'] . "</p>";
                    echo "<p><strong>Heure de départ:</strong> " . $row['Heure_depart'] . "</p>";
                    echo "<p><strong>Heure d'arrivée:</strong> " . $row['Heure_arrivee'] . "</p>";
                    echo "<p><strong>Nombre d'escales:</strong> " . $row['nombre_escale'] . "</p>";
                    echo "<p><strong>Prix:</strong> " . $row['Prix'] . "</p>";

                    // Si le type de voyage est "aller retour", affiche la colonne "Date de Retour"
                    if ($row['type_voyage'] == "allerRetour") {
                        echo "<p><strong>Date de Retour:</strong> " . $row['date_retour'] . "</p>";
                    }
                } else {
                    echo "Aucun vol trouvé pour l'ID spécifié.";
                }
            }

            // Ferme la connexion à la base de données
            $connexion->close();
        } 
        ?>
    
