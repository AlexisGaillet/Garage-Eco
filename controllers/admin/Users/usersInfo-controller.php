<?php

// Classe User
require_once(__DIR__.'/../../../models/User.php');
// Appel du tableau des roles
require_once(__DIR__.'/../../../helpers/array/role-array.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Liste des utilisateurs';


$users = User::get();


    // Appel des vues    
// Header
include(__DIR__.'/../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../views/admin/Users/usersList.php');
// Footer
include(__DIR__.'/../../../views/admin/templates/footer.php');