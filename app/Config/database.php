<?php
/**
 * Configuration de la base de données
 */
class Database {
    private $host = 'localhost';
    private $db_name = 'servium_db';
    private $username = 'root';
    private $password = '';
    private $conn;

    /**
     * Obtenir la connexion à la base de données
     * 
     * @return PDO|null Retourne l'objet PDO en cas de succès, null en cas d'échec
     */
    public function getConnection(): ?PDO {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $exception) {
            // Ne pas afficher directement l'erreur en production pour des raisons de sécurité
            error_log("Erreur de connexion à la base de données : " . $exception->getMessage());
            return null;
        }

        return $this->conn;
    }
}
?>