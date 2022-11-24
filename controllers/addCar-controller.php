<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Appel de la database
require_once(__DIR__.'/../helpers/database.php');
// Classe Car
require_once(__DIR__.'/../models/Brand.php');
require_once(__DIR__.'/../models/Model.php');

// Nom du fichier CSS de la page
$stylesheet = 'loginRegister';
// Titre de la page
$headTitle = 'Ajouter un véhicule';

$brandList = Brand::getAll();
$modelListOptgroup = Model::getAll(1, true);
$modelList = Model::getAll(1);


// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage
    // Nettoyage de la marque ($brand)
    $brand = trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage du modèle ($model)
    $model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage de la motorisation ($type)
    $type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));




        // Validation
    // Validation de la marque ($brand)
    $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($brand)) {
        $error['brand'] = 'Vous devez renseigner une marque';
    } else {
        // Marque invalide
        if (!$isOk) {
            $error['brand'] = 'La marque n\'est pas valide';
        }
    }

    // Validation du modèle ($model)
    $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($model)) {
        $error['model'] = 'Vous devez renseigner un modèle';
    } else {
        // Modèle invalide
        if (!$isOk) {
            $error['model'] = 'Le modèle n\'est pas valide';
        }
    }

    // Validation de la motorisation ($type)
    $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($type)) {
        $error['type'] = 'Vous devez renseigner une motorisation';
    } else {
        // Motorisation invalide
        if (!$isOk) {
            $error['type'] = 'La motorisation n\'est pas valide';
        }
    }
}



    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/addCar.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');