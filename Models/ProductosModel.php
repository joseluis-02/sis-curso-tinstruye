<?php
class ProductosModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function listar() {
        $sql = "SELECT pr.id_producto, pr.codigo, pr.nombre_producto, pr.costo_compra, pr.precio_venta, pr.cantidad, pr.producto_estado, ca.nombre_categoria as categoria, m.descripcion_corta as medida FROM productos as pr INNER JOIN categorias as ca on pr.id_categoria=ca.id_categoria INNER JOIN medidas as m on pr.id_medida=m.id_medida";
        $query = $this->selectAll($sql);
        return $query;
    }
    public function buscarProducto(string $code){
        $sql = "SELECT * FROM `productos` WHERE codigo='".$code."'";
        $query = $this->select($sql);
        return $query;
    }
}
?>