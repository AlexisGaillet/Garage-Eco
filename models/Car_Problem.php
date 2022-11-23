<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Car_Problem {
    // Attributs
    private int $_id;
    private int $_id_cars;
    private int $_id_problems;

    // Constructeur
    public function __construct(int $id_cars, int $id_problems) {
        $this->_id_cars = $id_cars;
        $this->_id_problems = $id_problems;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdCars():int {
        return $this->_id_cars;
    }

    public function getIdProblems():int {
        return $this->_id_problems;
    }

    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setIdCars(int $id_cars):void {
        $this->_id_cars = $id_cars;
    }

    public function setIdProblems(int $id_problems):void {
        $this->_id_problems = $id_problems;
    }
}