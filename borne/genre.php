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
$req = $pdo->prepare("SELECT DISTINCT titre,lienImg,texte FROM metrage WHERE texte LIKE ? ORDER BY id");
$recherche="%".$_POST['genre']."%" ;

$req->bindParam(1, $recherche);

$req->execute();



?>







<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="utf-8">
<title> Lille Mini Métrage </title>
<link rel="stylesheet" href="style.css">
<link rel="manifest" href="manifest.json">
<link rel="stylesheet" href="normalize.css">
<script src="script.js"></script>
</head>
<body> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    
    
<!--Grande Image sur le menu d'accueil-->
<header>

    
    
        <div class="wrapper">
            <div class="content">
                    <h1> Les métrages </h1>
                
                 <a href="liste.php" title="Vous ne le regretterez pas !" class="relink">Revoir la liste complète des métrages</a> 
                
        <form action="recherche.php" method="post" class="formu" >
            <div class="alignement">
<p>
     <input type="text" name="titre" placeholder="Rechercher un métrage"/>
    <input type="submit" value="Valider" />
</p>       
            </div>
</form>
                
        <form action="genre.php" method="post" class="formu">
            <div class="alignement">
<p>
     <input type="text" name="genre" placeholder="Rechercher un genre " />
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
    echo '<img src="'.$donnees["lienImg"].'" width="700"/>';
    echo"</br>";
    echo  $donnees['texte']; 
    echo"</br> </br> </br> </br>";
}

?>
    </div>
    
    
    
    </header>

