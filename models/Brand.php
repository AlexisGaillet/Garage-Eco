<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class Brand {
    // Attributs
    private int $_id;
    private string $_name;
    private int $_most_selled;

    // Constructeur
    // public function __construct(string $name, int $most_selled) {
    //     $this->_name = $name;
    //     $this->_most_selled = $most_selled;
    // }

    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getName():string {
        return $this->_name;
    }

    public function getMostSelled():int {
        return $this->_most_selled;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setName(string $name):void {
        $this->_name = $name;
    }

    public function setMostSelled(int $most_selled):void {
        $this->_most_selled = $most_selled;
    }





    // Méthodes

    /**
     * Ajoute une marque dans la base de donnée
     * @param string $name
     * @param int $most_selled
     * 
     * @return bool
     */
    public static function add(string $name, int $most_selled):bool {
        $sth = Database::getInstance()->prepare('INSERT INTO `brands` (`name`, `most_selled`) VALUES (:name, :most_selled);');
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->bindValue(':most_selled', $most_selled, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }


    /**
     * Récupère toutes les marques de la base de donnée
     * @return object
     */
    public static function get(int $id=0):array|object|bool {
        if($id!=0){
            $sth = Database::getInstance()->prepare('SELECT * FROM `brands` WHERE `brands`.`Id_brands` = :id;');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
        } else {
            $sth = Database::getInstance()->query('SELECT * FROM `brands` ORDER BY `brands`.`name`;');
        }

        if ($sth -> rowCount() >= 1) {
            if($id!=0){
                return  $sth->fetch();
            } else {
                return  $sth->fetchAll();
            }
        }
        return false;
    }


    /**
     * Supprime une marque de la base de donnée
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id):bool {
        $sth = Database::getInstance()->prepare('DELETE FROM `brands` WHERE `brands`.`Id_brands` = :id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }


    /**
     * Modifie une marque de la base de donnée
     * @param int $id
     * @param string $name
     * @param int $most_selled
     * 
     * @return bool
     */
    public static function modify(int $id, string $name, int $most_selled):bool {
        $sth = Database::getInstance()->prepare('UPDATE `brands` SET `name` = :name, `most_selled` = :most_selled WHERE `brands`.`Id_brands` = :id;');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->bindValue(':most_selled', $most_selled, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }
}