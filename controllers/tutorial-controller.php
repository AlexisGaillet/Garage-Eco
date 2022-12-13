<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');
// Classe Solution
require_once(__DIR__.'/../models/Step.php');


// Nom du fichier CSS de la page
$stylesheet = 'tutorial';
// Titre de la page
$headTitle = 'Suivez le tutoriel';

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


// On vérifie que le formulaire a bien été envoyé
if (isset($_GET['solution'])) {
    $solution = htmlspecialchars($_GET['solution']);
    $steps = (Step::list($solution));
} else {
    SessionFlash::setError('Vous devez choisir un problème pour accéder à cette page');
    header('Location: /reparer-moi-meme/choisir-solution');
    exit();
}


    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/tutorial.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');