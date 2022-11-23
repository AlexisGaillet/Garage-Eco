<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Car {
    // Attributs
    private int $_id;
    private int $_id_users;
    private int $_id_brands;
    private int $_id_models;
    private int $_id_types;

    // Constructeur
    public function __construct(int $id_users, int $id_brands, int $id_models, int $id_types) {
        $this->_id_users = $id_users;
        $this->_id_brands = $id_brands;
        $this->_id_models = $id_models;
        $this->_id_types = $id_types;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdUsers():int {
        return $this->_id_users;
    }

    public function getIdBrands():int {
        return $this->_id_brands;
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

    public function setIdUsers(int $id_users):void {
        $this->_id_users = $id_users;
    }

    public function setIdBrands(int $id_brands):void {
        $this->_id_brands = $id_brands;
    }

    public function setIdModels(int $id_models):void {
        $this->_id_models = $id_models;
    }

    public function setIdTypes(int $id_types):void {
        $this->_id_types = $id_types;
    }
}