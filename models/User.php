<?php

// Appelle de la base de donnée
require_once(__DIR__.'/../helpers/database.php');
// Appelle du fichier de configuration (REGEX, constantes etc...)
require_once(__DIR__.'/../config/config.php');

class User {
    // Attributs
    private int $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_phone;
    private string $_city;
    private string $_contry;
    private string $_mail;
    private string $_password;

    // Constructeur
    public function __construct(string $firstname, string $lastname, string $phone, string $city, string $contry, string $mail, string $password) {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_phone = $phone;
        $this->_city = $city;
        $this->_contry = $contry;
        $this->_mail = $mail;
        $this->_password = $password;
    }

    // Getters
    public function getId(): int {
        return $this->_id;
    }

    public function getFirstname(): string {
        return $this->_firstname;
    }

    public function getLastname(): string {
        return $this->_lastname;
    }

    public function getPhone(): string {
        return $this->_phone;
    }

    public function getCity(): string {
        return $this->_city;
    }

    public function getContry(): string {
        return $this->_contry;
    }

    public function getMail(): string {
        return $this->_mail;
    }

    public function getPassword(): string {
        return $this->_password;
    }


    // Setters
    public function setId(int $id): void {
        $this->_id = $id;
    }

    public function setFirstname(string $firstname): void {
        $this->_firstname = $firstname;
    }

    public function setLastname(string $lastname): void {
        $this->_lastname = $lastname;
    }

    public function setPhone(string $phone): void {
        $this->_phone = $phone;
    }

    public function setCity(string $city): void {
        $this->_city = $city;
    }

    public function setContry(string $contry): void {
        $this->_contry = $contry;
    }

    public function setMail(string $mail): void {
        $this->_mail = $mail;
    }

    public function setPassword(string $password): void {
        $this->_password = $password;
    }
}