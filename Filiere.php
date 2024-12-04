<?php
require_once 'connection.php';
class Filiere {
    private $conn;

    public function __construct() {
        $db = new Connection();
        $db->connect();
        $this->conn = $db->conn;
    }
    public  function ajouterFiliere($nom, $description) {
        $stmt = $this->conn->prepare("INSERT INTO filieres (nom, description) VALUES (?, ?)");
        $stmt->execute([$nom, $description]);
        return $this->conn->lastInsertId(); // Retourne l'ID de la nouvelle filière
    }

    public  function obtenirFilieres() {
        $stmt = $this->conn->query("SELECT * FROM filieres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
