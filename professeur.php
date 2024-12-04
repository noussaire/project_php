<?php
require_once 'connection.php';

class Professeur {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $db->connect();
        $this->conn = $db->conn;
    }

    public function ajouterProfesseur($nom, $email, $mot_de_passe ,$role) {
        $sql = "INSERT INTO professeurs (nom, email, mot_de_passe, role) VALUES (:nom, :email, :mot_de_passe, :role)";
        $stmt = $this->conn->prepare($sql);
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_BCRYPT);
        $stmt->execute(['nom' => $nom, 'email' => $email, 'mot_de_passe' => $hashedPassword, 'role' => $role] );
    }

    public function lister() {
        $stmt = $this->conn->prepare("SELECT * FROM professeurs");
        $stmt->execute();
        return $stmt;
    }

    public function supprimer($id) {
        $stmt = $this->conn->prepare("DELETE FROM professeurs WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function authentifier($email, $mot_de_passe) {
        $sql = "SELECT * FROM professeurs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $professeur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($professeur && password_verify($mot_de_passe, $professeur['mot_de_passe'])) {
            return $professeur;
        }
        return false;
    }


/////////////////////

public function affecterProfesseurFiliereAnnee($professeur_id, $filiere_id, $annee_id) {
    $sql = "INSERT INTO professeur_filiere_annee (professeur_id, filiere_id, annee_id) VALUES (:professeur_id, :filiere_id, :annee_id)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['professeur_id' => $professeur_id, 'filiere_id' => $filiere_id, 'annee_id' => $annee_id]);
}

// Méthode pour lister les groupes d'un professeur en fonction de la filière et de l'année
public function listerGroupesParProfesseur($professeur_id) {
    $sql = "SELECT g.nom AS groupe, a.nom AS annee, f.nom AS filiere 
            FROM groupes g 
            JOIN annees a ON g.annee_id = a.id
            JOIN professeur_filiere_annee pfa ON pfa.annee_id = a.id
            JOIN filieres f ON pfa.filiere_id = f.id
            WHERE pfa.professeur_id = :professeur_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['professeur_id' => $professeur_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Méthode pour supprimer l'affectation d'un professeur à une filière et une année
public function supprimerAffectation($professeur_id, $filiere_id, $annee_id) {
    $sql = "DELETE FROM professeur_filiere_annee WHERE professeur_id = :professeur_id AND filiere_id = :filiere_id AND annee_id = :annee_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['professeur_id' => $professeur_id, 'filiere_id' => $filiere_id, 'annee_id' => $annee_id]);
}

// Méthode pour obtenir l'année associée à un professeur
public function getAllFilieres() {
    $sql = "SELECT * FROM filieres";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getAllAnnees() {
    $sql = "SELECT * FROM annees";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getGroupesByAnnee($annee_id) {
    $query = "SELECT id, nom FROM groupes WHERE annee_id = :annee_id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute(['annee_id' => $annee_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
////////

public function affecterProfesseurGroupe($professeur_id, $groupe_id, $filiere_id, $annee_id)
{
    try {
        // Connexion à la base de don

        // Préparer la requête SQL
        $sql = "INSERT INTO professeur_groupe_filiere_annee (professeur_id, groupe_id, filiere_id, annee_id) 
                VALUES (:professeur_id, :groupe_id, :filiere_id, :annee_id)";

        $stmt = $this->conn->prepare($sql);

        // Lier les paramètres
        $stmt->bindParam(':professeur_id', $professeur_id, PDO::PARAM_INT);
        $stmt->bindParam(':groupe_id', $groupe_id, PDO::PARAM_INT);
        $stmt->bindParam(':filiere_id', $filiere_id, PDO::PARAM_INT);
        $stmt->bindParam(':annee_id', $annee_id, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();

        echo "Le professeur a été affecté avec succès au groupe.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

}
?>
