<?php

// Session start pour les Sessions flash
session_start();
// Récupération de la class session flash içi car on appelle toujours config.php
require_once(__DIR__.'/../helpers/SessionFlash.php');



// Déclaration des Regex
define('REGEX_NO_NUMBER', "^[a-zA-ZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜàáâãäåæçèéêëìíîïñòóôõöùúûüýÿ '-]+$");
define('REGEX_EMAIL', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
define('REGEX_DATE', "^\d{4}(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$");
define('REGEX_POSTALCODE', "^[0-9]{5}$");
define('REGEX_PHONENUMBER', '^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$');
define('REGEX_URL_LINKEDIN', "^(http(s)?:\/\/)?(www.linkedin.com\/in)\/[a-zA-Z0-9()-]+\/?$");
define('REGEX_LANGUAGE', "^[a-zA-Z0-9 \/'-]+$");



// BASE DE DONNEES
define('DSN', 'mysql:host=localhost;dbname=garage-eco;charset=utf8;port=3306');
define('USER', 'garage-eco-admin');
define('PWD', 'UEjY-6MM[k*bCkO9');



// Formateur de date ( echo $formatLongFr->format(strtotime("date en texte")) )
$formatLongFr = new IntlDateFormatter(
    locale : 'fr_FR',
    pattern : "EEEE dd MMMM Y 'à' HH'h'mm"
);