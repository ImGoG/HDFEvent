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

/* requete base de donnees */

$req = $pdo->prepare("INSERT INTO satisfaction (note, probleme) VALUES (?, ?)");
$req->bindParam(1, $_POST['note']);
$req->bindParam(2, $_POST['probleme']);
$req->execute();

?>    

<!DOCTYPE HTML>
<html>
    <head>
    <title>Mon Site</title>
        <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="normalize.css">
    </head>
    
    <body>
        
            
<!-- Menu (header) -->
<header2 role="header">
    
    <nav class="menu" role="navigation">
        <div class="inner">
            
    <div class="m-left">
        <h1 class="logo">Lille Mini Metrage</h1>
        </div>
            
        <div class="m-right">
            <a href="#" class="m-link"> <i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
            <a href="#" class="m-link"> <i class="fa fa-film" aria-hidden="true"></i> Metrage</a>
            <a href="#" class="m-link"> <i class="fa fa-ticket" aria-hidden="true"></i> Reservation</a>
            <a href="#" class="m-link"> <i class="fa fa-map-o" aria-hidden="true"></i> Plan</a>
        </div>
        <div class="m-nav-toogle">
            <span class="m-toogle-icon"></span>
            </div>   
        </div>
    </nav>
</header2>
 
    
    
    
    
    
<!--Grande Image sur le menu d'accueil-->
<header>
        <div class="wrapper">
            <h1> Merci beaucoup ! </h1>
      
            <div class="content">
                
            
                
        
                
         
      </div>
            
    </div>
    </header>

        
        
    
    </body>
</html>