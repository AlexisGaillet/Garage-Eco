<?php

// Classe User
require_once(__DIR__.'/../../../../models/Type.php');

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
$id_brand = intval(filter_input(INPUT_GET, 'id_brand', FILTER_SANITIZE_NUMBER_INT));
// On récupère l'id du modèle
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

// On récupère les motorisations
$types = Type::get($id);

if ($types == false) {
    SessionFlash::setError('Aucune motorisation trouvé');
    header('Location: /admin/modeles?id='.$id_brand);
    exit;
}


    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Types/typesHome.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');