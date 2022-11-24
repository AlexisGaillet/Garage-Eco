<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Type {
    // Attributs
    private int $_id;
    private int $_engine_type;
    private int $_motorization;

    // Constructeur
    public function __construct(int $engine_type, int $motorization) {
        $this->_engine_type = $engine_type;
        $this->_motorization = $motorization;
    }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getEngineType():int {
        return $this->_engine_type;
    }

    public function getMotorization():int {
        return $this->_motorization;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setEngineType(int $engine_type):void {
        $this->_engine_type = $engine_type;
    }

    public function setMotorization(int $motorization):void {
        $this->_motorization = $motorization;
    }





    // Méthodes

    /**
     * Récupère tous les types de moteurs d'un model donné en paramètre ou tous les types de moteurs si aucun paramètre n'est donné
     * @param int|null $id_brands
     * 
     * @return array
     */
    public static function getAll(int $id_models = null):array|bool {
        if ($id_models) {
            $sth = Database::getInstance()->prepare('SELECT * FROM models WHERE id_models = :id_models');
            $sth->bindValue(':id_models', $id_models, PDO::PARAM_INT);
        } else {
            $sth = Database::getInstance()->query('SELECT * FROM models');
        }

        if ($sth -> rowCount() >= 1) {
            return $sth->fetchAll();
        } else {
            return false;
        }
    }
}