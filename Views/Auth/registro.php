<?php include_once './Views/Auth/template/header.php'; ?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <picture>
                            <source srcset="<?=base_url;?>/Assets/img/logo.png" type="image/svg+xml">
                            <img src="<?=base_url;?>/Assets/img/logo.png" class="img-fluid img-thumbnail" alt="...">
                        </picture>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                            </div>
                            <form class="user" id="frmRegistro">
                                <div class="form-group">
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="0" >
                                    <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                        placeholder="Nombre completo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nick" name="nick"
                                        placeholder="Escribe nick">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="clave" name="clave" placeholder="Clave">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="clave2" name="clave2" placeholder="Repita clave">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Crear cuenta
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Recuperar clave?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url?>/Auth/login">Ya tienes una cuenta? Entra!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
$scripts = [
];
include_once './Views/Auth/template/footer.php'; 
?>
