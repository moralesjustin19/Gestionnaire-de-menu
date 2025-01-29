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
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">	
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='font'>
    <title>Accueil</title>
</head>
<header>
    <nav>
        <a class="active" href="accueil.php">Accueil</a>
        <a href="restaurant_menu.php">Notre carte</a>
        <a href="gerer.php">Gestion</a>
        <a href="logout.php">Se déconnecter</a>

        
    </nav>
</header>
<body>
   <h1 class="hello">Bienvenue  <?php echo htmlspecialchars($username); ?> !</h1>
   <h2 class="desc">Ravis de vous revoir sur votre interface de restauration personnelle.</h2>
   
</body>
</html>