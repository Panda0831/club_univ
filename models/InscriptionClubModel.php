<?php
require_once "models/pdoModels.php";

class InscriptionClubModel
{
    private $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }

    // Récupère tous les clubs où un utilisateur est inscrit (IDs)
    public function getClubsInscritsParUtilisateur($id_utilisateur)
    {
        $sql = "SELECT id_club FROM INSCRIPTION_CLUB WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_utilisateur]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Vérifie si un utilisateur est déjà inscrit à un club
    public function dejaInscrit($id_utilisateur, $id_club)
    {
        $sql = "SELECT 1 FROM INSCRIPTION_CLUB WHERE id_utilisateur = ? AND id_club = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_utilisateur, $id_club]);
        return $stmt->rowCount() > 0;
    }

    // Inscrit un utilisateur dans un club
    public function inscrireUtilisateur($id_utilisateur, $id_club)
    {
        // Protection contre doublon possible si tu préfères (éviter erreur SQL)
        if (!$this->dejaInscrit($id_utilisateur, $id_club)) {
            $sql = "INSERT INTO INSCRIPTION_CLUB (id_utilisateur, id_club) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_utilisateur, $id_club]);
            return true;
        }
        return false;
    }

    // Supprime l'inscription d'un utilisateur à un club
    public function supprimerInscription($id_utilisateur, $id_club)
    {
        $sql = "DELETE FROM INSCRIPTION_CLUB WHERE id_utilisateur = ? AND id_club = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_utilisateur, $id_club]);
    }
}
