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


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$users = User::get('', $id);


// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nettoyage
// Nettoyage du prénom ($firstname)
$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
// Nettoyage du nom ($lastname)
$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
// Nettoyage de l'email ($mail)
$mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
// Nettoyage du rôle ($admin)
$admin = intval(filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_NUMBER_INT));




    // Validation
// Validation du prénom ($firstname)
$isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));

// Champ vide
if (empty($firstname)) {
    $error['firstname'] = 'Vous devez renseigner un prénom';
} else {
    // Prénom invalide
    if (!$isOk) {
        $error['firstname'] = 'Le prénom n\'est pas valide';
    }
}


// Validation du nom ($lastname)
$isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));

// Champ vide
if (empty($lastname)) {
    $error['lastname'] = 'Vous devez renseigner un nom de famille';
} else {
    // Nom de famille invalide
    if (!$isOk) {
        $error['lastname'] = 'Le nom n\'est pas valide';
    }
}


// Validation de l'email ($mail)
if (User::exist($mail) == true && $users -> mail != $mail) {
    $error['mail'] = 'Cet email est déjà utilisé';
}

$isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);

// Champ vide
if (empty($mail)) {
    $error['mail'] = 'Vous devez renseigner une adresse mail';
} else {
    if (!$isOk) {
        // Email invalide
        $error['mail'] = 'L\'adresse mail n\'est pas valide';
    }
}



// Rôle invalide
if ($admin != 0 && $admin != 1) {
    $error['admin'] = 'Le rôle n\'est pas valide';
}


// Si il n'y a pas d'erreur
if (empty($error)){
    // On crée un nouveau objet User
    $user = new User;
    // On hydrate l'objet
    $user->setFirstname($firstname);
    $user->setLastname($lastname);
    $user->setMail($mail);
    $user->setAdmin($admin);
    // On enregistre les informations en base de donnée
    $user = $user->modify($id);
    // Si l'utilisateur est bien enregistré on redirige vers la âge connexion avec un message de succé (SessionFlash)
    if($user){
        SessionFlash::setGood('L\'utilisateur avec l\'ID '.$id.' a bien été modifié');
        header('Location: /admin/liste-utilisateur');
        exit;
    }
}
}




    // Appel des vues    
// Header
include(__DIR__.'/../../../views/admin/templates/header.php');
// Main
include(__DIR__.'/../../../views/admin/Users/usersModify.php');
// Footer
include(__DIR__.'/../../../views/admin/templates/footer.php');