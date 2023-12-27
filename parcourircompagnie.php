<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Compagnie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        input[type="reset"],
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            margin-right: 8px;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="container">
        <?php
        $SERVER = "localhost";
        $utilisateur = "root";
        $motDepasse = "";
        $base = "recervation_billet";
        $con = mysqli_connect($SERVER, $utilisateur, $motDepasse, $base);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $nom = $_POST["nom"];

        $r = mysqli_query($con, "SELECT * FROM compagnie WHERE nom='$nom'");
        while ($you = mysqli_fetch_assoc($r)) {
            $id = $you['compagnieID'];
            $nom = $you['nom'];
            $code = $you['code_Compagnie'];
            $pays = $you['pays_origine'];
            echo " <br> <br> <br> <center>";
            echo "<form method='post' action='modifiercompagnie.php'><table border='2'>
                <tr>
                <td>Numero :</td><td><input type='number' name='id' value='$id' readonly> </td>
                </tr>";
            echo "<tr><td>Nom:</td><td><input type='text' name='nom' size='30%' value='$nom'></td></tr>";
            echo "<tr><td>Code_compagnie:</td><td> <input type='text' name='code' value='$code'> </td></tr>";
            echo "<tr><td>pays_origine:</td><td> <input type='text' name='pays' value='$pays' ></td></tr>";
            echo "<tr><td></td><td><input type='reset' name='reset' value='Annuler'><input type='submit' value='Modifier'></td>";
            echo "</table></form>";
            echo " </center>";
        }

        mysqli_close($con);
        ?>
    </div>
</body>

</html>
