<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');
// Classe Brand
require_once(__DIR__.'/../models/Brand.php');
// Classe Model
require_once(__DIR__.'/../models/Model.php');
// Classe Type
require_once(__DIR__.'/../models/Type.php');


// Nom du fichier CSS de la page
$stylesheet = 'loginRegister';
// Titre de la page
$headTitle = 'Choisir un véhicule';


// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['user'])) {
    SessionFlash::setError('Vous devez être connecté pour accéder à cette page');
    header('Location: /connexion');
    exit();
}

// Vérification de la présence d'un véhicule
if (Car::userHasCar($_SESSION['user']->Id_users) == false) {
    SessionFlash::setError('Vous devez avoir un véhicule pour accéder à cette page');
    header('Location: /ajouter-un-vehicule');
    exit();
}

// Si la session userCar existe déjà, on redirige l'utilisateur vers la page de réparation
if (isset($_SESSION['userCar'])) {
    header('Location: /reparer-moi-meme');
    exit();
}

// Si l'user a un seul véhicule, on le redirige directement vers la page de réparation
if (Car::userHasCar($_SESSION['user']->Id_users) == 1) {
    // On récupère l'id de l'unique véhicule
    $carId = Car::get($_SESSION['user']->Id_users)->Id_cars;

    // On enregistre les infos du véhicule dans la session
    $_SESSION['userCar'] = array(
        'carId' => $carId,
        'carBrand' => Brand::get($carId)->name,
        'carModel' => Model::getOne($carId)->name,
        'carYear' => Model::getOne($carId)->car_year,
        'carType' => Type::getOne($carId)->engine_type,
        'carCompleteName' => Brand::get($carId)->name.' '.Model::getOne($carId)->name.' '.Model::getOne($carId)->car_year.' - '.Type::getOne($carId)->engine_type
    );

    // On redirige l'utilisateur vers la page de réparation
    header('Location: /reparer-moi-meme');
    exit();
}


// Récupération des véhicules de l'utilisateur
$cars = Car::get($_SESSION['user']->Id_users);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nettoyage
// Nettoyage de l'id du moteur
$carId = trim(filter_input(INPUT_POST, 'car', FILTER_SANITIZE_NUMBER_INT));

    // Validation
// Validation de l'id du moteur
if (empty($carId)) {
    $error['car'] = 'Vous devez choisir un véhicule';
}

// Vérification de l'appartenance du moteur à l'utilisateur et aussi si il existe
if (Car::getByCarId($carId)->Id_users != $_SESSION['user']->Id_users) {
    $error['car'] = 'Vous ne pouvez pas choisir ce véhicule';
}

if (empty($error)) {
    // Enregistrement des infos du véhicule dans la session
    $_SESSION['userCar'] = array(
        'carId' => $carId,
        'carBrand' => Brand::get($carId)->name,
        'carModel' => Model::getOne($carId)->name,
        'carYear' => Model::getOne($carId)->car_year,
        'carType' => Type::getOne($carId)->engine_type,
        'carCompleteName' => Brand::get($carId)->name.' '.Model::getOne($carId)->name.' '.Model::getOne($carId)->car_year.' - '.Type::getOne($carId)->engine_type
    );
    
    // Redirection vers la page de réparation
    header('Location: /reparer-moi-meme');
    exit();
}
}


    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/chooseCar.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');