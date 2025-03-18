</div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url;?>/Assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url;?>/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url;?>/Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url;?>/Assets/js/sb-admin-2.min.js"></script>
    <!-- Sweetalert 2-->
    <script src="<?php echo base_url; ?>/Assets/js/sweetalert2.all.min.js"></script>

    <script>
        const base_url = '<?php echo base_url; ?>';
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