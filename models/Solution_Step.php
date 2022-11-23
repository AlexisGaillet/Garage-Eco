<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Solution_Step {
    // Attributs
    private int $_id;
    private int $_id_solutions;
    private int $_id_steps;

    // Constructeur
    public function __construct(int $id_solutions, int $id_steps) {
        $this->_id_solutions = $id_solutions;
        $this->_id_steps = $id_steps;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdSolutions():int {
        return $this->_id_solutions;
    }

    public function getIdSteps():int {
        return $this->_id_steps;
    }

    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setIdSolutions(int $id_solutions):void {
        $this->_id_solutions = $id_solutions;
    }

    public function setIdSteps(int $id_steps):void {
        $this->_id_steps = $id_steps;
    }
}