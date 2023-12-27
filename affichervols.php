<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Vols</title>
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
        <h1>Liste des Vols</h1>
    </header>

    <div class="container">
        <?php
            $SERVER = "localhost";
            $utilisateur = "root";
            $motDepasse = "";
            $base = "recervation_billet";
            $con = mysqli_connect($SERVER, $utilisateur, $motDepasse, $base);

            $r = "SELECT * FROM vol ";
            $res = mysqli_query($con, $r);
        ?>
        <table>
            <tr>
                <th>volID</th>
                <th>compagnieID</th>
                <th>lieu_depart</th>
                <th>lieu_arrivee</th>
                <th>date_depart</th>
                <th>date_retour</th>
                <th>Heure_depart</th>
                <th>Heure_arrivee</th>
                <th>nombre_escale</th>
                <th>Prix_total</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>{$row['volID']}</td>
                            <td>{$row['compagnieID']}</td>
                            <td>{$row['lieu_depart']}</td>
                            <td>{$row['lieu_arrivee']}</td>
                            <td>{$row['date_depart']}</td>
                            <td>{$row['date_retour']}</td>
                            <td>{$row['Heure_depart']}</td>
                            <td>{$row['Heure_arrivee']}</td>
                            <td>{$row['nombre_escale']}</td>
                            <td>{$row['Prix']}</td>
                        </tr>";
                }
            ?>
        </table>

        <a href="menuGenerale.php" class="button">Retour au Menu Général</a>
    </div>

</body>
</html>
