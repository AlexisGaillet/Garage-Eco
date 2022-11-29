<?php

// Appel du fichier config
require_once(__DIR__.'/../../../config/config.php');
// Appel de la database
require_once(__DIR__.'/../../../helpers/database.php');


// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Véhicules';


    // Appel des vues    
// Header
include(__DIR__.'/../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../views/admin/Cars/carsHome.php');
// Footer
include(__DIR__.'/../../../views/admin/templates/footer.php');