<?php
require_once __DIR__ . '/../models/Utilisateur.php';

class UtilisateurController {

    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nie = trim($_POST['nie'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($nie) || empty($password)) {
                $error = "Merci de remplir tous les champs.";
            } else {
                $utilisateurModel = new Utilisateur();
                $user = $utilisateurModel->getByNie($nie);

                if ($user && password_verify($password, $user['mot_de_passe'])) {
                    $_SESSION['user'] = [
                        'id' => $user['id_utilisateur'],
                        'nom' => $user['nom'],
                        'prenom' => $user['prenom'],
                        'role' => $user['role'],
                        'email' => $user['email']
                    ];

                    switch ($user['role']) {
                        case 'etudiant':
                            header("Location: ../public/index.php?page=profil");
                            break;
                        case 'responsable':
                            header("Location: ../public/index.php?page=admin_dashboard");
                            break;
                        case 'superadmin':
                            header("Location: ../public/index.php?page=superadmin");
                            break;
                        default:
                            header("Location: ../public/index.php?page=profil");
                    }
                    exit();
                } else {
                    $error = "Identifiants incorrects.";
                }
            }
        }

        require __DIR__ . '/../views/utilisateur/login.php';
    }

    public function inscription() {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $nie = trim($_POST['nie'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $filiere = trim($_POST['filiere'] ?? '');
            $niveau = trim($_POST['niveau'] ?? '');
            $mot_de_passe = $_POST['mot_de_passe'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            if (empty($nom) || empty($nie) || empty($email) || empty($mot_de_passe)) {
                $error = "Merci de remplir tous les champs obligatoires.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email invalide.";
            } elseif ($mot_de_passe !== $confirm_password) {
                $error = "Les mots de passe ne correspondent pas.";
            } else {
                $utilisateurModel = new Utilisateur();

                if ($utilisateurModel->getByNie($nie)) {
                    $error = "Ce NIE est déjà enregistré.";
                } else {
                    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

                    $data = [
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'nie' => $nie,
                        'email' => $email,
                        'filiere' => $filiere,
                        'niveau' => $niveau,
                        'mot_de_passe' => $hashed_password,
                        'role' => 'etudiant'
                    ];

                    $result = $utilisateurModel->create($data);

                    if ($result['success']) {
                        $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                    } else {
                        $error = "Erreur lors de l'inscription : " . ($result['error'] ?? 'Veuillez réessayer.');
                    }
                }
            }
        }

        require __DIR__ . '/../views/utilisateur/register.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();

        header("Location: ../public/index.php?page=login");
        exit();
    }
}
