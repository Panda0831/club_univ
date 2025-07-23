<?php
require_once './models/PdoModels.php';

class AdminModel {
     public $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }

//clubs
    public function listerClubs() {
        $sql = "SELECT * FROM CLUB";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverClubParId($id_club) {
        $sql = "SELECT * FROM CLUB WHERE id_club = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_club]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function creerClub($donnees) {
        $sql = "INSERT INTO CLUB (nom_club, domaine, description, responsable_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $donnees['nom_club'],
            $donnees['domaine'],
            $donnees['description'],
            $donnees['responsable_id']
        ]);
    }

    public function modifierClub($id_club, $donnees) {
        $sql = "UPDATE CLUB SET nom_club = ?, domaine = ?, description = ?, responsable_id = ? WHERE id_club = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $donnees['nom_club'],
            $donnees['domaine'],
            $donnees['description'],
            $donnees['responsable_id'],
            $id_club
        ]);
    }

    public function supprimerClub($id_club) {
        $sql = "DELETE FROM CLUB WHERE id_club = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_club]);
    }

//activites
    public function listerActivites() {
        $sql = "SELECT * FROM ACTIVITE";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverActiviteParId($id_activite) {
        $sql = "SELECT * FROM ACTIVITE WHERE id_activite = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_activite]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function creerActivite($donnees) {
        $sql = "INSERT INTO ACTIVITE 
            (nom_activite, type_activite, date_activite, date_fin_inscription, lieu, description, club_id, responsable_id, participants_max) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $donnees['nom_activite'],
            $donnees['type_activite'],
            $donnees['date_activite'],
            $donnees['date_fin_inscription'],
            $donnees['lieu'],
            $donnees['description'],
            $donnees['club_id'],
            $donnees['responsable_id'],
            $donnees['participants_max']
        ]);
    }

    public function modifierActivite($id_activite, $donnees) {
        $sql = "UPDATE ACTIVITE SET 
            nom_activite = ?, 
            type_activite = ?, 
            date_activite = ?, 
            date_fin_inscription = ?, 
            lieu = ?, 
            description = ?, 
            club_id = ?, 
            responsable_id = ?, 
            participants_max = ? 
            WHERE id_activite = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $donnees['nom_activite'],
            $donnees['type_activite'],
            $donnees['date_activite'],
            $donnees['date_fin_inscription'],
            $donnees['lieu'],
            $donnees['description'],
            $donnees['club_id'],
            $donnees['responsable_id'],
            $donnees['participants_max'],
            $id_activite
        ]);
    }

    public function supprimerActivite($id_activite) {
        $sql = "DELETE FROM ACTIVITE WHERE id_activite = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_activite]);
    }

//coms
    public function listerCommentaires() {
        $sql = "SELECT * FROM COMMENTAIRE";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimerCommentaire($id_commentaire) {
        $sql = "DELETE FROM COMMENTAIRE WHERE id_commentaire = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_commentaire]);
    }

    public function trouverCommentaireParId($id_commentaire) {
        $sql = "SELECT * FROM COMMENTAIRE WHERE id_commentaire = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_commentaire]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// utilisateurs
    public function listerUtilisateurs() {
        $sql = "SELECT * FROM UTILISATEURS";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function trouverUtilisateurParId($id) {
        $sql = "SELECT * FROM UTILISATEURS WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function supprimerUtilisateur($id) {
        $sql = "DELETE FROM UTILISATEURS WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
