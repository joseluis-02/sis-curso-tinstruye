<?php
class Usuarios extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        return $this->views->getView($this,'index');
    }
    public function listar(){
        $data = $this->model->getUsuarios();
        foreach($data as &$u){
            
            // Generar el atributo "acciones" con botones para editar y eliminar
            $u['acciones'] = "<button class='btn btn-sm btn-primary editar-btn' data-id='" . $u['id_usuario'] . "'><i class='far fa-edit'></i></button> ";
            $u['acciones'] .= "<button class='btn btn-sm btn-danger eliminar-btn' data-id='" . $u['id_usuario'] . "'>".($u['usuario_estado']? "<i class='fas fa-check-circle'></i>":"<i class='fas fa-minus-circle'></i>")."</button>";
            // Colocamos el estado en literal
            $u['usuario_estado'] = ($u['usuario_estado'] == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function validar(){
        if(empty($_POST['nick']) || empty($_POST['clave'])){
            $sms =  "Los usuarios y la clave son obligatorios";
            return;
        }else{
            $nick = $_POST['nick'];
            $clave = $_POST['clave'];
            $datos = $this->model->getUsuario($nick, $clave);
            if($datos){
                $sms = "Bienvenido";
            }else{
                $sms = "Usuario o clave incorrectos";
            }
        }
        return $sms;
    }
}
?>