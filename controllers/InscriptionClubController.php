<?php
require_once 'models/InscriptionClubModel.php';
require_once 'models/ClubModel.php';

class InscriptionClubController {

    public function afficherClubs() {
        session_start();

        $clubModel = new ClubModel();
        $clubs = $clubModel->getAllClubs();

        $inscriptions = [];

        if (isset($_SESSION['utilisateur']['id_utilisateur'])) {
            $id_utilisateur = $_SESSION['utilisateur']['id_utilisateur'];

            $inscriptionModel = new InscriptionClubModel();
            $inscriptions = $inscriptionModel->getClubsInscritsParUtilisateur($id_utilisateur);
        }

        // Charge la vue clubsPage.php en passant les données
        require 'views/pages/clubsPage.php';
    }

    public function inscrire() {
        session_start();

        if (!isset($_SESSION['utilisateur']['id_utilisateur'])) {
            // Redirige vers la page de connexion si pas connecté
            header("Location: login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_club'])) {
            $id_utilisateur = $_SESSION['utilisateur']['id_utilisateur'];
            $id_club = intval($_POST['id_club']);

            $inscriptionModel = new InscriptionClubModel();

            if (!$inscriptionModel->dejaInscrit($id_utilisateur, $id_club)) {
                $inscriptionModel->inscrireUtilisateur($id_utilisateur, $id_club);
                $message = "Inscription réussie au club.";
            } else {
                $message = "Vous êtes déjà inscrit à ce club.";
            }
        } else {
            $message = "Requête invalide.";
        }

        header("Location: profil");
        exit;
    }

    public function quitterClub() {
        session_start();

        if (!isset($_SESSION['utilisateur']['id_utilisateur'])) {
            header("Location: profil");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_club'])) {
            $id_utilisateur = $_SESSION['utilisateur']['id_utilisateur'];
            $id_club = intval($_POST['id_club']);

            $inscriptionModel = new InscriptionClubModel();

            if ($inscriptionModel->dejaInscrit($id_utilisateur, $id_club)) {
                $inscriptionModel->supprimerInscription($id_utilisateur, $id_club);
                $message = "Vous avez quitté le club avec succès.";
            } else {
                $message = "Vous n'étiez pas inscrit à ce club.";
            }
        } else {
            $message = "Requête invalide.";
        }

        header("Location: index.php?page=clubsPage&message=" . urlencode($message));
        exit;
    }
}
