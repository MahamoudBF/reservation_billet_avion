<?php
$SERVER = "localhost";
$utilisateur = "root";
$motDepasse = "";
$base = "recervation_billet";
$con = mysqli_connect($SERVER, $utilisateur, $motDepasse, $base);

$a = $_POST["volsId"];
$b = $_POST["comID"];
$c = $_POST["lieudepart"];
$d = $_POST["lieu_arrivee"];
$e = $_POST["date_depart"];
$f = $_POST["date_retour"];
$g = $_POST["Heure_depart"];
$h = $_POST["Heure_arrivee"];
$i = $_POST["nombre_escale"];
$j = $_POST["Prix_total"];

$r = "UPDATE vol SET volID=$a, compagnieID='$b', lieu_depart='$c', lieu_arrivee='$d',
      date_depart='$e', date_retour='$f', Heure_depart='$g', Heure_arrivee='$h', nombre_escale='$i', Prix='$j' 
      WHERE volID=$a";

$result = mysqli_query($con, $r);

if (!empty($result)) {
    echo "Les données ont bien été modifiées dans la base de données.";
} else {
    echo "Erreur : les données n'ont pas été modifiées dans la base de données.";
}

mysqli_close($con);
?>
<div align="right">
    <form method="POST" ACTION="menuGenerale.php">
      <a href="menuGenerale.php"> <input type="button" value="Retour"></a> 
    </form>
</div>
