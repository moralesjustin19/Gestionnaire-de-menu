<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname ="gestionnaire_menu";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
    echo "Erreur de connexion : " . $e->getMessage();
}



if (isset($_POST['ok'])){
    $nom = $_POST ['nom'];
    $ingredients = $_POST ['ingredients'];
    $prix = $_POST ['prix'];


    $requete = $bdd->prepare("INSERT INTO gestion VALUES (0, :nom, :ingredients, :prix)");
    $requete->execute(
        array(
            "nom" => $nom,
            "ingredients" => $ingredients,
            "prix" => $prix,
        )
    );
    header("Location: gerer.php");
    exit; 
}
?>