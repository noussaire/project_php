<?php
require_once 'Professeur.php';

$professeur = new Professeur();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: afficher toutes les données POST
    // var_dump($_POST);
    
    // Ne vérifier la soumission que si ce n'est pas le changement d'année
    if (!isset($_POST['groupe_ids']) && isset($_POST['annee_id'])) {
        // C'est juste le changement d'année, ne pas afficher d'erreur
        $groupes = $professeur->getGroupesByAnnee($_POST['annee_id']);
    }
    // Sinon, c'est une vraie soumission
    elseif (isset($_POST['professeur_id'], $_POST['filiere_id'], $_POST['annee_id'], $_POST['groupe_ids'])) {
        $professeur_id = $_POST['professeur_id'];
        $filiere_id = $_POST['filiere_id'];
        $annee_id = $_POST['annee_id'];
        $groupe_ids = $_POST['groupe_ids'];

        foreach ($groupe_ids as $groupe_id) {
            $professeur->affecterProfesseurGroupe($professeur_id, $filiere_id, $annee_id, $groupe_id);
        }

        echo "<p style='color: green;'>Professeur affecté avec succès !</p>";
    } else {
        echo "<p style='color: red;'>Veuillez remplir tous les champs nécessaires.</p>";
    }
}

// Récupérer toutes les données nécessaires
$filieres = $professeur->getAllFilieres();
$annees = $professeur->getAllAnnees();
$profs = $professeur->lister()->fetchAll(PDO::FETCH_ASSOC);
$groupes = isset($_POST['annee_id']) ? $professeur->getGroupesByAnnee($_POST['annee_id']) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affecter Filière, Année et Groupes au Professeur</title>
    <style>
        .form-group { margin-bottom: 15px; }
        select[multiple] { min-height: 100px; }
    </style>
</head>
<body>
    <h1>Affecter une Filière, une Année et des Groupes au Professeur</h1>

    <form method="POST" id="affectationForm">
        <div class="form-group">
            <label for="professeur_id">Choisir un Professeur :</label>
            <select name="professeur_id" id="professeur_id" required>
                <option value="">-- Sélectionner un Professeur --</option>
                <?php foreach ($profs as $prof): ?>
                    <option value="<?= $prof['id'] ?>" <?= isset($_POST['professeur_id']) && $_POST['professeur_id'] == $prof['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($prof['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="filiere_id">Filière :</label>
            <select name="filiere_id" id="filiere_id" required>
                <option value="">-- Sélectionner une Filière --</option>
                <?php foreach ($filieres as $filiere): ?>
                    <option value="<?= $filiere['id'] ?>" <?= isset($_POST['filiere_id']) && $_POST['filiere_id'] == $filiere['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($filiere['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="annee_id">Année :</label>
            <select name="annee_id" id="annee_id" required>
                <option value="">-- Sélectionner une Année --</option>
                <?php foreach ($annees as $annee): ?>
                    <option value="<?= $annee['id'] ?>" <?= isset($_POST['annee_id']) && $_POST['annee_id'] == $annee['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($annee['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
    <label for="groupe_ids">Groupes :</label>
    <select name="groupe_ids[]" id="groupe_ids" multiple required>
        <?php if (!empty($groupes)): ?>
            <?php foreach ($groupes as $groupe): ?>
                <option value="<?= htmlspecialchars($groupe['id']) ?>">
                    <?= htmlspecialchars($groupe['nom']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled>Veuillez d'abord sélectionner une année</option>
        <?php endif; ?>
    </select>
</div>
        <button type="submit" name="submit">Affecter</button>
    </form>

    <script>
    document.getElementById('annee_id').addEventListener('change', function() {
        document.getElementById('affectationForm').submit();
    });
    </script>
</body>
</html>