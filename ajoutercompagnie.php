<?php
$SERVER="localhost";
$utilisateur="root";
$motDepasse="";
$base="recervation_billet";
$con=mysqli_connect($SERVER,$utilisateur,$motDepasse,$base);





    $conn = new mysqli($SERVER, $utilisateur, $motDepasse, $base);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the form
    $nom = $_POST["nom"];
    $code = $_POST["code"];
    $pay = $_POST["pay"];

    // SQL query to insert data into the Compagnie table
    $sql = "INSERT INTO Compagnie (nom, code_Compagnie, pays_origine) VALUES ('$nom', '$code', '$pay')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("Location: menuGenerale.php ");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();

?>


