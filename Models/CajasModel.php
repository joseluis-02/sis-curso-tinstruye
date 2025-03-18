<?php
class CajasModel extends Query {
    public function __construct() {
        parent::__construct();
    }
    public function listar() {
        $sql = "SELECT id_caja, caja, caja_estado FROM `cajas`";
        $query = $this->selectAll($sql);
        return $query;
    }
}
?>