<?php

// Classe Model
require_once(__DIR__.'/../../../../models/Model.php');

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

// On récupère l'id de la marque pour la redirection
$id_brand = intval(filter_input(INPUT_GET, 'id_brand', FILTER_SANITIZE_NUMBER_INT));
// On récupère l'id du modèle à supprimer
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$isDeleted = Model::delete($id);
if ($isDeleted) {
    SessionFlash::setGood('Modèle '.Model::getOne($id)->name.' '.Model::getOne($id)->car_year.' supprimé avec succès');
} else {
    SessionFlash::setError('Une erreur est survenue lors de la suppression du modèle '. Model::getOne($id)->name.' '.Model::getOne($id)->car_year);
}

// Retourne à la page de la liste des marques
header('Location: /admin/modeles?id='.$id_brand);
exit();