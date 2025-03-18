<?php
class Clientes extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->requireAuth();
        $data = $this->model->seleccionarTipoDocumentos();
        $this->views->getView($this,'index',$data);
    }
    public function listar(){
        $this->requireAuth();
        $data = $this->model->listar();
        foreach($data as &$obj){
            // Generar el atributo "acciones" con botones para editar y eliminar
            $obj['acciones'] = "<button class='btn btn-sm' onclick='obtener(" . $obj['id_cliente'] . ")'><i class='far fa-edit'></i></button> ";
            
             // Agregar otro parámetro (ejemplo: 'otro_estado')
            $obj['acciones'] .= "<button class='btn btn-sm' onclick='activarOinactivar(" . $obj['id_cliente'] . ", " . $obj['cliente_estado'] . ")'>";
            $obj['acciones'] .= ($obj['cliente_estado'] ? "<i class='fas fa-minus-circle'></i>" : "<i class='fas fa-check-circle'></i>");
            $obj['acciones'] .= "</button>";
            // Colocamos el estado en literal
            $obj['cliente_estado'] = ($obj['cliente_estado'] == 0) ? '<span class="badge badge-danger">Inactivo</span>': '<span class="badge badge-success">Activo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function crear_o_actualizar(){
        try{
            $id_cliente = trim( $_POST['id_cliente']);
            $documentoid = trim( $_POST['documentoid'] ); 
            $complementoid =trim( $_POST['complementoid'] ) ?? null;
            $razon_social =trim( $_POST['razon_social'] );
            $cliente_email =trim( $_POST['cliente_email'] ) ?? null;
            $id_tipo_documento =trim( $_POST['id_tipo_documento'] );
            if($id_cliente==0){
                if (empty($documentoid) || empty($razon_social)||empty($id_tipo_documento)){
                    echo json_encode(['success' => false, 'message' => 'Los campos Tipo documento, código docuemento y razón social son obligatorios']);
                } else{
                    $data = $this->model->crearCliente($documentoid,$complementoid,$razon_social,$id_tipo_documento,$cliente_email);
                    if($data){
                        echo json_encode(['success' => true, 'message' => 'Proceso creado exitosamente']);
                    } else{ 
                        echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar crear datos']);
                    }
                }
            }else{
                $data = $this->model->actualizarCliente($id_cliente,$documentoid,$complementoid,$razon_social,$id_tipo_documento,$cliente_email);
                if($data){
                    echo json_encode(['success' => true, 'message' => 'Proceso actualizado exitosamente']);
                } else{ 
                    echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar actualizar datos']);
                }
                
            }
        }catch(Exception $e){
            echo json_encode(['success' => false, 'message' => 'Error inesperado: '.$e]);
        }
        
    }
    public function obtener(int $id){
        try{
            $data = $this->model->obtenerCliente($id);
            if($data){
                echo json_encode(['success' => true, 'message' => 'Se obtuvo los datos', 'data'=>$data]);
            } else{ 
                echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar obtener datos']);
            }
        }catch(Exception $e){
            echo json_encode(['success' => false, 'message' => 'Error inesperado: '.$e]);
        }
    }
    public function activar_o_inactivar(){
        try{
         // Obtener los parámetros desde la URL (GET)
            $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
            $estado = isset($_GET['estado']) ? (int)$_GET['estado'] : null;
            // Verificar que ambos parámetros sean válidos
            if ($id !== null && ($estado === 0 || $estado === 1)) {
                // Cambiar el estado: si es 1, lo cambiamos a 0, y si es 0, lo cambiamos a 1
                $nuevo_estado = ($estado === 1) ? 0 : 1;

                // Aquí realizarías la lógica para actualizar el estado con el nuevo valor
                $data = $this->model->cambiarEstadoCliente($id, $nuevo_estado);
                if($data){
                    echo json_encode(['success' => true, 'message' => 'Se cambió el estado exitosamente']);
                } else{ 
                    echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar cambiar estado']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Faltan parámetros o el estado no es válido']);
            }
        }catch(Exception $e){
            echo json_encode(['success' => false, 'message' => 'Error inesperado: '.$e]);
        }
    }
}
?>