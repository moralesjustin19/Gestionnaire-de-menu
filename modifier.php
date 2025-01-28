<?php
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
}

// Vérifier si l'ID de la pizza est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations de la pizza
    $requete = $bdd->prepare("SELECT * FROM gestion WHERE id = :id");
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $pizza = $requete->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la pizza existe
    if (!$pizza) {
        echo "Pizza non trouvée.";
        exit();
    }
} else {
    echo "Aucune pizza sélectionnée.";
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assainir et valider les données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $ingredients = htmlspecialchars(trim($_POST['ingredients']));
    $prix = htmlspecialchars(trim($_POST['prix']));

    // Vérifier si les champs sont valides
    if (empty($nom) || empty($ingredients) || empty($prix)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        // Mettre à jour les informations de la pizza dans la base de données
        $requeteUpdate = $bdd->prepare("UPDATE gestion SET nom = :nom, ingredients = :ingredients, prix = :prix WHERE id = :id");
        $requeteUpdate->bindParam(':nom', $nom);
        $requeteUpdate->bindParam(':ingredients', $ingredients);
        $requeteUpdate->bindParam(':prix', $prix);
        $requeteUpdate->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécuter la mise à jour
        if ($requeteUpdate->execute()) {
            // Afficher un message de succès et rediriger
            header("Location: gerer.php?message=Pizza mise à jour avec succès!");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la pizza.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/gestion.css">
    <title>Modifier Pizza</title>
</head>
<header>
    <nav>
        <a class="active" href="accueil.php">Accueil</a>
        <a href="#">Menu</a>
        <a href="#">Plats</a>
        <a href="logout.php">Se déconnecter</a>
    </nav>
</header>
<body>

    <section>
        <h2>Modifier la pizza : <?php echo htmlspecialchars($pizza['nom']); ?></h2>

        <form method="POST" action="">
            <label for="nom"><b>Nom</b></label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($pizza['nom']); ?>" required>

            <label for="ingredients"><b>Ingrédients</b></label>
            <input type="text" id="ingredients" name="ingredients" value="<?php echo htmlspecialchars($pizza['ingredients']); ?>" required>

            <label for="prix"><b>Prix</b></label>
            <input type="number" id="prix" name="prix" value="<?php echo htmlspecialchars($pizza['prix']); ?>" required>

            <input type="submit" value="Modifier" name="modifier">
        </form>
    </section>

</body>
</html>
