<?php
class UsuariosModel extends Query {
    public function __construct() {
        parent::__construct();
    }
    public function getUsuarios() {
        $sql = "SELECT u.id_usuario, u.nick, u.nombre, u.usuario_estado, c.caja FROM `usuarios` as u INNER JOIN cajas as c on u.id_caja=c.id_caja";
        $query = $this->selectAll($sql);
        return $query;
    }
    public function getUsuario($nick, $clave){
        $sql = "SELECT * FROM usuarios WHERE nick = :nick AND clave = :clave AND usuario_activo = 1";
        $query = $this->select($sql);
        $query->execute(['nick' => $nick, 'clave' => $clave]);
        return $query->fetch();
    }
}
?>