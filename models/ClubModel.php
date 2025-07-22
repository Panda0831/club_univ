<?php

require_once "models/pdoModels.php";

class Club
{
    public $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }
    public $id_club;
    public $nom_club;
    public $domaine;
    public $description;
    public function getAllClubs()
    {
        $req = "SELECT * FROM CLUB";
        $stmt = $this->conn->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    public function getClubById()
    {
        $req = "SELECT * FROM CLUB WHERE id_club = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $this->id_club, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }
    public function addClub()
    {
        $req = "INSERT INTO CLUB VALUES (NULL , :nom_club, :domaine, :description)";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':name', $this->nom_club);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':domaine', $this->domaine);
        $stmt->execute();
        $stmt->closeCursor();
    }
    public function updateClub($id)
    {
        $req = "UPDATE CLUB SET nom_club = :nom_club, domaine = :domaine, description = :description WHERE id_club = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $this->id_club, PDO::PARAM_INT);
        $stmt->bindParam(':nom_club', $this->nom_club);
        $stmt->bindParam(':domaine', $this->domaine);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $stmt->closeCursor();
    }
    public function deleteClub()
    {
        $req = "DELETE FROM CLUB WHERE id_club = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $this->id_club, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
