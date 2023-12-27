<?php
$SERVER = "localhost";
$utilisateur = "root";
$motDepasse = "";
$base = "recervation_billet";
$con = mysqli_connect($SERVER, $utilisateur, $motDepasse, $base);

$a = $_POST["id"];
$b = $_POST["nom"];
$c = $_POST["code"];
$d = $_POST["pays"];

$r = "UPDATE compagnie SET compagnieID=$a, nom='$b', code_Compagnie='$c', pays_origine='$d' 
WHERE compagnieID=$a";
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
        <a href="menuGenerale.php"><input type="button" value="Retour"></a>
    </form>
</div>
