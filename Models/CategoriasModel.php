<?php
class CategoriasModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function listar() {
        $sql = "SELECT id_categoria, nombre_categoria, codigoProductSin, categoria_estado FROM categorias";
        $query = $this->selectAll($sql);
        return $query;
    }
}
?>