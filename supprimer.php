<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

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

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type == "pizza") {
        $requete = $bdd->prepare("DELETE FROM gestion WHERE id_gestion = :id");
    } elseif ($type == "menu") {
        $requete = $bdd->prepare("DELETE FROM gestion_menu WHERE id_menu = :id");
    } else {
        echo "Type invalide.";
        exit;
    }

    $requete->execute(['id' => $id]);
}

header("Location: gerer.php");
exit;
?>
