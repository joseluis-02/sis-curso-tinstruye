<?php
function cargarEnv($archivo)
{
    if (!file_exists($archivo)) {
        throw new Exception(".env file not found.");
    }

    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        if (strpos(trim($linea), '#') === 0) {
            continue;
        }

        list($clave, $valor) = explode('=', $linea, 2);
        putenv(trim($clave) . '=' . trim($valor));
        $_ENV[trim($clave)] = trim($valor);
        $_SERVER[trim($clave)] = trim($valor);
    }
}

// Cargar el archivo .env
cargarEnv(__DIR__ . '/../.env');

// Definir constantes para uso en la aplicación
define('host', getenv('DB_HOST'));
define('user', getenv('DB_USER'));
define('pass', getenv('DB_PASSWORD'));
define('db', getenv('DB_NAME'));
define('charset', getenv('DB_CHARSET'));
define('base_url', getenv('BASE_URL'));

define('app_env', getenv('APP_ENV'));
define('app_debug', getenv('APP_DEBUG') === 'true');
?>
