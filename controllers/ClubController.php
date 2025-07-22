<?php require_once("models/ClubModel.php");


class ClubController{
    public Club $clubModel;

    public function NouveauClub() {
        $this->clubModel = new Club();
        $this->clubModel->nom_club = htmlspecialchars(trim($_POST["nom_club"] ?? ""));
        $this->clubModel->domaine = htmlspecialchars(trim($_POST["domaine"] ?? ""));
        $this->clubModel->description = htmlspecialchars(trim($_POST["description"] ?? ""));

        if (empty($this->clubModel->nom_club) || empty($this->clubModel->domaine) || empty($this->clubModel->description)) {
            echo "<div class='alert alert-danger'>Tous les champs sont requis.</div>";
            return;
        }

        $this->clubModel->addClub();
        echo "<div class='alert alert-success'>Club ajouté avec succès.</div>";
    }
    public function ModifierClub() {
        $this->clubModel = new Club();
        $this->clubModel->id_club = intval($_POST["id_club"] ?? 0);
        $this->clubModel->nom_club = htmlspecialchars(trim($_POST["nom_club"] ?? ""));
        $this->clubModel->domaine = htmlspecialchars(trim($_POST["domaine"] ?? ""));
        $this->clubModel->description = htmlspecialchars(trim($_POST["description"] ?? ""));

        if (empty($this->clubModel->nom_club) || empty($this->clubModel->domaine) || empty($this->clubModel->description)) {
            echo "<div class='alert alert-danger'>Tous les champs sont requis.</div>";
            return;
        }

        $this->clubModel->updateClub($this->clubModel->id_club);
        echo "<div class='alert alert-success'>Club modifié avec succès.</div>";
    }
}
?>