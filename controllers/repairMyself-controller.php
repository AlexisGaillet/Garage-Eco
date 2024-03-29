<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Appel du fichier config
require_once(__DIR__.'/../helpers/array/recommendedSearch-array.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');


// Nom du fichier CSS de la page
$stylesheet = 'repairMyself';
// Titre de la page
$headTitle = 'Réparer moi-même';

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['user'])) {
    SessionFlash::setError('Vous devez être connecté pour accéder à cette page');
    header('Location: /connexion');
    exit();
}

// Vérification de si l'utilisateur a un véhicule
if (Car::userHasCar($_SESSION['user']->Id_users) == false) {
    SessionFlash::setError('Vous devez avoir un véhicule pour accéder à cette page');
    header('Location: /ajouter-un-vehicule');
    exit();
}

// Vérification de la présence d'un véhicule
if (!isset($_SESSION['userCar'])) {
    SessionFlash::setError('Vous devez choisir un véhicule pour accéder à cette page');
    header('Location: /choisir-un-vehicule');
    exit();
}

    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/repairMyself.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');