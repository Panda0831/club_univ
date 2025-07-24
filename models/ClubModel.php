<?php
// models/ClubModel.php

require_once "models/pdoModels.php";

class ClubModel
{
    private $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }

    // Récupérer tous les clubs
    public function getAllClubs()
    {
        $sql = "SELECT * FROM CLUB";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $clubs;
    }

    // Récupérer un club par son ID
    public function getClubById($id)
    {
        $sql = "SELECT * FROM CLUB WHERE id_club = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $club = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $club;
    }

    // Récupérer un club par son nom
    public function findByNom($nom)
    {
        $sql = "SELECT * FROM CLUB WHERE nom_club = :nom";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        $club = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $club;
    }

    // Ajouter un club (avec responsable_id optionnel)
    public function addClub($nom_club, $domaine, $description, $responsable_id = null)
    {
        $sql = "INSERT INTO CLUB (nom_club, domaine, description, responsable_id) 
                VALUES (:nom_club, :domaine, :description, :responsable_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nom_club', $nom_club);
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':responsable_id', $responsable_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Mettre à jour un club (y compris responsable)
    public function updateClub($id, $nom_club, $domaine, $description, $responsable_id = null)
    {
        $sql = "UPDATE CLUB SET nom_club = :nom_club, domaine = :domaine, description = :description, responsable_id = :responsable_id
                WHERE id_club = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nom_club', $nom_club);
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':responsable_id', $responsable_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Supprimer un club par son ID
    public function deleteClub($id)
    {
        $sql = "DELETE FROM CLUB WHERE id_club = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    // Récupérer tous les clubs dont l'utilisateur est responsable
    public function clubsResponsable($utilisateur_id)
    {
        $sql = "SELECT * FROM CLUB WHERE responsable_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clubs;
    }
    // Récupérer les membres inscrits à un club
public function getMembresDuClub($id_club)
{
    $sql = "SELECT u.id_utilisateur, u.nom, u.prenom, u.email
            FROM INSCRIPTION_CLUB ic
            JOIN UTILISATEUR u ON ic.id_utilisateur = u.id_utilisateur
            WHERE ic.id_club = :id_club";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id_club', $id_club, PDO::PARAM_INT);
    $stmt->execute();
    $membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $membres;
}

// Supprimer un membre d'un club (dans inscription_club)
public function supprimerMembre($id_club, $id_utilisateur)
{
    $sql = "DELETE FROM INSCRIPTION_CLUB WHERE id_club = :id_club AND id_utilisateur = :id_utilisateur";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id_club', $id_club, PDO::PARAM_INT);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}
public function getClubByResponsable($idResponsable) {
    $sql = "SELECT * FROM CLUB WHERE responsable_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$idResponsable]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getMembresByClub($id_club)
{
    $sql = "SELECT u.id_utilisateur, u.nom, u.prenom, u.email
            FROM INSCRIPTION_CLUB I
            JOIN UTILISATEUR u ON I.id_utilisateur = u.id_utilisateur
            WHERE I.id_club = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id_club]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
