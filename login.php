<?php
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$dbname = 'gestionnaire_menu'; 


$conn = new mysqli($host, $user, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/login.css">
    <title>Zeste_Login</title>
</head>
<body>
<form action="action_page.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
  </div>
  </div>
</form>
</body>
</html>