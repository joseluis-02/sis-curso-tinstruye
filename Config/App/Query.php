<?php
class Query {
    private $pdo, $conexion, $sql;
    public function __construct() {
        $this->pdo = new Conexion();
        $this->conexion = $this->pdo->conect();
    }

    public function select(string $sql) {
        $this->sql = $sql;
        $resultado = $this->conexion->prepare($this->sql);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>