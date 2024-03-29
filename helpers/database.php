<?php

// Appelle du fichier de configuration (là où on définit les constantes de connexion à la BDD)
require_once(__DIR__.'./../config/config.php');

class Database {
    /**
     * Permet de se connecter à la base de données
     * @return [type]
     */
    public static function getInstance() {
        // Appel la base de donnée
        $pdo = new PDO(DSN, USER, PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


        return $pdo;
    }
}
