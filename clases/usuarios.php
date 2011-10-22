<?php

class usuarios implements tablas {

    private $_idusuarioauto, $_idusuario, $_nombre, $_pass, $_mail, $_fechaalta, $_fechamodificacion, $_status;

    public function idusuarioauto() {
        return $this->_idusuarioauto;
    }

    public function idusuarioauto($_idusuarioauto) {
        $this->_idusuarioauto = $_idusuarioauto;
    }

    public function idusuario() {
        return $this->_idusuario;
    }

    public function idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function nombre() {
        return $this->_nombre;
    }

    public function nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function pass() {
        return $this->_pass;
    }

    public function pass($_pass) {
        $this->_pass = $_pass;
    }

    public function mail() {
        return $this->_mail;
    }

    public function mail($_mail) {
        $this->_mail = $_mail;
    }

    public function fechaalta() {
        return $this->_fechaalta;
    }

    public function fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function fechamodificacion() {
        return $this->_fechamodificacion;
    }

    public function fechamodificacion($_fechamodificacion) {
        $this->_fechamodificacion = $_fechamodificacion;
    }

    public function status() {
        return $this->_status;
    }

    public function status($_status) {
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
