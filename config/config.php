<?php

// Session start pour les Sessions flash
session_start();
// Récupération de la class session flash içi car on appelle toujours config.php
require_once(__DIR__.'/../helpers/SessionFlash.php');



// Déclaration des Regex
define('REGEX_NO_NUMBER', "^[a-zA-ZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜàáâãäåæçèéêëìíîïñòóôõöùúûüýÿ '-]+$");
define('REGEX_PASSWORD', "(?=.[A-Z])(?=.\d)(?=.[!@#$&])[A-Za-z\d!@#$&*]{8,}");
define('REGEX_EMAIL', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");



// BASE DE DONNEES
define('DSN', 'mysql:host=localhost;dbname=garage-eco;charset=utf8;port=3306');
define('USER', 'garage-eco-admin');
define('PWD', 'UEjY-6MM[k*bCkO9');



// Formateur de date ( echo $formatLongFr->format(strtotime("date en texte")) )
$formatLongFr = new IntlDateFormatter(
    locale : 'fr_FR',
    pattern : "EEEE dd MMMM Y 'à' HH'h'mm"
);