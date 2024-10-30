<?php
    $base = json_decode(file_get_contents("base.json"), true);
    $bases = json_decode(file_get_contents("base2.json"), true);
    if (isset($_POST["submit"])) 
    {
      if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["passwd"]))
      {
        $name = $_POST["username"];
        $email = $_POST["email"];
        $passwd = $_POST["passwd"];
        $base[$email] = $passwd;
        $bases[$email] = $name;
        file_put_contents("base.json", json_encode($base));
        file_put_contents("base2.json", json_encode($bases));
        header("Location: loging.php");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loging</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    </form>
  </div>
</nav>
<form action="notloging.php" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">complet name</label>
    <input name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">ajouter</button>
</form>
</body>
</html>