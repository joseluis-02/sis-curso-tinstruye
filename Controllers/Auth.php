<?php
//require_once base_url.'/Config/Helpers.php';
//require_once '../Config/App/SessionHelper.php';
//require_once '../Models/UsuariosModel.php';

class Auth extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function login() {
        SessionHelper::isLoggedIn()
        ? header("Location: " . base_url . "/")
        : $this->views->getView($this,'login');
        
    }
    public function registro() {
        $this->views->getView($this,'registro');
    }

    public function validar() {
        SessionHelper::start();
       
        $nick = trim($_POST['nick'] ?? '');
        $clave = trim($_POST['clave'] ?? '');
        
        if (empty($nick) || empty($clave)) {
            echo json_encode(['success' => false, 'message' => 'Envie su nick y clave, son obligatorios.']);
            exit();
        }
        
        $userModel = new UsuariosModel();
        $user = $userModel->getUsuario($nick);

        if ($user && verificarPassword($clave,$user->clave)) {
            SessionHelper::set('id', $user->id);
            SessionHelper::set('nick', $user->nick);
            SessionHelper::set('nombre', $user->nombre);
            if($user && $user->estado==0){
                echo json_encode(['success' => false, 'message' => 'El usuario se encuentra Inactivo']);
                exit();
            }else{
                // Respuesta exitosa
                echo json_encode(['success' => true, 'message' => 'Ingresando al sistema']);
            }
        }else {
            // Respuesta de error si las credenciales son incorrectas
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
        }
    }
    private function password_verify() {
        
    }

    public function salir() {
        SessionHelper::start();
        SessionHelper::destroy();
        header("Location: " . base_url . "/Auth/login");
        exit();
    }
}
?>
