<?php

function setDB() {
    static $pdo;

    if ($pdo === null) {
        $dsn = "mysql:host=localhost;dbname=gestion_club;charset=utf8mb4";
        $username = "root";
        $password = "Ryan";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Affiche une erreur claire si la connexion échoue
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    return $pdo;
}
