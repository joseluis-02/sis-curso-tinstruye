<?php include_once './Views/Auth/template/header.php'; ?>
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
                            <form class="user" id="frmLogin">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="nick" name="nick" aria-describedby="emailHelp"
                                        placeholder="Nombre usuario">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="clave" name="clave" placeholder="Clave de acceso">
                                </div>
                                <div id="divError" class="alert alert-warning d-none" role="alert">
                                </div>
                                <button type="submit" onclick="frmLogin(event)" class="btn btn-primary btn-user btn-block">
                                    Ingresar al sistema
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Recuperar clave?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url?>/Auth/registro">Crear una cuenta!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
$scripts = [
    base_url.'/Assets/js/usuarios/login.js',
];
include_once './Views/Auth/template/footer.php'; 
?>
