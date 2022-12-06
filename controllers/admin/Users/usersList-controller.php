<?php

// Appel du fichier config
require_once(__DIR__.'/../../../config/config.php');
// Classe User
require_once(__DIR__.'/../../../models/User.php');
// Appel du tableau des roles
require_once(__DIR__.'/../../../helpers/array/role-array.php');

// Expulse l'utilisateur s'il n'est pas connecté ou s'il n'est pas admin
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->admin == 0) {
        SessionFlash::setError('Vous n\'avez pas la permission d\'accéder à cette page');
        header('Location: /');
        exit;
    }
} else {
    SessionFlash::setError('Vous devez être connecté et être administrateur pour accéder à cette page');
    header('Location: /connexion');
    exit();
}


// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Liste des utilisateurs';




$users = User::get();


    // Appel des vues    
// Header
include(__DIR__.'/../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../views/admin/Users/usersList.php');
// Footer
include(__DIR__.'/../../../views/admin/templates/footer.php');