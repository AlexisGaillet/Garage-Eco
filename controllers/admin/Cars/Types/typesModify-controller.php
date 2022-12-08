<?php

// Tableau des types de motorisation
require_once(__DIR__.'/../../../../helpers/array/type-array.php');
// Config
require_once(__DIR__.'/../../../../config/config.php');
// Classe Type
require_once(__DIR__.'/../../../../models/Type.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modification d\'une motorisation';

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
$id_model = intval(filter_input(INPUT_GET, 'id_model', FILTER_SANITIZE_NUMBER_INT));
// On récupère l'id du modèle
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// On récupère la motorisation
$type = Type::getOne($id);

echo '<pre>' , var_dump($type) , '</pre>';

// On sépare la motorisation et la puissance
$explodeEngineType = explode('(', $type->engine_type);

// On retire les espaces et les parenthèses
$cylinder = trim($explodeEngineType[0], ' ');
$horsePower = trim($explodeEngineType[1], ' CH)');

// Si le formulaire a été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nettoyage
// Nettoyage du type de cylindré ($cylinder)
$cylinder = trim(filter_input(INPUT_POST, 'cylinder', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
// Nettoyage de la puissance ($horsePower)
$horsePower = intval(filter_input(INPUT_POST, 'horsePower', FILTER_SANITIZE_NUMBER_INT));
// Nettoyage de la motorization ($motorization)
$motorization = intval(filter_input(INPUT_POST, 'motorization', FILTER_SANITIZE_NUMBER_INT));




    // Validation
// Validation du nom ($name)
$isOk = filter_var($cylinder, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CHAR . '/')));
echo '<pre>' , var_dump($cylinder) , '</pre>';
// Champ vide
if (empty($cylinder)) {
    $error['cylinder'] = 'Vous devez renseigner une cylindré';
} else {
    // nom de modèle invalide
    if (!$isOk) {
        $error['cylinder'] = 'Le nom de la cylindré n\'est pas valide';
    }
}

// Validation de la puissance ($horsePower)
$isOk = filter_var($horsePower, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 3000)));

// Champ vide
if (empty($horsePower)) {
    $error['horsePower'] = 'Vous devez renseigner une puissance';
} else {
    // Puisssance invalide
    if (!$isOk) {
        $error['horsePower'] = 'La puissance n\'est pas valide';
    }
}

// Validation de la motorisation ($motorization)
$isOk = filter_var($motorization, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 7)));

// Champ vide
if (empty($motorization)) {
    $error['motorization'] = 'Vous devez renseigner une motorisation';
} else {
    // Puisssance invalide
    if (!$isOk) {
        $error['motorization'] = 'La motorisation n\'est pas valide';
    }
}

// On prépare la valeur de $engine_type
$engine_type = $cylinder . ' (' . $horsePower . ' CH)';

// Si aucune erreur
if (empty($error)) {
    // On enregistre les modifications dans la base de données
    $typeUpdated = Type::modify($id, $engine_type, $motorization);
    if($typeUpdated == true){
        SessionFlash::setGood('Vous avez bien modifier la motorisation ' . $engine_type);
        header('Location: /admin/motorisations?id=' . $id_model);
        exit;
    }
}
}



    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Types/typesModify.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');