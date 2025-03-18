<?php
//require_once '../Config/Helpers.php';
class Usuarios extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data = $this->model->seleccionarCajas();
        return $this->views->getView($this,'index', $data);
    }
    public function listar(){
        $data = $this->model->getUsuarios();
        foreach($data as &$u){
            // Generar el atributo "acciones" con botones para editar y eliminar
            $u['acciones'] = "<button class='btn btn-sm' onclick='obtener(" . $u['id_usuario'] . ")'><i class='far fa-edit'></i></button> ";
            
             // Agregar otro parámetro (ejemplo: 'otro_estado')
            $u['acciones'] .= "<button class='btn btn-sm' onclick='activarOinactivar(" . $u['id_usuario'] . ", " . $u['usuario_estado'] . ")'>";
            $u['acciones'] .= ($u['usuario_estado'] ? "<i class='fas fa-minus-circle'></i>" : "<i class='fas fa-check-circle'></i>");
            $u['acciones'] .= "</button>";
            // Colocamos el estado en literal
            $u['usuario_estado'] = ($u['usuario_estado'] == 0) ? '<span class="badge badge-danger">Inactivo</span>': '<span class="badge badge-success">Activo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function obtener(int $id){
        try{
            $data = $this->model->obtenerUsuario($id);
            if($data){
                echo json_encode(['success' => true, 'message' => 'Se obtuvo los datos', 'data'=>$data]);
            } else{ 
                echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar obtener datos']);
            }
        }catch(Exception $e){
            echo json_encode(['success' => false, 'message' => 'Error inesperado: '.$e]);
        }
    }
    public function crear_o_actualizar(){
        try{
            $id_usuario = trim( $_POST['id_usuario']);
            $nombre = trim( $_POST['nombre'] ); 
            $nick =trim( $_POST['nick'] );
            $clave =trim( $_POST['clave'] );
            $clave2 =trim( $_POST['clave2'] );
            $id_caja =trim( $_POST['id_caja'] );
            if($id_usuario==0){
                if (empty($nombre)||empty($nick)||empty($clave)||empty($clave2)||empty($id_caja)){
                    echo json_encode(['success' => false, 'message' => 'Los campos nombre, nick, clave y id_caja son obligatorios']);
                } elseif(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $clave)){
                    echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 8 caracteres y ser alfanumérica']);
                } elseif($clave!=$clave2){
                    echo json_encode(['success' => false, 'message' => 'Las claves no coinciden']);
                } else{
                    $password_cifrado = cifrarPassword($clave);
                    $data = $this->model->crearUsuario($nick,$nombre,$password_cifrado,$id_caja);
                    if($data){
                        echo json_encode(['success' => true, 'message' => 'Proceso creado exitosamente']);
                    } else{ 
                        echo json_encode(['success' => false, 'message' => 'Ocurrió un error al intentar crear datos']);
                    }
                }
            }else{
                $data = $this->model->actualizarUsuario($id_usuario,$nombre,$nick,$id_caja);
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
                $data = $this->model->cambiarEstadoUsuario($id, $nuevo_estado);
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