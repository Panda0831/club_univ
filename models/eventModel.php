<?php 

    require_once "models/pdoModels.php";

    function getAllEvent(){
        $req= "SELECT * FROM ACTIVITE";
        $stmt= setDB()->prepare($req);
        $stmt->execute();
        $datas= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }