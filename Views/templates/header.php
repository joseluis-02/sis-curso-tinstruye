<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empresa - seccion</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url; ?>/Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?php echo base_url; ?>/Assets/css/googlefontsapi.css"
        rel="stylesheet"
        type="text/css"
        >

    <!-- AB-Admin-2-->
    <link href="<?php echo base_url; ?>/Assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <!-- Datatables bootstrap -->
    <link href="<?php echo base_url; ?>/Assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
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

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url;?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Empresa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url;?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Escritorio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Módulos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseAlmacen"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-warehouse"></i>
                    <span>Almacen</span>
                </a>
                <div id="collapseAlmacen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Funcionalidades</h6>
                        <a class="collapse-item" href="<?=base_url;?>/Categorias">Categorias</a>
                        <a class="collapse-item" href="<?=base_url;?>/Medidas">Medidas</a>
                        <a class="collapse-item" href="<?=base_url;?>/Productos">Productos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseSeguridad"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-lock"></i>
                    <span>Seguridad</span>
                </a>
                <div id="collapseSeguridad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Funcionalidades</h6>
                        <a class="collapse-item" href="<?=base_url;?>/Usuarios">Usuarios</a>
                        <a class="collapse-item" href="<?=base_url;?>/Cajas">Cajas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseVentas"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Ventas</span>
                </a>
                <div id="collapseVentas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Funcionalidades</h6>
                        <a class="collapse-item" href="<?=base_url;?>/Clientes">Clientes</a>
                        <a class="collapse-item" href="<?=base_url;?>/TipoDocumentos">Tipos documento</a>
                        <a class="collapse-item" href="<?=base_url;?>/Facturas">Facturas</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                    if (isset($_SESSION['nombre'])) {
                                        echo htmlspecialchars($_SESSION['nombre']);
                                    } else {
                                        echo "No autenticado";
                                    }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?=base_url;?>/Assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir del sistema
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
