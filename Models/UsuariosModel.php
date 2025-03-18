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
    public function getUsuario($nick){
        $sql = "SELECT id_usuario as id,clave , nick, nombre, usuario_estado as estado FROM `usuarios` WHERE nick='".$nick."'";
        $query = $this->select($sql);
        //echo $query;
        return $query;
    }
    public function obtenerUsuario(int $id){
        $sql = "SELECT * FROM `usuarios` WHERE id_usuario=$id";
        $query = $this->select($sql);
        return $query;
    }
    public function seleccionarCajas(){
        $sql = "SELECT id_caja, caja FROM `cajas` WHERE caja_estado=1";
        $query = $this->selectAll($sql);
        //echo $query;
        return $query;
    }
    public function crearUsuario($nick, $nombre, $clave, $id_caja) {
        $sql = "INSERT INTO `usuarios`(`nick`, `nombre`, `clave`, `id_caja`) VALUES (?,?,?,?)";
        $query = $this->insert($sql,[$nick, $nombre,$clave,$id_caja]);
        return $query;
    }
    public function actualizarUsuario(int $id, string $nombre, string $nick, int $id_caja) {
        $sql = "UPDATE `usuarios` SET `nick`=?,`nombre`=?,`id_caja`=? WHERE `id_usuario`=?";
        $query = $this->update($sql,[$nick,$nombre,$id_caja,$id]);
        return $query;
    }
    public function cambiarEstadoUsuario(int $id, int $estado) {
        $sql = "UPDATE `usuarios` SET `usuario_estado`= ? WHERE id_usuario= ?";
        $query = $this->update($sql,[$estado,$id]);
        return $query;
    }
}
?>