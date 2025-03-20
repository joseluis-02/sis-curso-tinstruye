<?php include_once './Views/templates/header.php'; ?>
<!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Facturas</h6>
        <div class="d-flex flex-row-reverse">
            <a href="<?=base_url?>/Facturas/nuevo_pedido" class="btn btn-primary btn-icon-split">
                <span class="icon text-gray-600">
                <i class="fas fa-plus-circle" style="color: #fafafa;"></i>
                </span>
                <span class="text">Crear nuevo</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbFacturas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número factura</th>
                        <th>CUF</th>
                        <th>Cliente</th>
                        <th>Emisión</th>
                        <th>Pago</th>
                        <th>Total</th>
                        <th>IVA</th>
                        <th>Descuento</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Número factura</th>
                        <th>CUF</th>
                        <th>Cliente</th>
                        <th>Emisión</th>
                        <th>Pago</th>
                        <th>Total</th>
                        <th>IVA</th>
                        <th>Descuento</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$scripts = [
    base_url.'/Assets/js/facturas/index.js',
];
include_once './Views/templates/footer.php'; 
?>