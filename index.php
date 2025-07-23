<?php
require_once("controllers/pagesController.php");

require_once("controllers/utilities.php");
try {

    if (empty($_GET['page'])) {
        $page = "home";
    } else {
        $path = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $path[0];
    }
    switch ($page) {
        case "home":
            homePage();
            break;

        case "evenement":
            eventPage();
            break;

        case "apropos":
            aproposPage();
            break;

        case "connexion":
            loginPage();
            break;

        case "inscription":
            inscriptionPage();
            break;
        case "nous":
            nousPage();
            break;

        case "ajoutUser":
            $userController = new UtilisateurController();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $userController->register();
                return;
            }
            break;
        case "ajoutImage":
            $imageController = new UtilisateurController();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $imageController->uploadImage();
                return;
            }
            break;

        case "modifierProfil":
            $userController = new UtilisateurController();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $userController->updateProfile();
                return;
            }
            break;
        case "ProfilUpdate":
            modifyProfilPage();
            break;
        case "profilImage":
            ajoutImagePage();
            break;
        case "profil":
            profilPage();
            break;

        case "profilResponsable":
            profilResponsablePage();
            break;

        case "mesClubs":
            mesClubsPage();
            break;

        case "aide":
            aidePage();
            break;

        case "mesEvenement":
            mesEvenementPage();
            break;

        case "notification":
            notificationPage();
            break;

        case "logout":
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            session_destroy();
            session_abort();
            header("Location: home");
            break;
        case "inscrireUserClub":
            $clubController = new InscriptionClubController();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $clubController->inscrireUtilisateur();
                return;
            }
            break;

        default:
            throw new Exception("Page introuvable");
            break;
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
