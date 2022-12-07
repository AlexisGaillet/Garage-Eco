<?php

// Classe Model
require_once(__DIR__.'/../../../../models/Model.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modification d\'un modèle';

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

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$model = Model::getOne($id);


$placeholderCar_year = explode('-', $model->car_year);
$placeholderStart_year = trim($placeholderCar_year[0], '()');
$placeholderEnd_year = trim($placeholderCar_year[1], '()');


// Si le formulaire a été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nettoyage
// Nettoyage du nom du modèle ($name)
$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
// Nettoyage de l'année de début ($startYear)
$startYear = intval(filter_input(INPUT_POST, 'startYear', FILTER_SANITIZE_NUMBER_INT));
// Nettoyage de l'année de fin ($endYear)
$endYear = intval(filter_input(INPUT_POST, 'endYear', FILTER_SANITIZE_NUMBER_INT));
// Nettoyage de la checkbox ($noEndYear)
$noEndYear = filter_input(INPUT_POST, 'noEndYear', FILTER_SANITIZE_NUMBER_INT);




    // Validation
// Validation du nom du modèle ($name)
$isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_SPECIAL_CHAR . '/')));

// Champ vide
if (empty($name)) {
    $error['name'] = 'Vous devez renseigner un nom de modèle';
} else {
    // nom de modèle invalide
    if (!$isOk) {
        $error['name'] = 'Le nom du modèle n\'est pas valide';
    }
}

// Validation de l'année de début ($startYear)
$isOk = filter_var($startYear, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1850, "max_range" => (date('Y'))+3)));

// Champ vide
if (empty($startYear)) {
    $error['startYear'] = 'Vous devez renseigner une année de début';
} else {
    // Année de début invalide
    if (!$isOk) {
        $error['startYear'] = 'L\'année de début n\'est pas valide';
    }
}

// Validation de l'année de fin ($endYear)
// $isOk = filter_var($endYear, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1900, "max_range" => (date('Y'))+3)));

// Champ Remplie mais invalide
if (!empty($endYear)) {
    // Année de fin invalide
    if (!$isOk) {
        $error['endYear'] = 'L\'année de fin n\'est pas valide';
    }
} else {
    // Champ vide
    $endYear = '...';
}

// Validation de la checkbox ($noEndYear)
if ($noEndYear == 1) {
    $endYear = '...';
}

$car_year = '(' . $startYear . '-' . $endYear . ')';

// Si aucune erreur
if (!isset($error)) {
    // On crée un objet Model
    $modelUpdated = new Model();
    // On enregistre les modofications dans la base de données
    $modelUpdated = $modelUpdated->modify($id, $name, $car_year);
    // Si l'utilisateur est bien enregistré on redirige vers la âge connexion avec un message de succé (SessionFlash)
    if($modelUpdated == true){
        // SessionFlash::setGood('Vous avez bien modifier le modèle ' . $name);
        // header('Location: /admin/modeles?id=' . $id);
        // exit;
    }
}
}




    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Models/modelsModify.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');