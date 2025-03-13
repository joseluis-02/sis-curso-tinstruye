<?php include_once './Views/templates/header.php'; ?>
<!-- Page Heading -->
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbUsuarios" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Caja</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Caja</th>
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
    base_url.'/Assets/js/usuarios/index.js',
];
include_once './Views/templates/footer.php'; 
?>