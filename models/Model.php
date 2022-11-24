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

    // Constructeur
    public function __construct(int $id_brands, string $name) {
        $this->_id_brands = $id_brands;
        $this->_name = $name;
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





    // Méthodes

    /**
     * Récupère tous les modèles d'une marque donnée en paramètre ou tous les modèles si aucun paramètre n'est donné
     * @param int|null $id_brands
     * 
     * @return array
     */
    public static function getAll(int $id_brands = null, bool $distinct = false):array|bool {
        if (!is_null($id_brands)) {
            if ($distinct) {
                $sth = Database::getInstance()->prepare('SELECT DISTINCT `models`.`name` FROM `models` WHERE `models`.`id_brands` = :id_brands ORDER BY `models`.`name`');
            } else {
                $sth = Database::getInstance()->prepare('SELECT * FROM `models` WHERE `models`.`id_brands` = :id_brands ORDER BY `models`.`name`');
            }
            $sth->bindValue(':id_brands', $id_brands, PDO::PARAM_INT);
            $sth->execute();
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