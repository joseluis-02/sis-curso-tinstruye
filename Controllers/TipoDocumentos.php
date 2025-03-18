<?php
class TipoDocumentos extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->views->getView($this,'index');
    }
    public function listar() {
        $data = $this->model->listar();
        foreach($data as &$obj){
            
            // Generar el atributo "acciones" con botones para editar y eliminar
            $obj['acciones'] = "<button class='btn btn-sm' data-id='" . $obj['id_tipo_documento'] . "'><i class='far fa-edit'></i></button> ";
            $obj['acciones'] .= "<button class='btn btn-sm' data-id='" . $obj['id_tipo_documento'] . "'>".($obj['estado']?"<i class='fas fa-minus-circle'></i>": "<i class='fas fa-check-circle'></i>")."</button>";
            // Colocamos el estado en literal
            $obj['estado'] = ($obj['estado'] == 0) ? '<span class="badge badge-danger">Inactivo</span>': '<span class="badge badge-success">Activo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
}
?>