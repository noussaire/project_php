<?php
require_once 'connection.php';
class Groupe {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $db->connect();
        $this->conn = $db->conn;
    }
    public  function ajouterGroupe( $nom, $annee_id) {
        $stmt = $this->conn->prepare("INSERT INTO groupes (nom, annee_id) VALUES (?, ?)");
        $stmt->execute([$nom, $annee_id]);
        return $this->conn->lastInsertId(); // Retourne l'ID du nouveau groupe
    }

    public function obtenirGroupesParAnnee($annee_id) {
        $sql = "SELECT * FROM groupes WHERE annee_id = :annee_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['annee_id' => $annee_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
