<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Model_Type {
    // Attributs
    private int $_id;
    private int $_id_models;
    private int $_id_types;

    // Constructeur
    public function __construct(int $id_models, int $id_types) {
        $this->_id_models = $id_models;
        $this->_id_types = $id_types;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdModels():int {
        return $this->_id_models;
    }

    public function getIdTypes():int {
        return $this->_id_types;
    }

    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setIdModels(int $id_models):void {
        $this->_id_models = $id_models;
    }

    public function setIdTypes(int $id_types):void {
        $this->_id_types = $id_types;
    }
}