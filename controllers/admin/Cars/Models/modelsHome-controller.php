<?php

// Appel du fichier config
require_once(__DIR__.'/../../../../config/config.php');


// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modèles';


    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Models/modelsHome.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');