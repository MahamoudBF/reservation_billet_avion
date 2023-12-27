
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Général</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: auto;
            padding: 0;
            background-image: url(airwalp.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
          
            align-items: center;
            justify-content: center;
            height: 100vh;
            
        }

        header{
            margin: auto;
            padding: 0;
            
            width:auto;
            background-color:gris;
            

        }
     
        .d1 {
    display: flex;
    justify-content: space-between;
    align-items: center; }

.d1 img {
    /* Styles pour l'image à droite */
    margin-right: 10px; 
}

.d1 h2 {
    /* Styles pour le bouton à gauche */
    background-color: rgba(48, 67, 90, 0.1);
    color: red;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}

 #menu {
           
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 100px;
            transform: translate(-50%, -50%);
          display: flex;
        }

    .menu-container { 
    border-radius: 10px;
    background-color: rgba(48, 67, 90, 0.7);
    padding: 40px;
    color: #fff;
    
    margin: 0 10px; 
   
}
td{
    padding: 20px;
    width: 10px;
}


        .menu-container a {
         margin:10px auto;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            margin: 0 10px;
            border: 1px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
         
        }

        .menu-container a:hover {
            background-color:green;
        }
      
    </style>
</head>
<center>

 </center>
<body>
<div>     <?php
session_start();
if (isset($_SESSION['nom'], $_SESSION['mot_passe'])) {
    
echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'class='logout-form'>
    <h2><input type='submit' name='deconnexion' value='Déconnecter' class='bouton'></h2>
  </form>";
 if (isset($_POST['deconnexion'])) {
    // DÃ©truire la session si le bouton de dÃ©connexion est soumis
    session_destroy();
   
   
    // Rediriger vers la page de connexion
    header('Location: connexion.html');
    
}}
else {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: connexion.html');
    exit();}

 ?> </div> 
 


  <header> 
<center><h1> MENUE GENERALE </h1></center>
 </header>  

 

<div id="menu">
   
    <div class="menu-container">
        
        <div class="cn2">
       <center><h2> Vols  </h2></center> <br>
        <table border="0">
            <tr><td><a href="affichervols.php">Afficher</a></td>
                <td><a href="ajoutervols.html">Ajouter</a></td></tr>
                <tr><td> <a href="supprimervols.html">Supprimer</a></td>
                <td><a href="modifiervols.html">Modifier</a></td></tr>
        </table>
        
        
       
       
    </div>
    </div>

    <div class="menu-container">
        
        <div class="cn2">
       <center><h2> Compagnies </h2></center> 
        <table border="0">
<tr><td> <a href="affichercompagnie.php">afficher</a></td>
    <td><a href="ajoutercompagnie.html">Ajouter</a> </td></tr>
    <tr><td><a href="supprimercompagnie.html">Supprimer</a></td>
        <td><a href="modifiercompagnie.html">Modifier</a></td></tr>
        </table>
    </div>
    </div>

    <div class="menu-container">
        
        <div class="cn2">
       <center><h2> Reservation </h2></center> 
        <table border="0">
<tr><td> <a href="afficherReservation.php">afficher</a></td>
    <td><a href="supprimerReservation.html">Supprimer</a></td>
       </tr>
        </table>
    </div>
    </div>


</div>



</body>


</html>



