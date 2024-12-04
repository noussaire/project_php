<?php
require_once 'Connection.php';
require_once 'Filiere.php';
require_once 'Annee.php';
require_once 'Groupe.php';

// Création des objets
$filiereObj = new Filiere();
$anneeObj = new Annee();
$groupeObj = new Groupe();

// Gestion des formulaires
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_filiere'])) {
        $nom = $_POST['nom_filiere'];
        $description = $_POST['description'];
        $filiereObj->ajouterFiliere($nom, $description);
    }

    if (isset($_POST['ajouter_annee'])) {
        $nom_annee = $_POST['nom_annee'];
    
        if ($anneeObj->existeAnnee($nom_annee)) {
            echo "<p style='color:red;'>L'année '$nom_annee' existe déjà.</p>";
        }
        else {
            $annee_id = $anneeObj->ajouterAnnee($nom_annee);
        }
    }
    
    if (isset($_POST['ajouter_groupe'])) {
        $nom = $_POST['nom_groupe'];
        $annee_id = $_POST['annee_id'];
        $groupeObj->ajouterGroupe($nom, $annee_id);
    }
}

// Récupération des filières et des années
$filieres = $filiereObj->obtenirFilieres();
$annees = $anneeObj->obtenirToutesLesAnnees(); // Assurez-vous que cette méthode existe
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Filières, Années et Groupes</title>
</head>
<body>
    <h1>Gestion des Filières, Années et Groupes</h1>
    
    <!-- Formulaire pour ajouter une filière -->
    <h2>Ajouter une Filière</h2>
    <form method="POST">
        <label>Nom de la Filière :</label>
        <input type="text" name="nom_filiere" required>
        <br>
        <label>Description :</label>
        <textarea name="description" required></textarea>
        <br>
        <button type="submit" name="ajouter_filiere">Ajouter Filière</button>
    </form>

<h2>Ajouter une Année</h2>
<form method="POST">
    <label>Nom de l'Année :</label>
    <input type="text" name="nom_annee" required>
    <br>
    <button type="submit" name="ajouter_annee">Ajouter Année</button>
</form>

    <!-- Formulaire pour ajouter un groupe -->
    <h2>Ajouter un Groupe</h2>
    <form method="POST">
        <label>Nom du Groupe :</label>
        <input type="text" name="nom_groupe" required>
        <br>
        <label>Année :</label>
        <select name="annee_id" required>
            <?php foreach ($annees as $annee): ?>
                <option value="<?= $annee['id'] ?>"><?= htmlspecialchars($annee['nom']) ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit" name="ajouter_groupe">Ajouter Groupe</button>
    </form>
</body>
</html>
