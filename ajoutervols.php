<?php
$SERVER="localhost";
$utilisateur="root";
$motDepasse="";
$base="recervation_billet";
$con=mysqli_connect($SERVER,$utilisateur,$motDepasse,$base);



$b=$_POST["comID"];
$c=$_POST["lieudepart"];
$d=$_POST["lieu_arrivee"];
$e=$_POST["date_depart"];
$f=$_POST["date_retour"];
$g=$_POST["Heure_depart"];
$h=$_POST["Heure_arrivee"];
$i=$_POST["nombre_escale"];
$j=$_POST["Prix"];


$r=("INSERT INTO vol (compagnieID, lieu_depart, lieu_arrivee, date_depart, 
                      date_retour, Heure_depart, Heure_arrivee, nombre_escale, Prix)
 VALUES('$b','$c','$d','$e','$f','$g','$h','$i','$j')");


$res=mysqli_query($con,$r);

if($res){
    header("Location: menuGenerale.php ");
   

}else{ 
    header("location:menuGenerale.php");
}


?>





