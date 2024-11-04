<?php
  session_start();
  include "conx_db.php"; 
  if(isset($_POST["submit"])) 
  {
    if(isset($_POST["email"] ) &&  isset($_POST["passwd"]))
    {
      $email = $_POST["email"];
      $password = $_POST["passwd"];
    
      $SELECT = "SELECT * FROM client";
	   $result= $db->query($SELECT);
     $user_found = false;
     while ($tabclient = $result->fetch()) 
     {
         if ($tabclient["email"] === $email && password_verify($password, $tabclient["passwd"])) 
         {
             $user_found = true;
            $_SESSION["name"] = $tabclient["name"];
            $_SESSION["familyname"] = $tabclient["familyname"];
             header("Location: page1.php");
             exit; 
         }
     }
     if (!$user_found) 
         echo "Utilisateur non trouvé";
  } 
 else 
     echo "Le formulaire est vide";

  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loging</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
            <img src="https://www.vrcomm.net/img/NEKq4tZjXW1623991707.png" alt="Brand Logo" style="height: 40px;">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <div class="login-container" style="padding-top: 80px;">
    <div class="image" style="display: flex; justify-content: center; margin-bottom: 40px;">
        <img src="https://www.vrcomm.net/img/NEKq4tZjXW1623991707.png" alt="Brand Logo" style="height: 80px;">
    </div>
        <h2><B>LOGING</B></h2>
        <form action="loging.php" method="POST">
            <input name="email" type="text" placeholder="EMAIL" required>
            <input name="passwd" type="password" placeholder="Mot de passe" required>
            <div class="mb-3 form-check">
                <p>If you don’t have an account, <a href="notloging.php">click here!</a></p>
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button name="submit" type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
