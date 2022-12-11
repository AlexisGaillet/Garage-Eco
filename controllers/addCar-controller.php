<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');


if (isset($_SESSION['user'])) {

// Appel du tableau poure le nom des types de moteurs
require_once(__DIR__.'/../helpers/array/type-array.php');

// Appel de la database
require_once(__DIR__.'/../helpers/database.php');

// Classe Marque, Modèle et Type
require_once(__DIR__.'/../models/Brand.php');
require_once(__DIR__.'/../models/Model.php');
require_once(__DIR__.'/../models/Type.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');

// Nom du fichier CSS de la page
$stylesheet = 'loginRegister';
// Titre de la page
$headTitle = 'Ajouter un véhicule';





// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // On récupère l'id de l'utilisateur
    $id_user = $_SESSION['user']->Id_users;

        // Nettoyage
    // Nettoyage de la marque ($brand)
    $id_brand = trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage du modèle ($model)
    $id_model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage de la motorisation ($type)
    $id_type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));




        // Validation
    // Validation de la marque ($brand)
    $isOk = filter_var($id_brand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($id_brand)) {
        $error['brand'] = 'Vous devez renseigner une marque';
    } else {
        // Marque invalide
        if (!$isOk) {
            $error['brand'] = 'La marque n\'est pas valide';
        }
    }

    // Validation du modèle ($model)
    $isOk = filter_var($id_model, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($id_model)) {
        $error['model'] = 'Vous devez renseigner un modèle';
    } else {
        // Modèle invalide
        if (!$isOk) {
            $error['model'] = 'Le modèle n\'est pas valide';
        }
    }

    // Validation de la motorisation ($type)
    $isOk = filter_var($id_type, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

    // Champ vide
    if (empty($id_type)) {
        $error['type'] = 'Vous devez renseigner une motorisation';
    } else {
        // Motorisation invalide
        if (!$isOk) {
            $error['type'] = 'La motorisation n\'est pas valide';
        }
    }



    // Si il n'y a pas d'erreur
    if (empty($error)){
        // On crée un nouveau objet User
        $car = new Car;
        // On enregistre les informations en base de donnée
        $car = $car->set($id_user, $id_brand, $id_model, $id_type);
        // Si l'utilisateur est bien enregistré on redirige vers la âge connexion avec un message de succé (SessionFlash)
        if($car == true){
            SessionFlash::setGood('Vous avez bien ajouter un véhicule');
            header('Location: /');
            exit;
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

} else {
    SessionFlash::setError('Vous devez être connecté pour accéder à cette page');
    header('Location: /connexion');
    exit();
}
