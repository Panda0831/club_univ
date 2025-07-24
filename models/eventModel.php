<?php 

    require_once "models/pdoModels.php";
    class eventModel{
        public $id_activite;
        public $nom_activite;
        public $date_activite;
        public $description;
        
 public $conn;

    public function __construct()
    {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }
    function getAllEvent(){
        $req= "SELECT * FROM ACTIVITE";
        $stmt= $this->conn->prepare($req);
        $stmt->execute();
        $datas= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    function getEventById()
    {
        $req = "SELECT * FROM ACTIVITE WHERE id_activite = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $this->id_activite, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $data;
    }
    function addEvent()
    {
        $req = "INSERT INTO ACTIVITE VALUES (NULL , :nom_activite, :date_activite, :description)";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':nom_activite', $this->nom_activite);
        $stmt->bindParam(':date_activite', $this->date_activite);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $stmt->closeCursor();
    }
    
}