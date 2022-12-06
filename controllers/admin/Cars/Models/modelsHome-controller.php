<?php

// Classe User
require_once(__DIR__.'/../../../../models/Model.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modèles';

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
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$models = Model::get($id);

if ($models == false) {
    SessionFlash::setError('Aucun modèle trouvé');
    header('Location: /admin/vehicules');
    exit;
}


    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Models/modelsHome.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');