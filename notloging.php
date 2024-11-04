<?php
     include "conx_db.php"; 
     if(isset($_POST["submit"])) 
     {
       if(isset($_POST["email"] ) && isset($_POST["passwd"]) && 
        isset($_POST["name"]) && isset($_POST["familyname"]))
       {
         $email = $_POST["email"];
         $password = password_hash( $_POST["passwd"],PASSWORD_DEFAULT) ;
         $name = $_POST["name"];
         $familyname = $_POST["familyname"];

         $insert ="INSERT INTO client VALUES(NULL,'$name','$familyname','$email','$password')";
         $db->exec($insert);
         header("location:loging.php");
       }
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
            <input name="name" type="text" placeholder="NAME" required>
            <input name="familyname" type="text" placeholder="FAMILYNAME" required>
            <input name="email" type="text" placeholder="EMAIL" required>
            <input name="passwd" type="password" placeholder="Mot de passe" required>
            <input name="passwd" type="password" placeholder="Mot de passe" required>
            <div class="mb-3 form-check">
                <p>If you have an account, <a href="loging.php">click here!</a></p>
            </div>
            <button name="submit" type="submit">ajouter</button>
        </form>
    </div>
</body>
</html>