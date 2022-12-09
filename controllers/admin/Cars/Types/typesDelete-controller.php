<?php

// Appel du fichier config
require_once(__DIR__.'/../../../../config/config.php');
// Classe Type
require_once(__DIR__.'/../../../../models/Type.php');

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

// On récupère l'id du modèle pour la redirection
$id_model = intval(filter_input(INPUT_GET, 'id_model', FILTER_SANITIZE_NUMBER_INT));
// On récupère l'id du type à supprimer
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


$isDeleted = Type::delete($id);
if ($isDeleted) {
    SessionFlash::setGood('Motorisation supprimée avec succès');
} else {
    SessionFlash::setError('Une erreur est survenue lors de la suppression de la motorisation '. Type::getOne($id)->name);
}

// Retourne à la page de la liste des modèles
header('Location: /admin/motorisations?id='.$id_model);
exit();