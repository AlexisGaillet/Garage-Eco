<?php

// Appel du fichier config
require_once(__DIR__.'/../config/config.php');
// Appel de la database
require_once(__DIR__.'/../helpers/database.php');
// Classe User
require_once(__DIR__.'/../models/User.php');




// Nom du fichier CSS de la page
$stylesheet = 'loginRegister';
// Titre de la page
$headTitle = 'Inscription';




// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettage
    // Nettoyage du prénom ($firstname)
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage du nom ($lastname)
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // Nettoyage de l'email ($mail)
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    // (On ne nettoie pas les mots de passe) ($password)
    $password = filter_input(INPUT_POST, 'password');
    // ($confirmPassword)
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');




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
    $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);
    // Champ vide
    if (empty($mail)) {
        $error['mail'] = 'Vous devez renseigner une adresse mail';
    } else {
        if (!$isOk) {
            // Email invalide
            $error['mail'] = 'L\'adresse mail n\'est pas valide';
        }
        // Vérification si l'email existe déjà
        if (User::exist($mail) == true) {
            $error['mail'] = 'L\'adresse mail existe déjà, connectez-vous ou utilisez une autre adresse mail';
        }
    }

    // Vérification si les mots de passe sont identiques
    if($password != $confirmPassword) {
        $error['password'] = 'Les mots de passe doivent être identiques';
    } else {
        if(empty($password)){
            $error['password'] = 'Le mot de passe est obligatoire';
        }
    }

    // On hash le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    echo '<pre>' , var_dump($error) , '</pre>';

    if (empty($error)){
        $user = new User($firstname, $lastname, $mail, $password);
        $user = $user->set();
        if($user){
            // header('Location: /controllers/signInCtrl.php');
            // exit;
            echo '<pre>' , var_dump('Ajouté') , '</pre>';
            echo '<pre>' , var_dump($user) , '</pre>';
        }
    }





}





    // Appel des vues
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/register.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');