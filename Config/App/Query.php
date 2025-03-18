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
            return $resultado->fetch(PDO::FETCH_OBJ);
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
    public function insert(string $sql, array $params) {
        try {
            $this->sql = $sql;
            $stmt = $this->conexion->prepare($this->sql);
            
            // Ejecutar la consulta con los parámetros
            $stmt->execute($params);
            
            // Retornar el ID del último registro insertado
            return $this->conexion->lastInsertId();
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
            return false;
        }
    }
    
    public function update(string $sql, array $params) {
        try {
            $this->sql = $sql;
            $stmt = $this->conexion->prepare($this->sql);
            
            // Ejecutar la consulta con los parámetros
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
            return false;
        }
    }
    
    public function delete(string $sql, array $params) {
        try {
            $this->sql = $sql;
            $stmt = $this->conexion->prepare($this->sql);
            
            // Ejecutar la consulta con los parámetros
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
            return false;
        }
    }
}
?>