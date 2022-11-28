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
$headTitle = 'Connexion';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage
    // Nettoyage de l'email ($mail)
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    // (On ne nettoie pas les mots de passe) ($password)
    $password = filter_input(INPUT_POST, 'password');



        // Validation
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
    }

    // Validation du mot de passe ($password)
    // Champ vide
    if (empty($password)) {
        $error['password'] = 'Vous devez renseignez votre mot de passe';
    } else {
        // On récupère les infos de l'utilisateur grâce à soin email qu'il vient de rentrer
        $user = User::getByEmail($mail);
        // On récupère le mot de passe qui est crypté
        if ($user) {
            $hashedPassword = $user -> password;
            // On vérifie avec cette fonction si le mdp clair et le même que le mdp crypé qui vient de la base de donnée
            $passwordIsGood = password_verify($password, $hashedPassword);
            // Si les deux mot de passe ne sont pas identiques on met une erreur
            if ($passwordIsGood == false) {
                $error['password'] = 'L\'adresse mail ou le mot de passe est incorrect';
            }
        } else {
            $error['password'] = 'L\'adresse mail ou le mot de passe est incorrect';
        }

    }


    // Si il n'y a pas d'erreur
    if (empty($error)) {
        // On retire le mot de passe de l'object
        $user -> password = null;
        // On créer une Session avec les ses données (sans le mdp)
        $_SESSION['user'] = $user;
        // On le redirige à l'accueil
        header('Location: /');
    }




}


    // Appel des vues
// Header
include(__DIR__.'/../views/templates/header.php');
// Main
include(__DIR__.'/../views/login.php');
// Footer
include(__DIR__.'/../views/templates/footer.php');