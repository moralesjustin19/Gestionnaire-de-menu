<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <title>Connexion</title>
</head>
<body>

<?php
session_start();

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


$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['pass'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Requête sécurisée pour éviter les injections SQL
        $stmt = $bdd->prepare("SELECT * FROM users WHERE username = :username AND pass = :password");
        $stmt->execute([
            'username' => $username,
            'password' => $password,
        ]);

        $rep = $stmt->fetch();
        if ($rep) {
            $_SESSION['username'] = $username;
            header ("Location: accueil.php");
            exit;

        } else {
            $error_msg = "Nom d'utilisateur ou mot de passe incorrect !";
        }
    } else {
        $error_msg = "Veuillez remplir tous les champs !";
    }
}
?>

<form method="POST" action="">
    <label for="username"><b>Username</b></label>
    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
    <br>
    <label for="password"><b>Password</b></label>
    <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe" required>
    <br>
    <input type="submit" value="Se connecter" name="ok">
    <?php if (!empty($error_msg)) : ?>
    <p style="color: red;"><?php echo htmlspecialchars($error_msg); ?></p>
<?php endif; ?>
</form>
</body>
</html>
