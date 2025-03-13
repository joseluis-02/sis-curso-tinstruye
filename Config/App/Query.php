<?php
class Query {
    private $pdo, $conexion, $sql;
    public function __construct() {
        $this->pdo = new Conexion();
        $this->conexion = $this->pdo->conect();
    }

    public function select(string $sql) {
        try {
            // Preparar la consulta
            $this->sql = $sql;
            $resultado = $this->conexion->prepare($this->sql);
            
            // Ejecutar la consulta
            $resultado->execute();
            
            // Retornar los resultados como un array asociativo
            return $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error y devolver un mensaje detallado
            // Puedes personalizar el mensaje según lo que necesites
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false; // Devuelve false o una estructura que indique que ocurrió un error
        }
    }
    public function selectAll(string $sql) {
        try {
            // Preparar la consulta
            $this->sql = $sql;
            $resultado = $this->conexion->prepare($this->sql);
            
            // Ejecutar la consulta
            $resultado->execute();
            
            // Retornar los resultados como un array asociativo
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error y devolver un mensaje detallado
            // Puedes personalizar el mensaje según lo que necesites
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false; // Devuelve false o una estructura que indique que ocurrió un error
        }
    }
}
?>