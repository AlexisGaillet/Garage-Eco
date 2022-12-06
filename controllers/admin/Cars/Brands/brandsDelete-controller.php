<?php

// Classe User
require_once(__DIR__.'/../../../../models/Brand.php');

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

// On récupère l'id de la marque à supprimer
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$isDeleted = Brand::delete($id);
if ($isDeleted) {
    SessionFlash::setGood('Marque '. Brand::get($id)->name .' supprimée avec succès');
} else {
    SessionFlash::setError('Une erreur est survenue lors de la suppression de la marque '. Brand::get($id)->name);
}

// Retourne à la page de la liste des marques
header('Location: /admin/vehicules');
exit();