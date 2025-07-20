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