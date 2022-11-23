<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Problem_Solution {
    // Attributs
    private int $_id;
    private int $_id_problems;
    private int $_id_solutions;

    // Constructeur
    public function __construct(int $id_problems, int $id_solutions) {
        $this->_id_problems = $id_problems;
        $this->_id_solutions = $id_solutions;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getIdProblems():int {
        return $this->_id_problems;
    }

    public function getIdSolutions():int {
        return $this->_id_solutions;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setIdProblems(int $id_problems):void {
        $this->_id_problems = $id_problems;
    }

    public function setIdSolutions(int $id_solutions):void {
        $this->_id_solutions = $id_solutions;
    }
}