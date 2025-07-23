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

    public function updateProfile()
    {
        session_start();
       

        if (!isset($_SESSION['utilisateur'])) {
            header('Location: connexion');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ancien = $_SESSION['utilisateur'];

            $data = [
                'id_utilisateur' => $ancien['id_utilisateur'],
                'nie' => $ancien['nie'],
                'nom' => !empty(trim($_POST['nom'])) ? htmlspecialchars(trim($_POST['nom'])) : $ancien['nom'],
                'prenom' => !empty(trim($_POST['prenom'])) ? htmlspecialchars(trim($_POST['prenom'])) : $ancien['prenom'],
                'email' => !empty(trim($_POST['email'])) ? htmlspecialchars(trim($_POST['email'])) : $ancien['email'],
                'filiere' => !empty(trim($_POST['filiere'])) ? htmlspecialchars(trim($_POST['filiere'])) : $ancien['filiere'],
                'niveau' => !empty(trim($_POST['niveau'])) ? htmlspecialchars(trim($_POST['niveau'])) : $ancien['niveau'],
            ];
            // Mettre à jour le modèle Utilisateur
            $utilisateurModel = new Utilisateur();
            $success = $utilisateurModel->update($data);
            // Si la mise à jour est réussie, on recharge les informations de l'utilisateur
            if ($success) {
                var_dump($ancien['id_utilisateur']);
                $nouvelUtilisateur = $utilisateurModel->getUserById($data['id_utilisateur']);

                if ($nouvelUtilisateur) {
                    $_SESSION['utilisateur'] = $nouvelUtilisateur;
                    header('Location: profil');
                    exit;
                } else {
                    // Ne pas écraser la session si la récupération échoue
                    $_SESSION['error'] = "Profil mis à jour, mais impossible de recharger les infos.";
                    header('Location: profil');
                    exit;
                }
            } else {
                $_SESSION['error'] = 'Échec de la mise à jour du profil.';
                header('Location: modifierProfil');
                exit;
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
