
<?php

if (isset($_POST['submit']))
{
    if ($_POST["mtricule"] == "NB2003")
    {
        header("Location: interface_admin.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1>connection</h1>
    <form method="POST">
        <label for="mtricule">matricule :</label><br>
        <input type="mtricule" id="email" name="mtricule" required><br><br>
        <button name="submit" type=submit">connection</button>
        <br>
        <label> return a la page:<a href="loging.php">click ici!<a/></label>
    </form>
</body>
</html>