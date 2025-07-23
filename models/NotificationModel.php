<?php
require_once "models/pdoModels.php";

class NotificationModel {
    public $conn;

    public function __construct() {
        $db = new PDOModels();
        $this->conn = $db->setDB();
    }

    public function getAllNotifications() {
        $req = "SELECT * FROM NOTIFICATION WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $_SESSION['utilisateur']['id'], PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    public function createNotification($data) {
        $req = "INSERT INTO NOTIFICATION (id_utilisateur, message, date_creation) VALUES (:id_utilisateur, :message, NOW())";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_utilisateur', $data['id_utilisateur'], PDO::PARAM_INT);
        $stmt->bindParam(':message', $data['message']);
        return $stmt->execute();
    }
    public function deleteNotification($id_notification) {
        $req = "DELETE FROM NOTIFICATION WHERE id_notification = :id_notification";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_notification', $id_notification, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function markAsRead($id_notification) {
        $req = "UPDATE NOTIFICATION SET lu = 1 WHERE id_notification = :id_notification";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id_notification', $id_notification, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}

?>