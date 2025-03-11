<?php
class Home extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($parametros){
        $data['usuarios']=$this->model->getUsuarios();
        $this->views->getView($this,"index",$data);
    }
}
?>