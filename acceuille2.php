<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuille</title>
    
</head>
<body>
    <style>
body{
    margin: auto;
    width: auto;
   background-color: white;
    background-size: cover;
    padding: auto;
    border-radius: 15px;
}

   

header{
    width: auto;
    padding: 25px;
    margin: auto;
    border-radius: 10px;
    background: linear-gradient(#c5c3ce,#333);
  
}
.d2 {
    margin: 30px 20px 20px 30px auto;
    height: auto;
    width: 100%;
    text-align: center;
    display: flex;
}

.d3 {        
    width: 400px;
    height: 500px;
    background-color: rgba(240, 248, 255, 0.7); 
    border-radius: 10px;
    flex: 1; 
    border: 1px solid #ccc; 
    margin: 40px;
    position: relative;
            overflow: hidden;
            perspective: 1000px; 
            transform-style: preserve-3d;
            transition: transform 0.5s;
    
}
.d3 p {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    color: #333; 
    margin-bottom: 15px; 
    
}
.d3:hover {
    transform: rotateY(-45deg);
    }

    .d3 img {
        width: 100%;
        height: 50%;
        object-fit: cover;
    }

.ph1{
    margin: auto;
    padding: auto;
}

input[name="villeDepart"]{
    padding: 8px;
    width: 180px;
}
input[name="villearrive"]{
    padding: 8px;
    width: 180px;
}
input[name="datedepart"]{
    padding: 8px;
    width: 180px;
}
input[name="dateRetour"]{
    padding: 8px;
    width: 180px;
}
input[ NAME="sonnom" ]{
    padding: 8px;
    width: 180px;
}
input[name="rechercher"]{
    padding: 8px;
    width: 180px;
    background-color: rgb(5, 245, 49);
}

.p1{
   width: 1300px;
    height: 500px;
    


}

table{
   
    width: 100%;
}
footer {
    background-color: #333; /* Couleur de fond du pied de page */
    color: #fff; /* Couleur du texte */
    padding: 20px;
    text-align: center;
}

.footer-service,
.footer-info,
.footer-reseau {
    display: inline-block;
    vertical-align: top;
    margin: 0 20px;
    width: 30%;
}

.footer-service h3,
.footer-reseau h3 {
    color: #fff; /* Couleur du titre */
}

.footer-service ul,
.footer-reseau ul {
    list-style: none;
    padding: 0;
}

.footer-service ul li,
.footer-reseau ul li {
    margin-bottom: 10px;
}

.footer-info {
    margin-top: 20px;
}

.footer-info img {
    width: 50px; /* Ajuster la taille de l'image */
}

.liste-media {
    padding: 0;
}

.liste-media li {
    margin-bottom: 10px;
}

.liste-media a {
    text-decoration: none;
    color: #fff; /* Couleur du texte des liens */
}

.liste-media img {
    width: 30px; /* Ajuster la taille des icônes des réseaux sociaux */
    margin-right: 10px;
}






    </style>
   
   
   <script>
    function afficherDateRetour() {
        var typeVoyage = document.getElementById("typeVoyage");
        var dateRetour = document.getElementById("dateRetour");
        var labelDateRetour = document.getElementById("labelDateRetour");

        if (typeVoyage.value === "allerRetour") {
            dateRetour.style.display = "block";
            labelDateRetour.style.display = "block";
        } else {
            dateRetour.style.display = "none";
            labelDateRetour.style.display = "none";
        }
    }
   

</script>
        <header> <form action="rechercher.php" method="post" onsubmit="return validerDates()">
            <IMG SRC="logotiket.png"50" height="50" >
             
    <table  border="0"><tr>  
        <td>    <select class="champ" id="typeVoyage" name="typeVoyage" onchange="afficherDateRetour()">
            <option value="allerRetour" name="allerRetour" >Aller-retour</option>
            <option value="allerSimple" name="allerSimple">Aller simple</option>
           
        </select></td></tr>
      
    <tr >
        <td> <input  type="text"  name="villeDepart" required placeholder="ville de depart"></td>
        <td> <input  type="text"  name="villearrive" required placeholder="ville d'Arrivee"></td>
        <td> <input class="champ" type="date" id="periode" name="datedepart" required placeholder="date de depart" min="<?php echo date('Y-m-d');?>"></td>
        <td><input class="champ" type="date" id="dateRetour" name="dateRetour" placeholder="date de retour" min="<?php echo date('Y-m-d');?>"></td>
        <td>  <INPUT  TYPE="text" NAME="sonnom" SIZE="25" MAXLENGTH="50" placeholder="nombre passage" ></td>
        <td> <input type="submit" name="rechercher" value="Rechercher" >     </td>
    </tr>
  
    </table>  </form>
        </header>

        
        <div class="d2">
            
            <div class="d3"><img src="A3.png" width="100%" height="50%">
                <p><div class="annonce">
                    <p>Toutes les grandes compagnies aériennes sont à votre disposition pour vous offrir des voyages exceptionnels à travers le monde. 
                        Explorez les horizons avec Air Djibouti, ressentez l'hospitalité de Turkish Airlines,
                         découvrez le luxe de Qatar Airways, plongez dans l'histoire avec Ethiopian Airlines,
                          et vivez l'excellence de l'aviation avec Air France.
                            Réservez dès maintenant et préparez-vous à un voyage inoubliable!</p>
                </div>
                </p>
                </div>
                <div class="d3"><img src="airDJ.jpeg" width="100%" height="50%">
                    <p> 
                        La compagnie a été créée en juillet 1963. En 1977, lors de la déclaration de l'indépendance de Djibouti, la compagnie a été réorganisée financièrement : 
                        les parts de l'État français ont été redistribuées.

                     Air Djibouti a effectué le 3 août 2015 son premier vol depuis sa mise en faillite en 2002. 
                        Ce vol, qui marque la renaissance de la compagnie aérienne étatique djiboutienne, a été effectué entre Djibouti et Hargeisa (Somalie)
                        à bord d’un avion cargo de type Fokker qui transportait six tonnes de marchandises.
                    </p>
                    </div>
            
            <div class="d3"><img src="tk.jpg" width="100%" height="50%">
            <p>Turkish Airlines (en turc Türk Hava Yolları Anonim Ortaklığı, Code AITA : TK ; code OACI : THY) est la compagnie aérienne nationale turque,
                 ainsi que la principale dans le pays. La compagnie fait partie de Star Alliance. 
                 Elle a pour activité principale le transport de passagers, de fret ainsi que la maintenance et l'entretien des avions.</p>
                
            </div>
        </div>
        <div class="d2">
            <div class="d3"><img src="qatar.jpeg" width="100%" height="50%">
            <p>Desservant six continents, Qatar Airways est l’une des compagnies aériennes internationales les plus jeunes et les meilleures au monde. 
                Élue « Compagnie aérienne de l’année » en 2017, Qatar Airways (QR) est également réputée pour être l’une des compagnies aériennes à la progression la plus rapide au monde. 
                L’impressionnante compagnie aérienne nationale du Qatar a son siège social dans la Qatar Airways Tower de Doha.</p>
            </div>
            <div class="d3"><img src="airEthio.jpeg" width="100%" height="50%">
                <p>Ethiopian Airlines est la compagnie aérienne nationale éthiopienne.
                     Elle a été fondée en 1945 sous le nom d'Ethiopian Air Lines (EAL) et a adopté son nom actuel en 1965.
                     Elle fait partie de l'Association internationale du transport aérien depuis 1959 et de l'Association aérienne africaine depuis sa création en 1968.
                      Elle fait partie de l'alliance de compagnies aériennes Star Alliance depuis 2011.</p>
            </div>
            <div class="d3"><img src="airfr.jpeg" width="100%" height="50%">
            <p>Desservant six continents, Qatar Airways est l’une des compagnies aériennes internationales les plus jeunes et les meilleures au monde.
                 Élue « Compagnie aérienne de l’année » en 2017, Qatar Airways (QR) est également réputée pour être l’une des compagnies aériennes à la progression la plus rapide au monde. 
                L’impressionnante compagnie aérienne nationale du Qatar a son siège social dans la Qatar Airways Tower de Doha.</p>
            </div>
        </div>
      
        <footer>

<div class="footer-service">
    

<ul>
    <h3>Nos service</h3>
    <li><p>Tel : 77 15 34 98 </p></li>
    <li><p>Email : mouminabdihoche@gmail.com </p></li>
</ul></div>


<div class="footer-info">
    <h3> A propos de Nous: </h3>
    <a href="aide.html"><img src="infos1.jpg" ></a>

</div>



<div class="footer-reseau">
    <h3>Nos Reseau</h3>
    <ul class="liste-media">
        <li><a href="#"><img src="fb.jpeg" ></a>Fecebook</li>
        <li><a href="#"><img src="WhatsApp.jpeg" ></a>WhatsApp </li>
        <li><a href="#"><img src="instagram.jpeg" ></a>instagram </li>
    </ul>
    </div>
<hr>
<p> Copyright   2023   Air Ticket Booking </p>




        </footer>


        





  
    
</body>
</html>