<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Brand {
    // Attributs
    private int $_id;
    private string $_name;
    private int $_most_selled;

    // Constructeur
    public function __construct(string $name, int $most_selled) {
        $this->_name = $name;
        $this->_most_selled = $most_selled;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getName():string {
        return $this->_name;
    }

    public function getMostSelled():int {
        return $this->_most_selled;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setName(string $name):void {
        $this->_name = $name;
    }

    public function setMostSelled(int $most_selled):void {
        $this->_most_selled = $most_selled;
    }
}