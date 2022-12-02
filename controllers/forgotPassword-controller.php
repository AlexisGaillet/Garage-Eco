<?php

    // Appel du fichier config
    require_once(__DIR__.'/../config/config.php');
    // Appel de la database
    require_once(__DIR__.'/../helpers/database.php');

    $headTitle = 'Mot de passe oublié';





        // Appel des vues    
    // Header
    include(__DIR__.'/../views/templates/header.php');
    // Main
    // include(__DIR__.'/../views/home.php');
    // Footer
    include(__DIR__.'/../views/templates/footer.php');