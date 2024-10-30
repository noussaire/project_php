<?php
$base = json_decode(file_get_contents("base.json"), true);
$bases = json_decode(file_get_contents("base2.json"), true);
if (isset($_POST["submit"]))
{
  if (isset($_POST["email"]) && isset($_POST["passwd"]))
  {
    $email = $_POST["email"];
    $password = $_POST["passwd"];
 
    foreach ($base as $key => $value)
    {
      if ($key == $email && $value == $password)
        {
          session_start();
          foreach ($bases as $key => $value)
          {
            if ($key == $email )
            { 
              $_SESSION["email"] = $email;
              $_SESSION["passwd"] = $password;
              $_SESSION["name"] = $value;
              header("Location: page1.php");
            }
         
          }
        }
    }
  }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loging</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    </form>
  </div>
</nav>
<form action="loging.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
 <p>if you dont have account<a href="notloging.php">click her!</a></p  >   
 <input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Check me out</label> 

  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>