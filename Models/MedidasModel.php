<?php
class MedidasModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function listar() {
        $sql = "SELECT id_medida, descripcion_medida, descripcion_corta, medida_estado FROM medidas";
        $query = $this->selectAll($sql);
        return $query;
    }
}
?>