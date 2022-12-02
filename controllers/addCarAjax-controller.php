<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Model
require_once(__DIR__.'/../models/Model.php');
// Classe Type
require_once(__DIR__.'/../models/Type.php');

$id_brands = filter_input(INPUT_GET, 'Id_brands', FILTER_SANITIZE_NUMBER_INT);
$models = array();

foreach (Model::getAll($id_brands, true) as $distinctModel) {
    $models[$distinctModel->name] = [];

            foreach (Model::getAll($id_brands, false, $distinctModel->name) as $model) {
                array_push($models[$distinctModel->name], $model);
            }
}


echo json_encode($models, JSON_INVALID_UTF8_IGNORE);