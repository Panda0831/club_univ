<?php
require_once "./models/InscriptionClubModel.php";
class InscriptionClubController
{
    private $inscriptionModel;

    public function __construct()
    {
        $this->inscriptionModel = new InscriptionClubModel();
    }

    public function getAllInscriptions()
    {
        return $this->inscriptionModel->getAllInscriptions();
    }

    public function inscrireUtilisateur($id_utilisateur, $id_club)
    {
        if (!$this->inscriptionModel->est_inscrit($id_utilisateur, $id_club)) {
            return $this->inscriptionModel->inscrireUtilisateur($id_utilisateur, $id_club);
        }
        return false; // Déjà inscrit
    }

    public function listerInscriptionsParUtilisateur($id_utilisateur)
    {
        return $this->inscriptionModel->listerInscriptionsParUtilisateur($id_utilisateur);
    }

    public function listerInscriptionsParClub($id_club)
    {
        return $this->inscriptionModel->listerInscriptionsParClub($id_club);
    }
}
?>