<?php
class ClientesModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function listar(){
        $sql = "SELECT c.id_cliente, c.documentoid, c.complementoid, c.razon_social, c.cliente_email, c.cliente_estado, td.abreviado as tipo_documento FROM clientes as c INNER JOIN tipo_documentos as td on c.id_tipo_documento=td.id_tipo_documento";
        $query = $this->selectAll($sql);
        return $query;
    }
    public function seleccionarTipoDocumentos(){
        $sql = "SELECT `id_tipo_documento`, `abreviado`, `nombre`, `estado` FROM `tipo_documentos` WHERE estado=1";
        $query = $this->selectAll($sql);
        //echo $query;
        return $query;
    }
    public function crearCliente($docomento,$complemento, $razon_social, $tipo,$email) {
        $sql = "INSERT INTO `clientes`( `documentoid`, `complementoid`, `razon_social`, `id_tipo_documento`, `cliente_email`) VALUES (?,?,?,?,?)";
        $query = $this->insert($sql,[$docomento,$complemento, $razon_social, $tipo,$email]);
        return $query;
    }
    public function actualizarCliente($id, $docomento,$complemento, $razon_social, $tipo,$email) {
        $sql = "UPDATE `clientes` SET `documentoid`=?,`complementoid`=?,`razon_social`=?,`id_tipo_documento`=?,`cliente_email`=? WHERE `id_cliente`=?";
        $query = $this->update($sql,[$docomento,$complemento, $razon_social, $tipo,$email,$id]);
        return $query;
    }
    public function obtenerCliente(int $id){
        $sql = "SELECT * FROM `clientes` WHERE id_cliente=$id";
        $query = $this->select($sql);
        return $query;
    }
    public function cambiarEstadoCliente(int $id, int $estado) {
        $sql = "UPDATE `clientes` SET `cliente_estado`= ? WHERE id_cliente= ?";
        $query = $this->update($sql,[$estado,$id]);
        return $query;
    }
}
?>