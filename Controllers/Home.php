<?php
class Home extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->requireAuth();
        //require '../Views/index.php';
        return $this->views->getView($this,'index');
        //echo 'Hola';
    }
}
?>