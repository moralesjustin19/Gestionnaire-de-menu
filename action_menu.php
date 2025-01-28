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
    $description = $_POST ['description'];
    $prix = $_POST ['prix'];


    $requete = $bdd->prepare("INSERT INTO gestion_menu VALUES (0, :nom, :description, :prix)");
    $requete->execute(
        array(
            "nom" => $nom,
            "description" => $description,
            "prix" => $prix,
        )
    );
    $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
    var_dump($reponse);
}
?>