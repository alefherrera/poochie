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
    
    function __construct(){
        $this->_idusuarioauto = -1;
        $this->_idusuario = -1;
        
        $this->_nombre = '';
        $this->_pass = '';
        $this->_mail = '';
        
        $this->_fechaalta = 0;
        $this->_fechamodificacion = 0;
        
        $this->_status = 1;
    }
    
    
    static public function  Select($usuario) {
        $conexion = new conexion;
        $consulta = 'Call usuarios_SELECT(\'' . $usuario->get_idusuarioauto() . '\',\'' . $usuario->get_idusuario() . '\',\'' . $usuario->get_nombre() . '\',\'' . $usuario->get_pass() . '\',\'' . $usuario->get_mail() . '\',' . $usuario->get_fechaalta() . ',' . $usuario->get_fechamodificacion() .' ,' . $usuario->get_status() . ')';
        return mysql_query($consulta);
    }

    static public function Insert($usuario) {
        $conexion = new conexion;
        $consulta = 'Call usuarios_INSERT(\'' . $usuario->get_nombre() . '\',\'' . $usuario->get_pass() . '\',\'' . $usuario->get_mail() . '\')';
        return mysql_query($consulta);
    }

    static public function Update($usuario) {
        $conexion = new conexion;
    }

    static public function Delete($usuario) {
        $conexion = new conexion;
    }

}

;
?>
