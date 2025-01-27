<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname ="gestionnaire_menu";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=gestionnaire_menu", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
    echo "Erreur de connexion : " . $e->getMessage();
}