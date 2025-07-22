<?php
require_once "models/pdoModels.php";
class Utilisateur
{
    public $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }

    public function getAllUsers()
    {
        $req = "SELECT * FROM UTILISATEUR";
        $stmt = $this->conn->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

    public function getUserByNie($nie)
    {
        $req = "SELECT * FROM UTILISATEUR WHERE nie = :nie";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':nie', $nie, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }

    public function create($data)
    {
        $req = "INSERT INTO UTILISATEUR (nom, prenom, nie, email, filiere, niveau, mot_de_passe) VALUES (:nom, :prenom, :nie, :email, :filiere, :niveau, :mot_de_passe)";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':nie', $data['nie']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':filiere', $data['filiere']);
        $stmt->bindParam(':niveau', $data['niveau']);
        $stmt->bindParam(':mot_de_passe', $data['mot_de_passe']);
        
        return $stmt->execute();
    }
}
?>
