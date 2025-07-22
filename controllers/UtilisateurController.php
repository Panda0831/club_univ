<?php
require_once 'models/Utilisateur.php';

class UtilisateurController
{
    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nie = $_POST['nie'];
            $password = $_POST['mot_de_passe'];

            $utilisateurModel = new Utilisateur();
            $utilisateur = $utilisateurModel->getUserByNie($nie);
            if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {
                session_start();
                $_SESSION['utilisateur'] = $utilisateur;
                header('Location: home'); // à adapter selon ta page d’accueil
                exit;
            } else {
                session_start();
                // En cas d'erreur, on stocke le message dans la session pour l'afficher sur la page de connexion
                // et on redirige vers la page de connexio
                $_SESSION['error'] = 'Identifiant ou mot de passe incorrect.';
                header('Location: connexion'); // Redirection vers la page de connexion
                exit;
            }
        }
    }

    public function register()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => htmlspecialchars($_POST['nom']) ?? '',
                'prenom' => htmlspecialchars($_POST['prenom']) ?? '',
                'nie' => htmlspecialchars($_POST['nie'])    ?? '',
                'email' => htmlspecialchars($_POST['email']) ?? '',
                'filiere' => htmlspecialchars($_POST['filiere']) ?? '',
                'niveau' => htmlspecialchars($_POST['niveau']) ?? '',
                'mot_de_passe' => password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT)
            ];
            $utilisateurModel = new Utilisateur();
            $success = $utilisateurModel->create($data);
            if ($success) {
                header('Location: home'); // Redirection après l'inscription réussie
                exit;
            } else {
                $error = 'Échec de l’inscription.';
            }
        }
    }
}
