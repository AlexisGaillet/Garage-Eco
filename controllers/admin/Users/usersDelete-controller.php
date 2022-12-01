<?php

// Classe User
require_once(__DIR__.'/../../../models/User.php');

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
}

// On récupère l'id du patient à supprimer
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


$isDeleted = User::delete($id);
if ($isDeleted) {
    SessionFlash::setGood('Utilisateur supprimé avec succès');
} else {
    SessionFlash::setError('Une erreur est survenue lors de la suppression de l\'utilisateur');
}

// Retourne à la page de la liste des patients
header('Location: /admin/liste-utilisateur');
exit();