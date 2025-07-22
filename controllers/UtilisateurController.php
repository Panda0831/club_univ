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
                header('Location: profil'); // à adapter selon ta page d’accueil
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
                header('Location: connexion'); // Redirection après l'inscription réussie
                exit;
            } else {
                $error = 'Échec de l’inscription.';
            }
        }
    }
    public function uploadImage()
    {
        session_start();
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'public/img/';
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Mettre à jour l'image de l'utilisateur dans la session
            $_SESSION['utilisateur']['image'] = $targetFile;

            // Mettre à jour l'image dans la base de données
            if (isset($_SESSION['utilisateur']['nie'])) {
                $utilisateurModel = new Utilisateur();
                $utilisateurModel->updateImage($_SESSION['utilisateur']['id'], $targetFile);
            }

            header('Location: profil'); // Redirection vers la page de profil
            exit;
            } else {
            $_SESSION['error'] = 'Échec du téléchargement de l’image.';
            }
        } else {
            $_SESSION['error'] = 'Aucun fichier sélectionné ou erreur lors du téléchargement.';
        }
    }

}