<?php

$SERVER="localhost";
$utilisateur="root";
$motDepasse="";
$base="recervation_billet";
$con=mysqli_connect($SERVER,$utilisateur,$motDepasse,$base);

$a=$_POST["volsId"];
$b=$_POST["lieu_depart"];
$c=$_POST["date_depart"];



$r=("DELETE FROM vol WHERE volID='$a' AND  lieu_depart ='$b' AND date_depart='$c'");
$ro=mysqli_query($con,$r);

if(!empty($ro)){
    header("Location: menuGenerale.php ");
    

}else{ 
    echo"Erreur :les données n'ont pas été supprimer dans la base données";
}

?>

<a href="supprimervols.HTML"><input type="button" value="Retour"> </a>;



