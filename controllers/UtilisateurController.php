<?php
require_once 'models/Utilisateur.php';

class UtilisateurController {
    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nie = $_POST['nie'];
            $password = $_POST['password'];

            $utilisateurModel = new Utilisateur();
            $utilisateur = $utilisateurModel->getUserByNie($nie);

            if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {
                session_start();
                $_SESSION['utilisateur'] = $utilisateur;

                // Redirection selon rôle
                switch ($utilisateur['role']) {
                    case 'responsable':
                        header('Location: profil'); break;
                    case 'superadmin':
                        header('Location: profil'); break;
                    default:
                        header('Location: profil'); break;
                }
                exit;
            }

        }
    }

    public function register() {
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
                header('Location: login');
                exit;
            } else {
                $error = 'Échec de l’inscription.';
            }
        }
    }
}
?>