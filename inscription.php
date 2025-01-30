<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">	
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='font'>
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