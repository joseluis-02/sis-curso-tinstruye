<?php
function cifrarPassword($password) {
    $salt = '$2y$10$' . substr(bin2hex(random_bytes(22)), 0, 22); // Genera un salt válido para bcrypt
    return crypt($password, $salt);
}

function verificarPassword($password_ingresada, $hash_guardado) {
    return crypt($password_ingresada, $hash_guardado) === $hash_guardado;
}
?>