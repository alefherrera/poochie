<?php
include 'conexion.php';
include 'tablas.php';
class usuarios implements tablas {

    private $_idusuarioauto, $_idusuario, $_nombre, $_pass, $_mail, $_fechaalta, $_fechamodificacion, $_status;
    public function get_idusuarioauto() {
        return $this->_idusuarioauto;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_pass() {
        return $this->_pass;
    }

    public function get_mail() {
        return $this->_mail;
    }

    public function get_fechaalta() {
        return $this->_fechaalta;
    }

    public function get_fechamodificacion() {
        return $this->_fechamodificacion;
    }

    public function get_status() {
        return $this->_status;
    }

    public function set_idusuarioauto($_idusuarioauto) {
        $this->_idusuarioauto = $_idusuarioauto;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_pass($_pass) {
        $this->_pass = $_pass;
    }

    public function set_mail($_mail) {
        $this->_mail = $_mail;
    }

    public function set_fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function set_fechamodificacion($_fechamodificacion) {
        $this->_fechamodificacion = $_fechamodificacion;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

        public function Select($usuario) {
        $conexion = new conexion;
        $consulta = "Call usuarios_select($usuario->idusuarioauto, $usuario->idusuario, $usuario->nombre, $usuario->pass, $usuario->mail, $usuario->fechaalta, $usuario->fechamodificacion, $usuario->status)";
        mysql_query($consulta);
    }

    public function Insert($usuario) {
        $conexion = new conexion;
        $consulta = "Call usuarios_insert('/$usuario->nombre/','/$usuario->pass/','/$usuario->mail/')";
        mysql_query($consulta);
    }

    public function Update($usuario) {
        $conexion = new conexion;
    }

    public function Delete($usuario) {
        $conexion = new conexion;
    }

}

;
?>
