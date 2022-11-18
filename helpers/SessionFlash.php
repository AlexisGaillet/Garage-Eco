<?php

class SessionFlash
{
    /**
     * Permet de définir un message flash (message d'erreur ou de succès)
     * @param string $message
     * 
     * @return void
     */
    public static function set(string $message): void
    {
        $_SESSION['message'] = $message;
    }

    /**
     * Permet de récupérer le message flash et va le supprimer de la session
     * @return string
     */
    public static function get(): string
    {
        $message = $_SESSION['message'];
        self::delete();
        return $message;
    }

    /**
     * Permet de supprimer le message flash
     * @return void
     */
    public static function delete(): void
    {
        unset($_SESSION['message']);
    }

    /**
     * Permet de savoir si un message flash existe
     * @return bool
     */
    public static function exist(): bool
    {
        return isset($_SESSION['message']);
    }
}


// Commande qui va afficher le message flash

// if (SessionFlash::exist()) { echo '<h4>' . SessionFlash::get() . '</h4>'; }