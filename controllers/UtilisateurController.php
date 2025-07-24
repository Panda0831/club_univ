<?php
require_once 'models/Utilisateur.php';

class UtilisateurController
{
    // Méthode privée pour vérifier la session utilisateur
    private function checkLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['utilisateur'])) {
            header('Location: connexion');
            exit;
        }
        return $_SESSION['utilisateur'];
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $nie = $_POST['nie'] ?? '';
            $password = $_POST['mot_de_passe'] ?? '';

            $utilisateurModel = new Utilisateur();
            $utilisateur = $utilisateurModel->getUserByNie($nie);

            if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur'] = $utilisateur;

                // Redirection selon le rôle
                if (isset($utilisateur['role']) && $utilisateur['role'] === 'responsable') {
                    header('Location: responsable'); // Page dédiée aux responsables
                } else {
                    header('Location: profil'); // Page profil normal
                }
                exit;
            } else {
                $_SESSION['error'] = 'Identifiant ou mot de passe incorrect.';
                header('Location: connexion');
                exit;
            }
        }
    }

    public function register()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => htmlspecialchars($_POST['nom'] ?? ''),
                'prenom' => htmlspecialchars($_POST['prenom'] ?? ''),
                'nie' => htmlspecialchars($_POST['nie'] ?? ''),
                'email' => htmlspecialchars($_POST['email'] ?? ''),
                'filiere' => htmlspecialchars($_POST['filiere'] ?? ''),
                'niveau' => htmlspecialchars($_POST['niveau'] ?? ''),
                'mot_de_passe' => password_hash($_POST['mot_de_passe'] ?? '', PASSWORD_DEFAULT)
            ];
            $utilisateurModel = new Utilisateur();
            $success = $utilisateurModel->create($data);
            if ($success) {
                header('Location: home'); // Redirection après inscription réussie
                exit;
            } else {
                $error = 'Échec de l’inscription.';
                // Tu peux gérer l'affichage de $error dans la vue si besoin
            }
        }
    }

    public function updateProfile()
    {
        $utilisateur = $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ancien = $utilisateur;

            $data = [
                'id_utilisateur' => $ancien['id_utilisateur'],
                'nie' => $ancien['nie'],
                'nom' => !empty(trim($_POST['nom'])) ? htmlspecialchars(trim($_POST['nom'])) : $ancien['nom'],
                'prenom' => !empty(trim($_POST['prenom'])) ? htmlspecialchars(trim($_POST['prenom'])) : $ancien['prenom'],
                'email' => !empty(trim($_POST['email'])) ? htmlspecialchars(trim($_POST['email'])) : $ancien['email'],
                'filiere' => !empty(trim($_POST['filiere'])) ? htmlspecialchars(trim($_POST['filiere'])) : $ancien['filiere'],
                'niveau' => !empty(trim($_POST['niveau'])) ? htmlspecialchars(trim($_POST['niveau'])) : $ancien['niveau'],
            ];

            $utilisateurModel = new Utilisateur();
            $success = $utilisateurModel->update($data);

            if ($success) {
                // Recharge les infos à jour
                $nouvelUtilisateur = $utilisateurModel->getUserById($data['id_utilisateur']);
                if ($nouvelUtilisateur) {
                    $_SESSION['utilisateur'] = $nouvelUtilisateur;
                    header('Location: profil');
                    exit;
                } else {
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
        $utilisateur = $this->checkLogin();

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'public/img/';
            $filename = basename($_FILES['image']['name']);

            // Optionnel : sécuriser le nom du fichier (ex : uniqid + extension)
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = uniqid('img_') . '.' . $ext;

            $targetFile = $targetDir . $filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $_SESSION['utilisateur']['image'] = $targetFile;

                $utilisateurModel = new Utilisateur();
                $utilisateurModel->updateImage($utilisateur['id_utilisateur'], $targetFile);

                header('Location: profil'); // Redirection vers profil
                exit;
            } else {
                $_SESSION['error'] = 'Échec du téléchargement de l’image.';
                header('Location: profilImage');
                exit;
            }
        } else {
            $_SESSION['error'] = 'Aucun fichier sélectionné ou erreur lors du téléchargement.';
            header('Location: profilImage');
            exit;
        }
    }

    public function profil()
    {
        $utilisateur = $this->checkLogin();

        $utilisateur_id = $utilisateur['id_utilisateur'];

        require_once 'models/Utilisateur.php';
        $model = new Utilisateur();

        $nombreClubs = $model->getNombreClubsInscrits($utilisateur_id);

        require 'views/pages/profilPage.php';
    }
    public function gererMonClub() {
    session_start();
    if (!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['role'] !== 'responsable') {
        echo "Accès refusé.";
        exit;
    }

    $utilisateur = $_SESSION['utilisateur'];
    $idResponsable = $utilisateur['id_utilisateur'];

    require_once "models/Club.php";
    $clubModel = new ClubModel();
    $club = $clubModel->getClubByResponsable($idResponsable);

    if (!$club) {
        echo "Aucun club trouvé pour ce responsable.";
        exit;
    }

    require "views/clubs/gererMonClub.php";
}

    
}
