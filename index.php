<?php 
require_once("controllers/pagesController.php");

require_once("controllers/utilities.php");
try{

        if(empty($_GET['page'])){
        $page="home";
    }else{
        $path=explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page=$path[0];
    }
    switch($page){
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

        case"mesEvenement":
            mesEvenementPage();
            break;

        case "notification":
            notificationPage();
            break;

        case "logout":
            session_destroy();
            header("Location: home");
            
        default:
            throw new Exception("Page introuvable");
            break;
        
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

