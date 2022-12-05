<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (Constantes etc...)
require_once(__DIR__.'/../config/config.php');

class User {
    // Attributs
    private int $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_mail;
    private string $_password;
    private int $_admin;

    // Constructeur
    // public function __construct(string $firstname, string $lastname, string $mail, string $password, int $admin = 0) {
    //     $this->_firstname = $firstname;
    //     $this->_lastname = $lastname;
    //     $this->_mail = $mail;
    //     $this->_password = $password;
    //     $this->_admin = $admin;
    // }


    // Getters
    public function getId():int {
        return $this->_id;
    }

    public function getFirstname():string {
        return $this->_firstname;
    }

    public function getLastname():string {
        return $this->_lastname;
    }

    public function getMail():string {
        return $this->_mail;
    }

    public function getPassword():string {
        return $this->_password;
    }

    public function getAdmin():int {
        return $this->_admin;
    }


    // Setters
    public function setId(int $id):void {
        $this->_id = $id;
    }

    public function setFirstname(string $firstname):void {
        $this->_firstname = $firstname;
    }

    public function setLastname(string $lastname):void {
        $this->_lastname = $lastname;
    }

    public function setMail(string $mail):void {
        $this->_mail = $mail;
    }

    public function setPassword(string $password):void {
        $this->_password = $password;
    }

    public function setAdmin(int $admin):void {
        $this->_admin = $admin;
    }





    // Méthodes

    /**
     * Méthode qui permet de vérifier si l'utilisateur existe déjà dans la base de donnée
     * @param string $mail
     * 
     * @return bool
     */
    public static function exist(string $mail):bool {
        $sth = Database::getInstance()->prepare('SELECT * FROM users WHERE mail = :mail');
        $sth -> bindValue(':mail', $mail);
        $sth -> execute();
        // Si la requête retourne un résultat, l'utilisateur existe déjà
        if ($sth->fetch(PDO::FETCH_OBJ)==false){
            return false;
            } else {
            return true;
            }
    }

    /**
     * Méthode qui permet de créer un nouvel utilisateur
     * 
     * @return bool
     */
    public function set(int $id = null):User|bool{
        // Si l'id est null, on crée un nouvel utilisateur
        if(is_null($id)){
            $sql = 'INSERT INTO `users` (`firstname`, `lastname`, `mail`, `password`) 
                    VALUES (:firstname, :lastname, :mail, :password);';
        // Sinon on c'est qu'on veut modifier l'utilisateur
        } else {
            // $sql = 'UPDATE';
        }
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':firstname', $this->_firstname);
        $sth->bindValue(':lastname', $this->_lastname);
        $sth->bindValue(':mail', $this->_mail);
        $sth->bindValue(':password', $this->_password);
        if($sth->execute()){
            // On récupère l'id de l'utilisateur créé et on le set dans l'objet User
            if(is_null($id)){
                $this->setId(Database::getInstance()->lastInsertId());
            }
            // On retourne l'objet User créé ou modifié
            if($sth->rowCount()==1 || !is_null($id)){
                return $this;
            }
        }
        return false;
    }

    /**
     * Méthode qui permet de récupérer les utilisateurs ou un utilisateur en fonction de son mail
     * @param string $mail
     * 
     * @return object
     */
    public static function get(string $mail = '', int $id = 0):array|object|bool{ // ou User|bool

        $sql = 'SELECT * FROM `users`';

        if (!empty($mail)){
            $sql .= ' WHERE `mail` = :mail';
        }
        if ($id != 0){
            $sql .= ' WHERE `id_users` = :id';
        }

        $sql .= ';';
        
        $sth = Database::getInstance()->prepare($sql);

        if (!empty($mail)){
            $sth->bindValue(':mail', $mail);
        }
        if ($id != 0){
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
        }
        if($sth->execute()){
            if (!empty($mail)) {
                $result = $sth->fetch();
            } elseif ($id != 0) {
                $result = $sth->fetch();
            } else {
                $result = $sth->fetchAll();
            }
            if($result){
                return $result;
            }
        }
        return false;
    }

    public function modify($id):bool {
        $sql = 'UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `mail` = :mail, `admin` = :admin WHERE `id_users` = :id;';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':firstname', $this->_firstname);
        $sth->bindValue(':lastname', $this->_lastname);
        $sth->bindValue(':mail', $this->_mail);
        $sth->bindValue(':admin', $this->_admin, PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }

    public static function delete($id):bool {
        $sth = Database::getInstance()->prepare('DELETE FROM `users` WHERE `id_users` = :id;');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        if($sth->execute()){
            if($sth->rowCount()==1){
                return true;
            }
        }
        return false;
    }
}