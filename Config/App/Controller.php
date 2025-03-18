<?php
class Controller {
    public $views;
    public $model;
    public function __construct() {
        $this->views = new Views();
        $this->cargarModel();
    }
    public function cargarModel() {
        $model = get_class($this).'Model';
        //echo $model;
        if($model=="AuthModel") return;
        $dirModel = 'Models/'.$model.'.php';
        if(file_exists($dirModel)){
            require_once($dirModel);
            $this->model = new $model();
        }else{
            echo 'Modelo no encontrado';
        }
    }
    public function requireAuth() {
        //echo 'Hola';
        SessionHelper::start();
        echo !SessionHelper::get('id');
        
        if (!SessionHelper::get('id')) {
            //echo 'Hola';
            ob_start();
            header("Location: " . base_url . "/Auth/login");
            exit;
        }
    }
}
?>