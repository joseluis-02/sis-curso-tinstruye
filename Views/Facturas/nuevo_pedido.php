<?php
$styles = [
    base_url.'/Assets//css/facturas/nuevo_pedido.css',
];
include_once './Views/templates/header.php'; 
?>

<div class="container-fluid py-4">
        <div class="card mb-4">
            <div class="card-header">
            <div class="row mb-3">
                <ul class="list-group col">
                    <li class="list-group-item">Siat: <span id="badgeComuni" class="badge badge-danger">DESCONECTADO</span></li>
                    <li class="list-group-item">Cuis: <span id="cuis" class="badge badge-info">NO HAY</span></li>
                    <li class="list-group-item">Cufd: <span id="cufd" class="badge badge-info">NO HAY</span></li>
                </ul>
            </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- Invoice Number -->
                    <div class="col-md-3 mb-3">
                        <label for="invoiceNumber">Nro. Factura</label>
                        <input type="text" class="form-control" id="invoiceNumber" value="1">
                    </div>
                    
                    <!-- Economic Activity -->
                    <div class="col-md-3 mb-3">
                        <label for="economicActivity">Act. Económica</label>
                        <input type="text" class="form-control bg-light" id="economicActivity" value="692000">
                    </div>
                    
                    <!-- NIT/CI -->
                    <div class="col-md-3 mb-3">
                        <label for="nitci">NIT/CI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nitci">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Summary Table -->
                    <div class="col-md-3 mb-3">
                        <div class="summary-table">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <td class="summary-label">S. total</td>
                                    <td class="summary-value">0,00</td>
                                </tr>
                                <tr>
                                    <td class="summary-label">Desc. Add.</td>
                                    <td ><input type="number" class="form-control" id="descuentoTotal" step="0.01" value="0.00"></td>
                                </tr>
                                <tr>
                                    <td class="summary-label">Total</td>
                                    <td class="summary-value">0,00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- Business Name -->
                    <div class="col-md-6 mb-3">
                        <label for="businessName">Razón social</label>
                        <input type="text" class="form-control bg-light" id="businessName">
                    </div>
                    
                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control bg-light" id="email">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Products Section -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Agregar productos</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <!-- Product Code -->
                    <div class="col-md-2">
                        <label for="productCode">Cod. Producto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="productCode">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Name -->
                    <div class="col-md-4">
                        <label for="productName">Producto</label>
                        <input type="text" class="form-control" id="productName">
                    </div>
                    
                    <!-- Price -->
                    <div class="col-md-1">
                        <label for="price">Precio</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                    
                    <!-- Quantity -->
                    <div class="col-md-1">
                        <label for="quantity">Cantidad</label>
                        <input type="text" class="form-control" id="quantity">
                    </div>
                    
                    <!-- Discount -->
                    <div class="col-md-1">
                        <label for="discount">Desc.</label>
                        <input type="text" class="form-control" id="discount">
                    </div>
                    
                    <!-- Subtotal -->
                    <div class="col-md-2">
                        <label for="subtotal">S. total</label>
                        <input type="text" class="form-control" id="subtotal">
                    </div>
                    
                    <!-- Add Button -->
                    <div class="col-md-1">
                        <label>&nbsp;</label>
                        <button class="btn btn-info btn-circle">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Descuento</th>
                                <th>S. Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="productos">
                            
                        </tbody>
                    </table>
                </div>
                <button onclick="saveInvoice()" class="btn btn-primary">Validar Factura</button>
            </div>
        </div>
    </div>
<?php
$scripts = [
    base_url.'/Assets/js/facturas/pedido.js',
];
include_once './Views/templates/footer.php'; 
?>