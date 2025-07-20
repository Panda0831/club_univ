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
        default:
            throw new Exception("Page introuvable");
            break;
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

