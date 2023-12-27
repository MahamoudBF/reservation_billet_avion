<?php
$SERVER="localhost";
$utilisateur="root";
$motDepasse="";
$base="recervation_billet";
$con=mysqli_connect($SERVER,$utilisateur,$motDepasse,$base);

$rID=$_POST["ReservationID"];


$q=("DELETE FROM reservation WHERE  Numero_Reservation='$rID' ");
$ro=mysqli_query($con,$q);

if(!empty($ro)){
    header("Location: menuGenerale.php ");
    

}else{ 
    echo"Erreur :l'erreur de supprimer le reservation";
}
?>
<a href="menuGenerale.php"><input type="button" value="Retour"> </a>;


