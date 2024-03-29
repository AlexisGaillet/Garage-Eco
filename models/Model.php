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
    // public function __construct(int $id_brands, string $name) {
    //     $this->_id_brands = $id_brands;
    //     $this->_name = $name;
    // }

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
     * Récupère tous les modèles
     * @param int|null $id_brands
     * 
     * @return array
     */
    public static function get(int $id_brands = null, bool $distinct = false, $where = false):array|object|bool {
        // On veut afficher tous les modèles d'une marque
        if (!is_null($id_brands)) {
            // Si il existe 2 fois le même modèle pour une marque, on ne veut l'afficher qu'une seule fois
            if ($distinct) {
                $sql = 'SELECT DISTINCT `models`.`name` FROM `models` WHERE `models`.`id_brands` = :id_brands ORDER BY `models`.`name`;';
            } else {
                $sql = 'SELECT * FROM `models` WHERE `models`.`id_brands` = :id_brands ORDER BY `models`.`name`;';
            }

            if ($where != false) {
                $sql = 'SELECT * FROM `models` WHERE `models`.`id_brands` = :id_brands AND `models`.`name` = :name ORDER BY `models`.`name`';
            }

            $sth = Database::getInstance()->prepare($sql);
            if ($where != false) {
                $sth->bindValue(':name', $where);
            }
            
            $sth->bindValue(':id_brands', $id_brands, PDO::PARAM_INT);
            $sth->execute();

        // On veut afficher tout les modèles
        } else {
            $sql = 'SELECT * FROM `models`;';
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
     * Récupère un modèle en fonction de son id
     * @param int $id_model
     * 
     * @return object
     */
    public static function getOne(int $id_model):object|bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM `models` WHERE `models`.`Id_models` = :id_model;');
        $sth->bindValue(':id_model', $id_model, PDO::PARAM_INT);
        $sth->execute();

        if ($sth -> rowCount() >= 1) {
            return $sth->fetch();
        } else {
            return false;
        }
    }

    /**
     * Modifie un modèle en fonction de son id
     * @param int $id
     * @param string $name
     * @param string $car_year
     * 
     * @return [type]
     */
    public static function modify(int $id, string $name, string $car_year) {
        $sth = Database::getInstance()->prepare('UPDATE `models` SET `name` = :name, `car_year` = :car_year WHERE `models`.`Id_models` = :id_model;');
        $sth->bindValue(':id_model', $id, PDO::PARAM_INT);
        $sth->bindValue(':name', $name);
        $sth->bindValue(':car_year', $car_year);
        
        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }

    /**
     * Supprime un modèle en fonction de son id
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id):bool {
        $sth = Database::getInstance()->prepare('DELETE FROM `models` WHERE `models`.`Id_models` = :id_model;');
        $sth->bindValue(':id_model', $id, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }
}