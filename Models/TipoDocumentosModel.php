<?php
class TipoDocumentosModel extends Query{
    public function __construct(){
        parent::__construct();
    }
    public function listar() {
        $sql = "SELECT id_tipo_documento, abreviado, nombre, estado FROM tipo_documentos";
        $query = $this->selectAll($sql);
        return $query;
    }
    
}
?>