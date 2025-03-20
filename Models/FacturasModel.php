<?php
class FacturasModel extends Query{
   public function __construct() {
    parent::__construct();
   }
   public function listar() {
    $sql = "SELECT f.id_factura, f.numeroFactura, f.cuf, f.fechaEmision, f.codigoMetodoPago, f.montoTotal, f.montoTotalSujetoIva, f.descuentoAdicional, f.productos, f.factura_estado, c.razon_social FROM `facturas` as f, clientes as c WHERE f.id_cliente=c.id_cliente";
    $query = $this->selectAll($sql);
    return $query;
   }
   public function buscarCliente(string $doc) {
      $sql = "select * from clientes where documentoid='".$doc."'";
      $query = $this->select($sql);
      return $query;
   }
}
?>