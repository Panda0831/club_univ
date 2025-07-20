<?php
require_once __DIR__ . '/../../config/database.php';

class Utilisateur {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getByNie(string $nie) {
        $sql = "SELECT * FROM UTILISATEUR WHERE nie = :nie LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nie', $nie, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function create(array $data) {
        $sql = "INSERT INTO UTILISATEUR (nom, prenom, nie, email, filiere, niveau, mot_de_passe, role)
                VALUES (:nom, :prenom, :nie, :email, :filiere, :niveau, :mot_de_passe, :role)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':nie', $data['nie'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':filiere', $data['filiere'], PDO::PARAM_STR);
        $stmt->bindValue(':niveau', $data['niveau'], PDO::PARAM_STR);
        $stmt->bindValue(':mot_de_passe', $data['mot_de_passe'], PDO::PARAM_STR);
        $stmt->bindValue(':role', $data['role'], PDO::PARAM_STR);

        try {
            $stmt->execute();
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
