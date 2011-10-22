<?php

include 'conexion.php';
include 'tablas.php';

class threads implements tablas {

    private $_idthreadauto, $_idthread, $_titulo, $_mensaje, $_idusuario, $_votos, $_visitas, $_fechaalta, $_fechamodif, $_idusuariomodif, $_status;

    public function get_idthreadauto() {
        return $this->_idthreadauto;
    }

    public function get_idthread() {
        return $this->_idthread;
    }

    public function get_titulo() {
        return $this->_titulo;
    }

    public function get_contenido() {
        return $this->_mensaje;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function get_votos() {
        return $this->_votos;
    }

    public function get_visitas() {
        return $this->_visitas;
    }

    public function get_fechaalta() {
        return $this->_fechaalta;
    }

    public function get_fechamodificacion() {
        return $this->_fechamodif;
    }

    public function get_idusuariomodificacion() {
        return $this->_idusuariomodif;
    }

    public function get_status() {
        return $this->_status;
    }

    public function set_idthreadauto($_idthreadauto) {
        $this->_idthreadauto = $_idthreadauto;
    }

    public function set_idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function set_titulo($_titulo) {
        $this->_titulo = $_titulo;
    }

    public function set_contenido($_mensaje) {
        $this->_mensaje = $_mensaje;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function set_votos($_votos) {
        $this->_votos = $_votos;
    }

    public function set_visitas($_visitas) {
        $this->_visitas = $_visitas;
    }

    public function set_fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function set_fechamodificacion($_fechamodificacion) {
        $this->_fechamodif = $_fechamodificacion;
    }

    public function set_idusuariomodificacion($_idusuariomodificacion) {
        $this->_idusuariomodif = $_idusuariomodificacion;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

    function __construct() {
        $this->_idthreadauto = -1;
        $this->_idthread = -1;

        $this->_titulo = '';
        $this->_mensaje = '';
        $this->_idusuario = -1;
        $this->_votos = -1;
        $this->_visitas = -1;
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_idusuariomodif = -1;
        $this->_status = 1;
    }

    static public function Select($post) {
        $conexion = new conexion;
        $consulta = 'Call usuarios_SELECT()';
        return mysql_query($consulta);
    }

    static public function Insert($usuario) {
        $conexion = new conexion;
        $consulta = 'Call usuarios_INSERT()';
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
