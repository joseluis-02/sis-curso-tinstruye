</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>www.empresa.com &copy; <?php echo date('Y') ?></span>
    </div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cerrar sesión?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">Estás seguro(a) de cerrar el sistema</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="<?=base_url?>/Auth/salir">Logout</a>
</div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url; ?>/Assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url; ?>/Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Sb admin2-->
<script src="<?php echo base_url; ?>/Assets/js/sb-admin-2.min.js"></script>



<!-- Page level plugins Datatables -->
<script src="<?php echo base_url; ?>/Assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url; ?>/Assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Sweetalert 2-->
<script src="<?php echo base_url; ?>/Assets/js/sweetalert2.all.min.js"></script>


<script>
const base_url = "<?php echo base_url; ?>";
</script>
<!-- Espacio dinámico para js -->
<?php
if (!empty($scripts)) {
    foreach ($scripts as $script) {
        echo '<script src="' . $script . '"></script>' . PHP_EOL;
    }
}?>

</body>

</html>