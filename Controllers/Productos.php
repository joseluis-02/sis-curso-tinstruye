<?php
class Productos extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->views->getView($this,'index');
    }
    public function listar() {
        $data = $this->model->listar();
        foreach($data as &$u){
            // Generar el atributo "acciones" con botones para editar y eliminar
            $u['acciones'] = "<button class='btn btn-sm' data-id='" . $u['id_producto'] . "'><i class='far fa-edit'></i></button> ";
            $u['acciones'] .= "<button class='btn btn-sm' data-id='" . $u['id_producto'] . "'>".($u['producto_estado']?"<i class='fas fa-minus-circle'></i>": "<i class='fas fa-check-circle'></i>")."</button>";
            // Colocamos el estado en literal
            $u['producto_estado'] = ($u['producto_estado'] == 0) ? '<span class="badge badge-danger">Inactivo</span>': '<span class="badge badge-success">Activo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
}
?>