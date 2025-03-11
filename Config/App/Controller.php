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
        $dirModel = 'Models/'.$model.'.php';
        if(file_exists($dirModel)){
            require_once($dirModel);
            $this->model = new $model();
        }else{
            echo 'Modelo no encontrado';
        }
    }
}
?>