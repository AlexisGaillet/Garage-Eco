<?php

// Appel du fichier config
require_once(__DIR__.'/../../../config/config.php');
// Appel de la database
require_once(__DIR__.'/../../../helpers/database.php');
// Classe User
require_once(__DIR__.'/../../../models/User.php');
// Appel du tableau des roles
require_once(__DIR__.'/../../../helpers/array/role-array.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modification d\'un utilisateur';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
echo '<pre>' , var_dump($id) , '</pre>';
$users = User::get($id);


    // Appel des vues    
// Header
include(__DIR__.'/../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../views/admin/Users/usersModify.php');
// Footer
include(__DIR__.'/../../../views/admin/templates/footer.php');