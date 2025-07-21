<?php
require_once "models/pdoModels.php";

function enregistrementDB($data) {
    // Vérifie si NIE ou email existe déjà
    $check = setDB()->prepare("SELECT COUNT(*) FROM UTILISATEUR WHERE nie = :nie OR email = :email");
    $check->bindParam(":nie", $data['nie'], PDO::PARAM_STR);
    $check->bindParam(":email", $data['email'], PDO::PARAM_STR);
    $check->execute();

    if ($check->fetchColumn() > 0) {
        echo "<div class='alert alert-danger'>Cet email ou NIE est déjà utilisé.</div>";
        return false;
    }

    // Requête d'insertion
    $req = "INSERT INTO UTILISATEUR 
            (id_utilisateur, nom, prenom, nie, email, filiere, niveau, mot_de_passe, role, image) 
            VALUES (NULL, :nom, :prenom, :nie, :email, :filiere, :niveau, :mot_de_passe, DEFAULT, DEFAULT)";

    $stmt = setDB()->prepare($req);

    // Liaison des paramètres
    $stmt->bindParam(":nom", $data['nom'], PDO::PARAM_STR);
    $stmt->bindParam(":prenom", $data['prenom'], PDO::PARAM_STR);
    $stmt->bindParam(":nie", $data['nie'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
    $stmt->bindParam(":filiere", $data['filiere'], PDO::PARAM_STR);
    $stmt->bindParam(":niveau", $data['niveau'], PDO::PARAM_STR);
    $stmt->bindParam(":mot_de_passe", $data['password'], PDO::PARAM_STR);

    // Exécution
    $stmt->execute();
    $stmt->closeCursor();

    return true;
}
