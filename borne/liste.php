<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="utf-8">
<title> Liste des métrages </title>
<link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
<script src="script.js"></script>
</head>
<body>
    <a href="index.html" class="Return">Retour</a>
<div id="titre-liste">
<h2 style="margin-bottom: 0px; margin-top: 0px;"> Liste des métrages</h2>
    </div>
    
    <?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=formulaire_web;host=localhost';
$user = 'root';
$password = '';


try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// On recupere tout le contenu de la table news
$req = $pdo->prepare("SELECT DISTINCT titre,lienImg,texte FROM metrage ORDER BY id");


$req->execute();

?>
    
    
<!--Grande Image sur le menu d'accueil-->
<header>

    
    
        <div class="wrapper">
            <div class="content">
                   
                
        <form action="recherche.php" method="post" class="formu">
    <div class="alignement">
<p>
     <input type="text" name="titre" placeholder="Rechercher un métrage" />
    <input type="submit" value="Valider" />
</p>       
            </div>
</form>
             
                
                
        <form action="genre.php" method="post" class="formu" >
            <div class="alignement">
<p>
         <select id="pet-select"  name="genre">
    <option value="">--Choisissez le genre-</option>
    <option value="humour">Humour</option>
    <option value="drame">Drame</option>
    <option value="aventure">Aventure</option>
    <option value="decouverte">Découverte</option>
</select>
    <input type="submit" value="Valider" />
</p>      
            </div>
</form>   
            </div> 
    
        </div>
    
    <div align="center">
        
        
<?php

// On affiche le resultat
while ($donnees = $req->fetch()){
    echo $donnees['titre'];
    echo"</br>";
    echo '<img src="'.$donnees["lienImg"].'" width="500" height="300"/>';
    echo"</br>";
    echo"</br>";
    echo"</br>";
}

?>

    </div>
    
    
    
    </header>
  
</body>
<footer>
</footer>
</html>
