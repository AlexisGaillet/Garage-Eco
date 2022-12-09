<?php

// Config
require_once(__DIR__.'/../../../../config/config.php');
// Classe Model
require_once(__DIR__.'/../../../../models/Model.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Ajout d\'un modèle';

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

// On récupère l'id de la marque
$id_brand = intval(filter_input(INPUT_GET, 'id_brand', FILTER_SANITIZE_NUMBER_INT));

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
}