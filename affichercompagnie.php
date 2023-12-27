<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Compagnies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
           
      background-size: cover;
      background-repeat: no-repeat;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        a.button {
            display: block;
            width: 150px;
            padding: 10px;
            text-align: center;
            margin: 20px auto;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Liste des Compagnies</h1>
    </header>

    <div class="container">
        <?php
        
            $SERVEUR = "localhost";
            $utilisateur = "root";
            $motdepasse = "";
            $base = "recervation_billet";
            $m = mysqli_connect($SERVEUR, $utilisateur, $motdepasse, $base);
            $result = mysqli_query($m, "SELECT * FROM compagnie ");
        ?>
        <table>
            <tr>
                <th>CompagnieID</th>
                <th>Nom de compagnie</th>
                <th>Code compagnie</th>
                <th>Pays origine</th>
            </tr>
            <?php
                while ($ligne = mysqli_fetch_array($result)) {
                    $id = $ligne[0];
                    $nom = $ligne[1];
                    $code = $ligne[2];
                    $pays = $ligne[3];

                    echo "<tr>
                            <td>$id</td>
                            <td>$nom</td>
                            <td>$code</td>
                            <td>$pays</td>
                        </tr>";
                }
            ?>
        </table>

        <a href="menuGenerale.php" class="button">Retour au Menu Général</a>
    </div>

</body>
</html>
