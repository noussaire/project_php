<?php   
    session_start();
if (isset($_POST["logout"]))
{
    session_destroy();
    header("Location: loging.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loging</title>
    <link rel="stylesheet" href="./style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php include "navbar.php"; ?>
<div class="A">
    <h1 class="display-4" style = "color:black;">Hello,<?php echo($_SESSION["name"]); ?> !</h1>
    <p class="lead">WELCOME TO  INFOEXPRESS.</p>
    <a class="btn btn-primary btn-lg" href="page2.php" role="button">Learn more »</a>
</div>
</body>
</html>