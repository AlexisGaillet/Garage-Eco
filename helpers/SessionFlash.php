<?php

class SessionFlash
{
    /**
     * Permet de définir un message flash (message d'erreur)
     * @param string $message
     * 
     * @return void
     */
    public static function setError(string $message): void
    {
        $_SESSION['messageError'] = $message;
    }

    /**
     * Permet de définir un message flash (message de succès)
     * @param string $message
     * 
     * @return void
     */
    public static function setGood(string $message): void
    {
        $_SESSION['messageGood'] = $message;
    }





    /**
     * Permet de récupérer le message flash et va le supprimer de la session
     * @return string
     */
    public static function get(): string
    {
        if (isset($_SESSION['messageError'])) {
            $message = $_SESSION['messageError'];
        } elseif (isset($_SESSION['messageGood'])) {
            $message = $_SESSION['messageGood'];
        }
        self::delete();
        return $message;
    }

    /**
     * Permet de supprimer le message flash
     * @return void
     */
    public static function delete(): void
    {
        if (isset($_SESSION['messageError'])) {
            unset($_SESSION['messageError']);
        } elseif (isset($_SESSION['messageGood'])) {
            unset($_SESSION['messageGood']);
        }
    }





    /**
     * Permet de savoir si un message flash existe
     * @return bool
     */
    public static function existError(): bool
    {
        return isset($_SESSION['messageError']);
    }

    /**
     * Permet de savoir si un message flash existe
     * @return bool
     */
    public static function existGood(): bool
    {
        return isset($_SESSION['messageGood']);
    }
}


// Commande qui va afficher le message flash

// if (SessionFlash::exist()) { echo '<h4>' . SessionFlash::get() . '</h4>'; }