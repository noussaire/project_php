<?php
require_once 'connection.php';
class Annee {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $db->connect();
        $this->conn = $db->conn;
    }
    public function ajouterAnnee($nom) {
        $sql = "INSERT INTO annees (nom) VALUES (:nom)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nom' => $nom]);
        return $this->conn->lastInsertId();
    }

    public function lierFiliere($annee_id, $filiere_id) {
        $sql = "INSERT INTO annee_filiere (annee_id, filiere_id) VALUES (:annee_id, :filiere_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['annee_id' => $annee_id, 'filiere_id' => $filiere_id]);
    }

    public function obtenirToutesLesAnnees() {
        $query = "SELECT * FROM annees";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function existeAnnee($nom_annee) {
        // Effectuez une requête SQL pour vérifier si l'année existe déjà
        $sql = "SELECT COUNT(*) FROM annees WHERE nom = :nom_annee";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute(['nom_annee' => $nom_annee]);
        return $stmt->fetchColumn() > 0; // Retourne true si l'année existe déjà
    }
}
?>
