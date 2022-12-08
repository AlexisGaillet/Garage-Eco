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
    // public function __construct(int $engine_type, int $motorization) {
    //     $this->_engine_type = $engine_type;
    //     $this->_motorization = $motorization;
    // }

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
    public static function get(int $id_models = null, bool $distinct = false, $where = false):array|bool {
        // On veut afficher tous les types d'un model
        if (!is_null($id_models)) {
            // Si il existe 2 fois le même type pour un model, on ne veut l'afficher qu'une seule fois
            if ($distinct) {
                $sql = 'SELECT DISTINCT `types`.`motorization` FROM `types` WHERE `types`.`id_models` = :id_models ORDER BY `types`.`motorization`;';
            } else {
                $sql = 'SELECT * FROM `types` WHERE `types`.`id_models` = :id_models ORDER BY `types`.`engine_type`;';
            }

            if ($where != false) {
                $sql = 'SELECT * FROM `types` WHERE `types`.`id_models` = :id_models AND `types`.`motorization` = :motorization ORDER BY `types`.`engine_type`;';
            }

            $sth = Database::getInstance()->prepare($sql);

            if ($where != false) {
                $sth->bindValue(':motorization', $where, PDO::PARAM_INT);
            }

            $sth->bindValue(':id_models', $id_models, PDO::PARAM_INT);
            $sth->execute();

        // On veut afficher tout les types
        } else {
            $sql = 'SELECT * FROM `types`;';
            $sth = Database::getInstance()->query($sql);
        }

        // Si cela retourne 1 ou plusieurs lignes on les retourne sous forme de tableau d'objets sinon on retourne false
        if ($sth -> rowCount() >= 1) {
            return $sth->fetchAll();
        } else {
            return false;
        }
    }

    /**
     * Récupère un type de moteur en fonction de son id
     * @param int $id
     * 
     * @return object|bool
     */
    public static function getOne(int $id):object|bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM `types` WHERE `types`.`Id_types` = :id;');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        if ($sth -> rowCount() >= 1) {
            return $sth->fetch();
        } else {
            return false;
        }
    }

    /**
     * Modifie la motorisation d'un modèle
     * @param int $id
     * @param string $engine_type
     * @param int $motorization
     * 
     * @return bool
     */
    public static function modify(int $id, string $engine_type, int $motorization):bool {
        $sth = Database::getInstance()->prepare('UPDATE `types` SET `engine_type` = :engine_type, `motorization` = :motorization WHERE `types`.`Id_types` = :id;');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':engine_type', $engine_type);
        $sth->bindValue(':motorization', $motorization, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;;
    }
}