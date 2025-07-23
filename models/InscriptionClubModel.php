<?php




require_once "models/pdoModels.php";
class InscriptionClubModel
{
    public $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }
    public function getAllInscriptions()
    {
        $req = "SELECT * FROM INSCRIPTION_CLUB";
        $stmt = $this->conn->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    public function est_inscrit($id_utilisateur, $id_club)
    {
        $req = "SELECT * FROM INSCRIPTION_CLUB WHERE id_utilisateur = :id_utilisateur AND id_club = :id_club";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->bindParam(':id_club', $id_club); 
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
    public function inscrireUtilisateur($id_utilisateur, $id_club)
    {
        $req = "INSERT INTO INSCRIPTION_CLUB (id_utilisateur, id_club) VALUES (:id_utilisateur, :id_club)";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->bindParam(':id_club', $id_club);
        return $stmt->execute();
    }

    public function listerInscriptionsParUtilisateur($id_utilisateur)
    {
        $req = "SELECT * FROM INSCRIPTION_CLUB WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listerInscriptionsParClub($id_club)
    {
        $req = "SELECT * FROM INSCRIPTION_CLUB WHERE id_club = :id_club";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_club', $id_club);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function supprimerInscription($id_utilisateur, $id_club)
    {
        $req = "DELETE FROM INSCRIPTION_CLUB WHERE id_utilisateur = :id_utilisateur AND id_club = :id_club";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->bindParam(':id_club', $id_club);
        return $stmt->execute();
    }
}
?>