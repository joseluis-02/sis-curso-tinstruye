<?php include_once './Views/templates/header.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form id="frmCliente">
        <div class="modal-header">
            <h5 class="modal-title" id="modalClienteLongTitle">Formulario de cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        
            <div class="form-group">
                <label for="inputRazonSocial">Razón social</label>
                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="0" >
                <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Razón social">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="cliente_email" name="cliente_email" placeholder="Email del cliente">
            </div>
            <div class="form-group">
                <label for="inputCajas">Cajas</label>
                <select id="id_tipo_documento" name="id_tipo_documento" class="form-control">
                <?php foreach ($data as $c) { ?>
                    <option value="<?= htmlspecialchars($c['id_tipo_documento']) ?>">
                        <?= htmlspecialchars($c['abreviado'] ?? 'Sin nombre') ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div id="filaClaves" class="form-row">
                <div class="form-group col-md-6">
                <label for="inputDocumentoId">Código documento</label>
                <input type="text" class="form-control" id="documentoid" name="documentoid" placeholder="Escriba código documento">
                </div>
                <div class="form-group col-md-6">
                <label for="inputComplementoId">Código complemento</label>
                <input type="text" class="form-control" id="complementoid" name="complementoid" placeholder="Escriba código complemento">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-window-close"></i>
                </span>
                <span class="text">Abortar</span>
            </button>

            <button type="submit" onclick="guardarOeditar(event)" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                <i class="far fa-save"></i>
                </span>
                <span id="btnText" class="text">Guardar</span>
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>
        <div class="d-flex flex-row-reverse">
            <button onclick="openModal()" class="btn btn-primary btn-icon-split">
                <span class="icon text-gray-600">
                <i class="fas fa-plus-circle" style="color: #fafafa;"></i>
                </span>
                <span class="text">Crear nuevo</span>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbClientes" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Razón social</th>
                        <th>Tipo documento</th>
                        <th>Documento</th>
                        <th>Complemento</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Razón social</th>
                        <th>Tipo documento</th>
                        <th>Documento</th>
                        <th>Complemento</th>
                        <th>Email</th>
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
    base_url.'/Assets/js/clientes/index.js',
    base_url.'/Assets/js/clientes/crear_o_actualizar.js',
    base_url.'/Assets/js/clientes/activar_o_inactivar.js',
];
include_once './Views/templates/footer.php'; 
?>