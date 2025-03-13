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

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <picture>
                                    <source srcset="<?=base_url;?>/Assets/img/logo.png" type="image/svg+xml">
                                    <img src="<?=base_url;?>/Assets/img/logo.png" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de vuelta!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nick" aria-describedby="emailHelp"
                                                placeholder="Nombre usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="clave" placeholder="Clave de acceso">
                                        </div>
                                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Ingresar al sistema
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Recuperar clave?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Crear una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url;?>/Assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url;?>/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url;?>/Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url;?>/Assets/js/sb-admin-2.min.js"></script>

</body>

</html>