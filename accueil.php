<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username']
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/accueil.css">
    <title>Accueil</title>
</head>
<header>
    <nav>
        <a class="active" href="accueil.php">Accueil</a>
        <a href="#">Menu</a>
        <a href="#">Plats</a>
        <a href="#">Se déconnecter</a>
        <a href="gerer.php">Gestion</a>

        
    </nav>
</header>
<body>
   <h1 class="hello">Bonjour,  <?php echo htmlspecialchars($username); ?> !</h1>
   <h2 class="desc">Bienvenue sur votre page d'accueil.</h2>
   
</body>
</html>