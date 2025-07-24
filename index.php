<?php
require_once "controllers/pagesController.php";
require_once "controllers/utilities.php";

try {
    if (empty($_GET['page'])) {
        $page = "home";
        $path = [];
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

        case "danse":
            danse();
            break;

        case "ajoutUser":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                require_once "controllers/UtilisateurController.php";
                $userController = new UtilisateurController();
                $userController->register();
            }
            break;

        case "ajoutImage":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                require_once "controllers/UtilisateurController.php";
                $imageController = new UtilisateurController();
                $imageController->uploadImage();
            }
            break;

        case "modifierProfil":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                require_once "controllers/UtilisateurController.php";
                $userController = new UtilisateurController();
                $userController->updateProfile();
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

        case "responsable":
            profilResponsablePage();
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
            // Redirection propre, adapte selon ta config
            header("Location: home");
            exit;

        /** --------- GESTION INSCRIPTION CLUB ---------- */
        case "clubsPage":
            require_once "controllers/InscriptionClubController.php";
            $clubController = new InscriptionClubController();
            $clubController->afficherClubs();
            break;

        case "inscrireClub":
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_club'])) {
                require_once "controllers/InscriptionClubController.php";
                $clubController = new InscriptionClubController();
                $clubController->inscrire();
                exit;
            }
            break;

        case "quitterClub":
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_club'])) {
                require_once "controllers/InscriptionClubController.php";
                $clubController = new InscriptionClubController();
                $clubController->quitterClub();
                exit;
            }
            break;

        case "supprimerMembre":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                require_once "controllers/ClubController.php";
                $clubController = new ClubController();
                $clubController->supprimerMembre();
                exit;
            }
            break;

        case "gererMonClub":
            require_once "controllers/ClubController.php";
            $clubController = new ClubController();
            $clubController->gererMonClub();
            break;

       case "clubs":
    require_once "controllers/ClubController.php";
    $clubController = new ClubController();

    if (isset($path[1])) {
        if ($path[1] === "gerer") {
            $clubController->gerer();
            exit;
        }

        if ($path[1] === "voir" && isset($path[2])) {
            $clubController->show($path[2]);
            exit;
        }

        if ($path[1] === "inscrire" && isset($path[2])) {
            $clubController->show($path[2]);
            exit;
        }

        if ($path[1] === "membres" && isset($_GET['id'])) {
            $clubController->voirMembres($_GET['id']);
            exit;
        }
    }

    throw new Exception("URL incorrecte pour la page clubs.");


        case "mesClubsResponsable":
            require_once "controllers/ClubController.php";
            $controller = new ClubController();
            $controller->afficherClubsResponsable();
            break;

        default:
            throw new Exception("Page introuvable : " . htmlspecialchars($page));
    }
} catch (Exception $e) {
    echo "<h1>Erreur :</h1><p>" . htmlspecialchars($e->getMessage()) . "</p>";
}
