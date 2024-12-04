<?php 

class Connection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'ggg_cahiers';
    public $conn;

    // Méthode pour établir la connexion à la base de données
    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
    
}
?>
