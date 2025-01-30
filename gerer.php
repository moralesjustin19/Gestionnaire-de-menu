<?php
session_start();
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
}

// Récupérer les pizzas
$requete = $bdd->query("SELECT id_gestion, nom, ingredients, prix FROM gestion"); 
$pizzas = $requete->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les menus
$requeteMenus = $bdd->query("SELECT id_menu, nom, description, prix FROM gestion_menu"); 
$menus = $requeteMenus->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/gestion.css">
    <title>Gestion du Menu</title>
</head>
<body>

<!-- Bouton Burger -->
<div class="burger-menu" onclick="toggleMenu()">☰</div>

<!-- Barre de navigation -->
<nav id="sidebar">
    <a class="active" href="accueil.php">Accueil</a>
    <a href="restaurant_menu.php">Notre carte</a>
    <a href="logout.php">Se déconnecter</a>
</nav>

<main>
    <!-- Liste des Pizzas -->
    <section>
        <h2>Liste des Pizzas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ingrédients</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pizzas as $pizza): ?>
                <tr>
                    <td><?= htmlspecialchars($pizza['nom']) ?></td>
                    <td><?= htmlspecialchars($pizza['ingredients']) ?></td>
                    <td><?= htmlspecialchars($pizza['prix']) ?>€</td>
                    <td>
                        <button class="btn modifier">Modifier</button>
                        <a href="supprimer.php?id=<?= $pizza['id_gestion'] ?>&type=pizza" 
                           onclick="return confirm('Voulez-vous vraiment supprimer cette pizza ?');">
                           <button class="btn supprimer">Supprimer</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Ajouter une pizza -->
    <section>
        <h2>Ajouter une nouvelle pizza</h2>
        <form method="POST" action="action.php">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom de la pizza" required>
            <label for="ingredients">Ingrédients</label>
            <input type="text" id="ingredients" name="ingredients" placeholder="Ingrédients" required>
            <label for="prix">Prix</label>
            <input type="number" id="prix" name="prix" placeholder="Prix" required>
            <button type="submit" name="ok">Envoyer</button>
        </form>
    </section>

    <!-- Liste des Menus -->
    <section>
        <h2>Liste des Menus</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($menus as $menu): ?>
                <tr>
                    <td><?= htmlspecialchars($menu['nom']) ?></td>
                    <td><?= htmlspecialchars($menu['description']) ?></td>
                    <td><?= htmlspecialchars($menu['prix']) ?>€</td>
                    <td>
                        <button class="btn modifier">Modifier</button>
                        <a href="supprimer.php?id=<?= $menu['id_menu'] ?>&type=menu" 
                           onclick="return confirm('Voulez-vous vraiment supprimer ce menu ?');">
                           <button class="btn supprimer">Supprimer</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Ajouter un menu -->
    <section>
        <h2>Ajouter un nouveau menu</h2>
        <form method="POST" action="action_menu.php">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom du menu" required>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" required>
            <label for="prix">Prix</label>
            <input type="number" id="prix" name="prix" placeholder="Prix" required>
            <button type="submit" name="ok">Envoyer</button>
        </form>
    </section>
</main>

<!-- JavaScript -->
<script>
    function toggleMenu() {
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>

</body>
</html>
