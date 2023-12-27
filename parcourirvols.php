<?php
$SERVER = "localhost";
$utilisateur = "root";
$motDepasse = "";
$base = "recervation_billet";
$con = mysqli_connect($SERVER, $utilisateur, $motDepasse, $base);

$a = $_POST["volsId"];
$R = mysqli_query($con, "SELECT * FROM vol WHERE volID=$a");
while ($you = mysqli_fetch_assoc($R)) {
    $a = $you['volID'];
    $b = $you['compagnieID'];
    $c = $you['lieu_depart'];
    $d = $you['lieu_arrivee'];
    $e = $you['date_depart'];
    $f = $you['date_retour'];
    $g = $you['Heure_depart'];
    $h = $you['Heure_arrivee'];
    $i = $you['nombre_escale'];
    $j = $you['Prix'];
    echo "<center> <br> <br> <br> <br>";
    echo "<form method='post' action='modifiervols.php'> <table border=2>
        <tr>
        <td>Numero :</td><td><input type='number' name='volsId' value='$a' readonly></td>
        </tr>";
    echo "<tr><td>compagnieID:</td><td><input type='number' name='comID' value='$b'></td></tr>";
    echo "<tr><td>lieu_depart:</td><td> <input type='text' name='lieudepart' value='$c'></td></tr>";
    echo "<tr><td>lieu_arrivee:</td><td><input type='text' name='lieu_arrivee' value='$d'></td></tr>";
    echo "<tr><td>date_depart:</td><td><input type='date' name='date_depart' value='$e'></td></tr>";
    echo "<tr><td>date_retour:</td><td><input type='date' name='date_retour' value='$f'></td></tr>";
    echo "<tr><td>Heure_depart:</td><td><input type='time' name='Heure_depart' value='$g'></td></tr>";
    echo "<tr><td>Heure_arrivee:</td><td><input type='time' name='Heure_arrivee' value='$h'></td></tr>";
    echo "<tr><td>nombre_escale:</td><td><input type='number' name='nombre_escale' value='$i'></td></tr>";
    echo "<tr><td>Prix:</td><td><input type='number' name='Prix_total' value='$j'></td></tr>";
    echo "<tr><td></td><td><input type='reset' name='reset' value='Annuler'><input type='submit' value='Modifier'></td>";
    echo "</table></form>  </center>";
}

mysqli_close($con);
?>

<style>
    body {
        /* Votre style actuel pour le corps */
    }

    form {
        color: black;
        max-width: 500px;
        margin: 10px auto;
        background-color: rgb(127, 127, 127);
        opacity: 0.8;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        opacity: 0.8;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: white;
    }

    .i1 {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: green;
        color: white;
        padding: 10px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid white;
    }

    th, td {
        padding: 10px;
        text-align: left;
        color: white;
    }
</style>
