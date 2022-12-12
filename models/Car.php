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
    // public function __construct(int $id_users, int $id_brands, int $id_models, int $id_types) {
    //     $this->_id_users = $id_users;
    //     $this->_id_brands = $id_brands;
    //     $this->_id_models = $id_models;
    //     $this->_id_types = $id_types;
    // }

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





    // Méthodes

    /**
     * Ajoute une voiture à la base de donnée
     * @param int $id_user
     * @param int $id_brand
     * @param int $id_model
     * @param int $id_type
     * 
     * @return bool
     */
    public static function set(int $id_user, int $id_brand, int $id_model, int $id_type):bool {
        $sth = Database::getInstance()->prepare('INSERT INTO cars (Id_users, Id_brands, Id_models, Id_types) VALUES (:id_users, :id_brands, :id_models, :id_types);');

        $sth->bindValue(':id_users', $id_user, PDO::PARAM_INT);
        $sth->bindValue(':id_brands', $id_brand, PDO::PARAM_INT);
        $sth->bindValue(':id_models', $id_model, PDO::PARAM_INT);
        $sth->bindValue(':id_types', $id_type, PDO::PARAM_INT);

        $sth->execute();

        if ($sth -> rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *Donne le nombre de voiture d'un utilisateur ou false si il n'en a pas
     * @param int $id_user
     * 
     * @return bool
     */
    public static function userHasCar(int $id_user):bool|int {
        $sth = Database::getInstance()->prepare('SELECT * FROM cars WHERE Id_users = :id_users;');

        $sth->bindValue(':id_users', $id_user, PDO::PARAM_INT);

        $sth->execute();

        if ($sth -> rowCount() >= 1) {
            return $sth -> rowCount();
        } else {
            return false;
        }
    }

    /**
     * Donne les informations d'une voiture
     * @param int $id_user
     * 
     * @return array
     */
    public static function get(int $id_user):object|array|bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM cars WHERE Id_users = :id_users;');

        $sth->bindValue(':id_users', $id_user, PDO::PARAM_INT);

        $sth->execute();

        if ($sth -> rowCount() == 1) {
            return $sth -> fetch();
        } elseif ($sth -> rowCount() > 1) {
            return $sth -> fetchAll();
        } else {
            return false;
        }
    }

    /**
     * Donne les informations d'une voiture
     * @param int $id_user
     * 
     * @return array
     */
    public static function getByCarId(int $Id_car):object|bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM cars WHERE Id_cars = :Id_car;');

        $sth->bindValue(':Id_car', $Id_car, PDO::PARAM_INT);

        $sth->execute();

        if ($sth -> rowCount() == 1) {
            return $sth -> fetch();
        } else {
            return false;
        }
    }
}