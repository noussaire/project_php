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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .A {
            background-color: #f0f4f7;
            padding: 2rem 1rem;
            text-align: center;
        }
    </style>
</head>
<?php include "navbar.php"; ?>
<div class="A">
    <h1 class="display-4">Hello,<?php echo($_SESSION["name"]); ?> !</h1>
    <p class="lead">WELCOME TO MY SITE WEB.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a>
</div>
</body>
</html>