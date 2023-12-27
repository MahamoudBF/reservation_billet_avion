<?php
$SERVER="localhost";
$utilisateur="root";
$motDepasse="";
$base="recervation_billet";
$con=mysqli_connect($SERVER,$utilisateur,$motDepasse,$base);

$num=$_POST["id"];
$nom=$_POST["nom"];

$q=("DELETE FROM compagnie WHERE compagnieID='$num' AND nom='$nom' ");
$ro=mysqli_query($con,$q);

if(!empty($ro)){
    header("Location: menuGenerale.php ");
    

}else{ 
    echo"Erreur :les données n'ont pas été supprimer dans la base données";
}
?>
<a href="supprimercompagnie.php"><input type="button" value="Retour"> </a>;



