
<?php
require_once 'Connection.php';
require_once 'professeur.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $role = $_POST['role'];

    try {
        $user = new Professeur();
        $user->ajouterProfesseur($nom, $email, $motdepasse, $role);
        header("Location: interface_admin.php");
    } catch (PDOException $e) {
        die("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
    }
} 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form action="ajoute.php" method="POST">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="motdepasse">Mot de passe :</label><br>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>

        <label for="role">Rôle :</label><br>
        <select id="role" name="role" required>
            <option value="professeur">Professeur</option>
            <option value="administrateur">Admin</option>
        </select>
        <br><br>

        <button name="submit" type=submit">Ajouter</button>
    </form>
</body>
</html>
