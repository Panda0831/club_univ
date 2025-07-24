<?php
// controllers/ClubController.php

require_once 'models/ClubModel.php';

class ClubController
{
    private $clubModel;

    public function __construct()
    {
        $this->clubModel = new ClubModel();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Affiche les détails d’un club donné via son nom
     */
    public function show($nom_club)
    {
        $club = $this->clubModel->findByNom($nom_club);

        if (!$club) {
            throw new Exception("Club introuvable");
        }

        require 'views/pages/clubDetails.php';
    }

    /**
     * Affiche la liste des clubs dont l'utilisateur connecté est responsable
     */
    public function afficherClubsResponsable()
    {
        $this->checkConnexion();

        $utilisateur_id = $_SESSION['utilisateur']['id_utilisateur'];
        $mesClubs = $this->clubModel->clubsResponsable($utilisateur_id);

        require_once 'views/clubs/mesClubsResponsable.php';
    }

    /**
     * Gérer les clubs du responsable (affiche clubs + membres)
     * Adapté pour gérer plusieurs clubs si besoin
     */
    public function gerer()
    {
        $this->checkConnexion();

        $utilisateur_id = $_SESSION['utilisateur']['id_utilisateur'];
        $clubsResponsable = $this->clubModel->clubsResponsable($utilisateur_id);

        // Pour chaque club, récupérer les membres
        foreach ($clubsResponsable as &$club) {
            $club['membres'] = $this->clubModel->getMembresDuClub($club['id_club']);
        }
        unset($club);

        require 'views/clubs/gererClubs.php';
    }

    /**
     * Supprimer un membre d'un club
     */
    public function supprimerMembre()
    {
        $this->checkConnexion();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_club = $_POST['id_club'] ?? null;
            $id_membre = $_POST['id_membre'] ?? null;

            if (!$id_club || !$id_membre) {
                throw new Exception("Données invalides.");
            }

            $this->clubModel->supprimerMembre($id_club, $id_membre);

            // Redirection vers la gestion des clubs (route MVC propre)
            header("Location: /clubs/gerer");
            exit;
        }

        throw new Exception("Requête invalide.");
    }

    /**
     * Vérifie que l'utilisateur est connecté, sinon stoppe avec message
     */
    private function checkConnexion()
    {
        if (!isset($_SESSION['utilisateur'])) {
            throw new Exception("Accès refusé, vous devez être connecté.");
        }
    }
    public function gererMonClub()
{
    $this->checkConnexion();

    $utilisateur_id = $_SESSION['utilisateur']['id_utilisateur'];

    // Récupérer le club (ou les clubs) dont il est responsable
    $clubsResponsable = $this->clubModel->clubsResponsable($utilisateur_id);

    if (empty($clubsResponsable)) {
        echo "Vous ne gérez aucun club.";
        exit;
    }

    // Pour simplifier, si tu veux juste le premier club (si 1 seul géré)
    $club = $clubsResponsable[0];

    // Récupérer les membres du club
    $club['membres'] = $this->clubModel->getMembresDuClub($club['id_club']);

    require 'views/pages/gererMonClub.php';  // Crée cette vue avec l'UI pour gérer le club
}

public function voirMembres($id_club)
{
    $membres = $this->clubModel->getMembresByClub($id_club);
    require 'views/clubs/membres.php';
}


}
