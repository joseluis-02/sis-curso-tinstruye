<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empresa - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url;?>/Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?=base_url;?>/Assets/css/googlefontapi.css"
        rel="stylesheet"
        type="text/css"
    >

    <!-- Custom styles for this template-->
    <link href="<?=base_url;?>/Assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Datatables sweetalert2 -->
    <link href="<?php echo base_url; ?>/Assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- Espacio dinámico para estilos -->
    <?php
    if (!empty($styles)) {
        foreach ($styles as $style) {
            echo '<link rel="stylesheet" href="' . $style . '">' . PHP_EOL;
        }
    }
    ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">