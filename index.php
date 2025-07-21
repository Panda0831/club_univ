<?php 
require_once("controllers/pagesController.php");
require_once("controllers/crudController.php");
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
        case "clubs":
            clubPage();
            break;

        case "evenement":
            eventPage();
            break;

        case "apropos":
            aproposPage();
            break;

        case "connexion":
            loginPage();
            break;

        case "inscription":
            inscriptionPage();
            break;
        
        case "enregistrement":
            if ($_SERVER["REQUEST_METHOD"] === "POST") {

                // Récupérer et filtrer les données
                $data = [
                    'nom'      => htmlspecialchars(trim($_POST["nom"] ?? "")),
                    'prenom'   => htmlspecialchars(trim($_POST["prenom"] ?? "")),
                    'email'    => filter_var($_POST["email"] ?? "", FILTER_SANITIZE_EMAIL),
                    'nie'      => htmlspecialchars(trim($_POST["nie"] ?? "")),
                    'password' => $_POST["password"] ?? "",
                    'confirm'  => $_POST["confirm_password"] ?? "",
                    'filiere'  => htmlspecialchars(trim($_POST["filiere"] ?? "")),
                    'niveau'   => htmlspecialchars(trim($_POST["niveau"] ?? "")),
                    'classe'   => htmlspecialchars(trim($_POST["classe"] ?? ""))
                ];

                // Validation
                foreach ($data as $key => $val) {
                    if (empty($val) && $key !== 'confirm') {
                        echo "<div class='alert alert-danger'>Tous les champs sont requis.</div>";
                        return;
                    }
                }

                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='alert alert-warning'>Adresse email invalide.</div>";
                    return;
                }

                if ($data['password'] !== $data['confirm']) {
                    echo "<div class='alert alert-warning'>Les mots de passe ne correspondent pas.</div>";
                    return;
                }

                // Hash du mot de passe
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        // Si le formulaire est soumis
            }
            enregistrement($data);
            break;
        
        case "nous":
            nousPage();
            break;

        case "profil":
            profilPage();
            break;
            
        default:
            throw new Exception("Page introuvable");
            break;
        
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

