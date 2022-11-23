<?php

    // Appel du fichier config
    require_once(__DIR__.'/../config/config.php');
    // Appel de la database
    require_once(__DIR__.'/../helpers/database.php');
    // Classe Car
    require_once(__DIR__.'/../models/Car.php');

    // Nom du fichier CSS de la page
    $stylesheet = 'loginRegister';
    // Titre de la page
    $headTitle = 'Ajouter un véhicule';





        // Appel des vues    
    // Header
    include(__DIR__.'/../views/templates/header.php');
    // Main
    include(__DIR__.'/../views/addCar.php');
    // Footer
    include(__DIR__.'/../views/templates/footer.php');