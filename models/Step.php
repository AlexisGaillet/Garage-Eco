<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Step {
    // Attributs
    private int $_id;
    private string $_title;
    private string $_description;

    // Constructeur
    public function __construct(string $title, string $description) {
        $this->_title = $title;
        $this->_description = $description;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getTitle():string {
        return $this->_title;
    }

    public function getDescription():string {
        return $this->_description;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setTitle(string $title):void {
        $this->_title = $title;
    }

    public function setDescription(string $description):void {
        $this->_description = $description;
    }
}