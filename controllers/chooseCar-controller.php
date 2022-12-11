<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');


// Nom du fichier CSS de la page
$stylesheet = 'chooseCar';
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

// if (Car::userHasCar($_SESSION['user']->Id_users) == 1) {
//     header('Location: /reparer-moi-meme?carId='.$_SESSION['user']->Id_users);
//     exit();
// }
    // RECHERCHE DE TECHNIQUE POUR REDIRECTION SI L'USER A UN VEHICULE UNIQUE EST DONC IL EST CHOISI PAR DEFAUT 




    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/chooseCar.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');