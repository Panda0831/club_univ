<?php
require_once "models/eventModel.php";

require_once "controllers/UtilisateurController.php";

function homePage()
{
    $datas_page = [
        "title" => "Page d'accueil",
        "description" => "Bienvenue sur la page d'accueil de mon site en MVC.",
        "view" => "views/pages/homePage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}





function eventPage()
{
    $model = new eventModel();
    $events = $model->getAllEvent();
    $datas_page = [
        "title" => "Nos evenements",
        "description" => "Pour tout les evenements",
        "view" => "views/pages/eventPage.php",
        "layout" => "views/components/layout.php",
        "events" => $events
    ];

    drawPage($datas_page);
}

function aproposPage()
{
    $datas_page = [
        "title" => "notre application",
        "description" => "notre page à propos",
        "view" => "views/pages/aproposPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function inscriptionPage()
{
    $userController = new UtilisateurController();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $userController->register();
        return;
    }
    $datas_page = [
        "title" => "Page d' inscription",
        "description" => "Pour s' inscrire ",
        "view" => "views/pages/inscriptionPage.php",
        "layout" => "views/components/layout.php"
    ];
    drawPage($datas_page);
}


function loginPage()
{
    $datas_page = [
        "title" => "Page de connexion",
        "description" => "Pour  se connecter",
        "view" => "views/pages/loginPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}

function nousPage()
{
    $datas_page = [
        "title" => "Qui sommme nous ?",
        "description" => "pour savoir un peut plus sur nous",
        "view" => "views/pages/nousPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function profilPage()
{
    $datas_page = [
        "title" => "Profil personnel",
        "description" => "Naviguer et voir tes CLubs",
        "view" => "views/pages/profilPage.php",
        "layout" => "views/components/profil.php"
    ];

    drawPage($datas_page);
}

function mesClubsPage()
{
    $datas_page = [
        "title" => "Voir mes Clubs",
        "description" => "Navigue et voit tes CLubs",
        "view" => "views/pages/mesClubsPage.php",
        "layout" => "views/components/profil.php"
    ];

    drawPage($datas_page);
}

function aidePage()
{
    $datas_page = [
        "title" => "Page Aide",
        "description" => "Pour t' aider à mieux comprendre l' application",
        "view" => "views/pages/aidePage.php",
        "layout" => "views/components/profil.php"
    ];

    drawPage($datas_page);
}

function mesEvenementPage()
{
    $datas_page = [
        "title" => "Page évenements",
        "description" => "Pour voir les activités de tes Clubs",
        "view" => "views/pages/mesEvenementPage.php",
        "layout" => "views/components/profil.php"
    ];

    drawPage($datas_page);
}

function notificationPage()
{
    $datas_page = [
        "title" => "Page de notification",
        "description" => "Pour recevoir les notifications et message de vos clubs",
        "view" => "views/pages/notificationPage.php",
        "layout" => "views/components/profil.php"
    ];

    drawPage($datas_page);
}


function profilResponsablePage()
{
    $datas_page = [
        "title" => "Profil personnel du responsable",
        "description" => "Pour gere les clubs",
        "view" => "views/pages/profilResponsablePage.php",
        "layout" => "views/components/responsable.php"
    ];

    drawPage($datas_page);
}