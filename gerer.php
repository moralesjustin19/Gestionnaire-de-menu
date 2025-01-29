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


// Récupérer les pizzas depuis la base de données
$requete = $bdd->query("SELECT * FROM gestion"); 
$pizzas = $requete->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les menus depuis la base de données
$requeteMenus = $bdd->query("SELECT * FROM gestion_menu"); 
$menus = $requeteMenus->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/gestion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">	
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='font'>
    <title>Accueil</title>
</head>
<header>
    <nav>
        <a class="active" href="accueil.php">Accueil</a>
        <a href="restaurant_menu">Notre carte</a>
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
                <?php foreach ($pizzas as $pizza): ?>
                    <tr>
                        <td><?= htmlspecialchars($pizza['nom']) ?></td>
                        <td><?= htmlspecialchars($pizza['ingredients']) ?></td>
                        <td><?= htmlspecialchars($pizza['prix']) ?>€</td>
                        <td>
                            <button class="btn modifier">Modifier</button>
                            <button class="btn supprimer">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
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

        <section>
            <h2>Liste des Menus</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
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
                            <button class="btn supprimer">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </section>

        <section>
            <h2>Ajouter un nouveau menu</h2>
            <form method="POST" action="action_menu.php">
                <label for="nom"><b>Nom</b></label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom de votre menu" required>
                <br>
                <label for="description"><b>Description</b></label>
                <input type="text" id="description" name="description" placeholder="Saisissez votre description" required>
                <br>
                <label for="prix"><b>Prix</b></label>
                <input type="number" id="prix" name="prix" placeholder="Saisissez le prix" required>
                <br>
                <input type="submit" value="Envoyer" name="ok">
            </form>
        </section>

    </body>
    </html>