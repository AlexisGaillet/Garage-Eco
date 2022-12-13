<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Classe Car
require_once(__DIR__.'/../models/Car.php');
// Classe Solution
require_once(__DIR__.'/../models/Solution.php');


// Nom du fichier CSS de la page
$stylesheet = 'chooseSolution';
// Titre de la page
$headTitle = 'Trouvez une solution';

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



if (isset($_GET['problem'])) {
    // Nettoyage
    $problem = trim(filter_input(INPUT_GET, 'problem', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
}



// Si la valeur page existe dans l'url on la récupère sinon on la définit à 1
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// On définit à partir de quel solution on va afficher les solutions (ex: si on est à la page 2 on affiche les solutions à partir du 11ème)
$offset = ($page - 1) * LIMIT_SOLUTIONS;

// On vérifie que le formulaire a bien été envoyé
if (isset($_GET['problem'])) {
    $problem = htmlspecialchars($_GET['problem']);
    $solutions = (Solution::list($offset, $problem));
} else {
    $solutions = (Solution::list($offset));
}








    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/chooseSolution.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');