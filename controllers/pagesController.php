<?php

function homePage() {
    $datas_page = [
        "title" => "Page d'accueil",
        "description" => "Bienvenue sur la page d'accueil de mon site en MVC.",
        "view" => "views/pages/homePage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function clubPage() {
    $datas_page = [
        "title" => "Nos clubs",
        "description" => "Pour voir le catalogue de nos clubs",
        "view" => "views/pages/clubsPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function eventPage() {
    $datas_page = [
        "title" => "Nos evenements",
        "description" => "Pour tout les evenements",
        "view" => "views/pages/eventPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}

function aproposPage() {
    $datas_page = [
        "title" => "notre application",
        "description" => "notre page à propos",
        "view" => "views/pages/aproposPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function loginPage() {
    $datas_page = [
        "title" => "Page d' inscription",
        "description" => "Pour s' inscrire ",
        "view" => "views/pages/inscriptionPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}


function inscriptionPage() {
    $datas_page = [
        "title" => "Page de connexion",
        "description" => "Pour s' inscrire et se connecter",
        "view" => "views/pages/loginPage.php",
        "layout" => "views/components/layout.php"
    ];

    drawPage($datas_page);
}
