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

// Récupérer les pizzas depuis la base de données
$requete = $bdd->query("SELECT * FROM gestion"); // Assurez-vous que la table s'appelle bien 'gestion'
$pizzas = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/gestion.css">
    <title>Accueil</title>
</head>
<header>
    <nav>
        <a class="active" href="accueil.php">Accueil</a>
        <a href="#">Plats & Menus</a>
        <a href="logout.php">Se déconnecter</a>
    </nav>
</header>
<body>

    <section>
        <h2>Liste des Pizzas</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ingrédients</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher dynamiquement les pizzas
                foreach ($pizzas as $pizza) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($pizza['nom']) . "</td>"; // Affiche le nom de la pizza
                    echo "<td>" . htmlspecialchars($pizza['ingredients']) . "</td>"; // Affiche les ingrédients
                    echo "<td>" . htmlspecialchars($pizza['prix']) . "€</td>"; // Affiche le prix
                    
                    echo "<td>
                          
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section>
        <h2>Ajouter une nouvelle pizza</h2>
        <form method="POST" action="action.php">
            <label for="nom"><b>Nom</b></label>
            <input type="text" id="nom" name="nom" placeholder="Entrez le nom de votre pizza" required>
            <br>
            <label for="ingredients"><b>Ingrédients</b></label>
            <input type="text" id="ingredients" name="ingredients" placeholder="Saisissez vos ingrédients" required>
            <br>
            <label for="prix"><b>Prix</b></label>
            <input type="number" id="prix" name="prix" placeholder="Saisissez le prix" required>
            <br>
            <input type="submit" value="Envoyer" name="ok">
        </form>
    </section>
</body>
</html>
