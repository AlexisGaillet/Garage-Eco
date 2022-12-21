<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Appel de la databas
require_once(__DIR__.'/../helpers/database.php');
// Classe User
require_once(__DIR__.'/../models/User.php');

// Nom du fichier CSS de la page
$stylesheet = 'admin';
// Titre de la page
$headTitle = 'Modification du profil';


// User is connected ?
if (!isset($_SESSION['user'])) {
    SessionFlash::setError('Vous devez être connecté pour accéder à cette page');
    header('Location: /connexion');
    exit();
}

// $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (isset($id)) {
    SessionFlash::setError('Erreur');
    header('Location: /');
    exit;
} else {
    $id = $_SESSION['user']->Id_users;
};

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





// Si il n'y a pas d'erreur
if (empty($error)){
    // On crée un nouveau objet User
    $user = new User;
    // On hydrate l'objet
    $user->setFirstname($firstname);
    $user->setLastname($lastname);
    $user->setMail($mail);
    $user->setAdmin(0);
    // On enregistre les informations en base de donnée
    $user = $user->modify($id);
    // Si l'utilisateur est bien enregistré on redirige vers la âge connexion avec un message de succé (SessionFlash)
    if($user){
        SessionFlash::setGood('Vous avez bien modifié votre profil');
        header('Location: /');
        exit;
    }
}
}




    // Appel des vues    
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/userModify.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');