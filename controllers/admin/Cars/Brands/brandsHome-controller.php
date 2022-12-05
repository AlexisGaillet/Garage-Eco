<?php

// Appel du fichier config
require_once(__DIR__.'/../../../../config/config.php');
// Classe User
require_once(__DIR__.'/../../../../models/Brand.php');



// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Marques';


    // Appel des vues    
// Header
include(__DIR__.'/../../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../../views/admin/Cars/Brands/brandsHome.php');
// Footer
include(__DIR__.'/../../../../views/admin/templates/footer.php');