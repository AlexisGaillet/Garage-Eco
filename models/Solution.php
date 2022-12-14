<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Solution {
    // Attributs
    private int $_id;
    private string $_title;

    // Constructeur
    // public function __construct(string $title) {
    //     $this->_title = $title;
    // }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getName():string {
        return $this->_title;
    }

    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setName(string $title):void {
        $this->_title = $title;
    }



    // Méthodes

    /**
     * Récupère la liste des solutions dans la base de données
     * @param int $offset
     * @param string $problem
     * 
     * @return array
     */
    public static function list(int $offset = -1, string $problem = ''):array|bool {
        if ($offset != -1) {
            if ($problem == '') {
                $sth = Database::getInstance()->query('SELECT * FROM `solutions` LIMIT ' . LIMIT_SOLUTIONS .' OFFSET '. $offset .';');
            } else {
                $sth = Database::getInstance()->query('SELECT * FROM `solutions` WHERE `title` LIKE "%' . $problem . '%" ORDER BY `Id_solutions` DESC LIMIT ' . LIMIT_SOLUTIONS .' OFFSET '. $offset .';');
            }
        } else {
            if ($offset == -1) {
                $sth = Database::getInstance()->query('SELECT * FROM `solutions` ORDER BY `Id_solutions` DESC;');
            }
        }

        if ($sth -> rowCount() >= 1) {
            return  $sth->fetchAll();
        }
        return false;
    }

    /**
     * Récupère une solution dans la base de données
     * @param int $id
     * 
     * @return object
     */
    public static function getOne(int $id):object|bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM `solutions` WHERE `Id_solutions` = :Id_solutions;');
        $sth->bindValue(':Id_solutions', $id, PDO::PARAM_INT);
        $sth->execute();

        if ($sth -> rowCount() == 1) {
            return  $sth->fetch();
        }
        return false;
    }
}