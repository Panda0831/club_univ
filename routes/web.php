<?php

require_once __DIR__ . '/../app/controllers/UtilisateurController.php';

$page = $_GET['page'] ?? 'login';

$utilisateurController = new UtilisateurController();

switch ($page) {
    case 'login':
        $utilisateurController->login();
        break;
    case 'inscription':
        $utilisateurController->inscription();
        break;
    case 'profil':
        if (!isset($_SESSION['user'])) {
            header("Location: ?page=login");
            exit();
        }
        require __DIR__ . '/../app/views/utilisateur/profil.php';
        break;
    default:
        http_response_code(404);
        echo "Page introuvable";
}
