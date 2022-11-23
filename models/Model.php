<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Model {
    // Attributs
    private int $_id;
    private int $_id_brands;
    private string $_name;
    private string $_car_year;

    // Constructeur
    public function __construct(int $id_brands, string $name, string $_car_year) {
        $this->_id_brands = $id_brands;
        $this->_name = $name;
        $this->_car_year = $_car_year;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdBrands():int {
        return $this->_id_brands;
    }

    public function getName():string {
        return $this->_name;
    }

    public function getCarYear():string {
        return $this->_car_year;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setIdBrands(int $id_brands):void {
        $this->_id_brands = $id_brands;
    }

    public function setName(string $name):void {
        $this->_name = $name;
    }

    public function setCarYear(string $car_year):void {
        $this->_car_year = $car_year;
    }
}