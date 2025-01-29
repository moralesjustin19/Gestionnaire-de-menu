<?php
session_start();

// Vérifier si l'utilisateur est bien connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionnaire_menu";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Vérifier si un ID et un type ont été passés en paramètre
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type == "pizza") {
        $requete = $bdd->prepare("DELETE FROM gestion WHERE id = :id");
    } elseif ($type == "menu") {
        $requete = $bdd->prepare("DELETE FROM gestion_menu WHERE id = :id");
    } else {
        echo "Type invalide.";
        exit;
    }

    $requete->execute(['id' => $id]);
}

// Redirection vers la page de gestion après suppression
header("Location: gestion.php");
exit;
?>
