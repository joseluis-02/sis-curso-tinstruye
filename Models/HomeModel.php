<?php
class HomeModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getUsuarios() {
        return $this->select('SELECT * FROM usuarios');
    }
}
?>