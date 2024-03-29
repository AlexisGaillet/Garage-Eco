<?php

// Config
require_once(__DIR__.'/../../../../config/config.php');
// Classe Brand
require_once(__DIR__.'/../../../../models/Brand.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Ajout d\'une marque';

// User is admin ?
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

if (!isset($mostSelled)) {
    $mostSelled = 0;
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage
// Nettoyage du nom de la marque ($brandName)
$brandName = trim(filter_input(INPUT_POST, 'brandName', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
// Nettoyage de l'option le plus vendue ($mostSelled)
$mostSelled = filter_input(INPUT_POST, 'mostSelled', FILTER_SANITIZE_NUMBER_INT);





    // Validation
// Validation du nom de la marque ($brandName)
$isOk = filter_var($brandName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));

// Champ vide
if (empty($brandName)) {
    $error['brandName'] = 'Vous devez renseigner un nom de marque';
} else {
    // nom de marque invalide
    if (!$isOk) {
        $error['brandName'] = 'Le nom de la marque n\'est pas valide';
    }
}

// Validation de l'option le plus vendue ($mostSelled)
if (!is_null($mostSelled)) {
    $mostSelled = 1;
} else {
    $mostSelled = 0;
}


// Si il n'y a pas d'erreur
if (empty($error)){
    // On enregistre les informations en base de donnée
    $brand = Brand::add($brandName, $mostSelled);
    // Si l'utilisateur est bien enregistré on redirige vers la âge connexion avec un message de succé (SessionFlash)
    if($brand == true){
        SessionFlash::setGood('Vous avez bien ajouté la marque ' . $brandName);
        header('Location: /admin/vehicules');
        exit;
    }
}
}


    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Brands/brandsAdd.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');