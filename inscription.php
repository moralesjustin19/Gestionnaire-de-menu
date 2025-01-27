<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <title>Inscription</title>
</head>
<body>

<form method="POST" action="traitement.php">
        <label for="username"><b>Username</b></label>
        <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateurs" required>
        <br>
        <label for="password"><b>Password</b></label>
        <input type="text" id="pass" name="pass" placeholder="Entrez votre mot de passe" required>
        <br>
        <input type="submit" value="M'inscrire" name="ok">
</form>

</body>
</html>