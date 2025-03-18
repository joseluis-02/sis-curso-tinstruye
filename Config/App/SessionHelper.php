<?php
class SessionHelper {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        session_start();
        session_unset();
        session_destroy();
    }
    // Verificar si existe una sesión activa
    public static function isLoggedIn() {
        return isset($_SESSION['id']);
    }
}
?>
