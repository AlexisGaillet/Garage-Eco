<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Model
require_once(__DIR__.'/../models/Model.php');
// Classe Type
require_once(__DIR__.'/../models/Type.php');



$id_brands = filter_input(INPUT_GET, 'Id_brands', FILTER_SANITIZE_NUMBER_INT);

if (isset($id_brands)) {
    
    $models = array();
    
    foreach (Model::getAll($id_brands, true) as $distinctModel) {
        $models[$distinctModel->name] = [];
    
        foreach (Model::getAll($id_brands, false, $distinctModel->name) as $model) {
            array_push($models[$distinctModel->name], $model);
        }
    }

    echo json_encode($models, JSON_INVALID_UTF8_IGNORE);
}



$id_models = filter_input(INPUT_GET, 'Id_models', FILTER_SANITIZE_NUMBER_INT);

if (isset($id_models)) {

$types = array();

foreach (Type::getAll($id_models, true) as $distinctMotorization) {
    $types[$distinctMotorization->motorization] = [];

    foreach (Type::getAll($id_models, false, $distinctMotorization->motorization) as $type) {
        array_push($types[$distinctMotorization->motorization], $type);
    }
}

    echo json_encode($types, JSON_INVALID_UTF8_IGNORE);

}