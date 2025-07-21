<?php
require_once "models/crudModel.php";

function enregistrement($data){
    extract($data);
    if (enregistrement($data)) {
        header("Location:home");
        exit;
    }else{
        throw new Exception( ("Echec de l' inscription"));
    }
}