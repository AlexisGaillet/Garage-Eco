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
    public function __construct(string $title) {
        $this->_title = $title;
    }

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
}