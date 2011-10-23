<?php

include_once 'conexion.php';
include_once 'tablas.php';

class threads implements tablas {

    private $_idthreadauto, $_idthread, $_titulo, $_mensaje, $_idusuario, $_fechaalta, $_fechamodif, $_idusuariomodif, $_visitas, $_votos, $_status;

    public function get_idthreadauto() {
        return $this->_idthreadauto;
    }

    public function set_idthreadauto($_idthreadauto) {
        $this->_idthreadauto = $_idthreadauto;
    }

    public function get_idthread() {
        return $this->_idthread;
    }

    public function set_idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function get_titulo() {
        return $this->_titulo;
    }

    public function set_titulo($_titulo) {
        $this->_titulo = $_titulo;
    }

    public function get_mensaje() {
        return $this->_mensaje;
    }

    public function set_mensaje($_mensaje) {
        $this->_mensaje = $_mensaje;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function get_fechaalta() {
        return $this->_fechaalta;
    }

    public function set_fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function get_fechamodif() {
        return $this->_fechamodif;
    }

    public function set_fechamodif($_fechamodif) {
        $this->_fechamodif = $_fechamodif;
    }

    public function get_idusuariomodif() {
        return $this->_idusuariomodif;
    }

    public function set_idusuariomodif($_idusuariomodif) {
        $this->_idusuariomodif = $_idusuariomodif;
    }

    public function get_visitas() {
        return $this->_visitas;
    }

    public function set_visitas($_visitas) {
        $this->_visitas = $_visitas;
    }

    public function get_votos() {
        return $this->_votos;
    }

    public function set_votos($_votos) {
        $this->_votos = $_votos;
    }

    public function get_status() {
        return $this->_status;
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
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_idusuariomodif = -1;
        $this->_visitas = -1;
        $this->_votos = -1;
        $this->_status = 1;
    }

    static public function Select($thread) {

        $conexion = new conexion();
        $consulta = "Call threads_SELECT('" . $thread->get_idthreadauto() . "','" . $thread->get_idthread()
                . "','" . $thread->get_titulo() . "','" . $thread->get_mensaje() . "','" . $thread->get_idusuario()
                . "'," . $thread->get_fechaalta() . "," . $thread->get_fechamodificacion() . ",'" . $thread->get_usuariomodif()
                . "','" . $thread->get_visitas() . "','" . $thread->get_votos() . "'," . $thread->get_status() . ")";
        return mysql_query($consulta);
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Insert($thread) {
        $conexion = new conexion();
        $thread = new threads();
        $consulta = "Call threads_INSERT('" . $thread->get_titulo() . "','" . $thread->get_mensaje() . "','" . $thread->get_idusuario() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Update($thread) {
        $conexion = new conexion();
        $consulta = "Call threads_UPDATE('" . $usuario->get_idthread() . "','" . $thread->get_titulo() . "','" . $thread->get_mensaje() . "','" . $thread->get_idusuario() . "'," . $thread->get_fechaalta() . ",'" . $thread->get_usuariomodif() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Delete($thread) {
        $conexion = new conexion();
        $consulta = "Call threads_DELETE('" . $usuario->get_idthread() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

}

;
?>
