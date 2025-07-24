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
        $stmt->bindParam(':nie', $nie);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }

    public function create($data)
    {
        $req = "INSERT INTO UTILISATEUR (nom, prenom, nie, email, filiere, niveau, mot_de_passe) 
                VALUES (:nom, :prenom, :nie, :email, :filiere, :niveau, :mot_de_passe)";
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

    public function update($data)
    {
        $req = "UPDATE UTILISATEUR 
                SET nom = :nom, prenom = :prenom, email = :email, filiere = :filiere, niveau = :niveau 
                WHERE id_utilisateur = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $data['id_utilisateur']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':filiere', $data['filiere']);
        $stmt->bindParam(':niveau', $data['niveau']);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $req = "DELETE FROM UTILISATEUR WHERE id_utilisateur = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateImage($id, $imagePath)
    {
        $req = "UPDATE UTILISATEUR SET image = :image WHERE id_utilisateur = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':image', $imagePath);
        return $stmt->execute();
    }

    public function getUserById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM UTILISATEUR WHERE id_utilisateur = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM UTILISATEUR WHERE id_utilisateur = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getNombreClubsInscrits($utilisateur_id)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM INSCRIPTION_CLUB
                WHERE id_utilisateur = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function getNombreActivites($utilisateur_id)
    {
        $sql = "SELECT COUNT(DISTINCT a.id_activite) AS total
FROM INSCRIPTION_CLUB ic
JOIN ACTIVITE a ON a.club_id = ic.id_club
WHERE ic.id_utilisateur = ?
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function InscriptionClub($id_utilisateur, $id_club)
    {
        // Vérifier si l'utilisateur est déjà inscrit au club
        $sqlCheck = "SELECT COUNT(*) AS total 
                     FROM INSCRIPTION_CLUB 
                     WHERE id_utilisateur = ? AND id_club = ?";
        $stmtCheck = $this->conn->prepare($sqlCheck);
        $stmtCheck->execute([$id_utilisateur, $id_club]);
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result['total'] > 0) {
            // Déjà inscrit
            return false;
        }

        // Inscription
        $sqlInsert = "INSERT INTO INSCRIPTION_CLUB (id_utilisateur, id_club) VALUES (?, ?)";
        $stmtInsert = $this->conn->prepare($sqlInsert);
        return $stmtInsert->execute([$id_utilisateur, $id_club]);
    }

    public function getNombreCommentaires($utilisateur_id)
    {
        $sql = "SELECT COUNT(*) AS total FROM COMMENTAIRE_ACTIVITE WHERE utilisateur_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$utilisateur_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function trouverParNIE($nie) {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE nie = ?");
        $stmt->execute([$nie]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function dashboard()
{
        require_once 'models/Club.php';
    $utilisateur_id = $_SESSION['utilisateur']['id_utilisateur'];

    $sql = "SELECT c.nom_club 
            FROM inscriptions_club ic
            JOIN clubs c ON ic.id_club = c.id_club
            WHERE ic.id_utilisateur = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$utilisateur_id]);
    $mesClubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once 'views/pages/profilPage.php'; // ou la vue correspondante
}

}


?>
