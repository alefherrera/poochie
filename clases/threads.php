<?php

include_once 'conexion.php';
include_once 'tablas.php';

class threads implements tablas {

    private $_idthreadauto, $_idthread, $_titulo, $_contenido, $_idusuario, $_fechaalta, $_fechamodif, $_idusuariomodif, $_visitas, $_votosp, $_votosn, $_status, $_nombre;

// <editor-fold defaultstate="collapsed" desc="Gets y Sets">


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

    public function get_contenido() {
        return $this->_contenido;
    }

    public function set_contenido($_contenido) {
        $this->_contenido = $_contenido;
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

    public function get_votosp() {
        return $this->_votosp;
    }

    public function set_votosp($_votosp) {
        $this->_votosp = $_votosp;
    }

    public function get_votosn() {
        return $this->_votosn;
    }

    public function set_votosn($_votosn) {
        $this->_votosn = $_votosn;
    }

    public function get_status() {
        return $this->_status;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }
    
        public function get_nombre() {
        return $this->_nombre;
    }
    
        public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }
    

    // </editor-fold>

    function __construct() {
        $this->_idthreadauto = -1;
        $this->_idthread = -1;
        $this->_titulo = '';
        $this->_contenido = '';
        $this->_idusuario = -1;
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_idusuariomodif = -1;
        $this->_visitas = -1;
        $this->_votosp = -1;
        $this->_votosn = -1;
        $this->_status = 1;
    }

// <editor-fold defaultstate="collapsed" desc="Select, Insert, Update, Delete, Load">
    static public function Select($thread) {

        $conexion = new conexion();
        $consulta = "Call threads_SELECT('" . $thread->get_idthreadauto() . "','" . $thread->get_idthread()
                . "','" . $thread->get_titulo() . "','" . $thread->get_contenido() . "','" . $thread->get_idusuario()
                . "'," . $thread->get_fechaalta() . "," . $thread->get_fechamodif() . ",'" . $thread->get_idusuariomodif()
                . "','" . $thread->get_visitas() . "','" . $thread->get_votosp() . "','" . $thread->get_votosn() . "'," . $thread->get_status() . ")";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Insert($thread) {
        $conexion = new conexion();
        $consulta = "Call threads_INSERT('" . $thread->get_titulo() . "','" . $thread->get_contenido() . "','" . $thread->get_idusuario() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Update($thread) {
        $conexion = new conexion();
        $consulta = "Call threads_UPDATE('" . $thead->get_idthread() . "','" . $thread->get_titulo()
                . "','" . $thread->get_contenido() . "','" . $thread->get_idusuario() . "'," . $thread->get_fechaalta()
                . ",'" . $thread->get_usuariomodificacion() . "','" . $thread->get_visitas() . "','" . $thread->get_votosp() . "','" . $thread->get_votosn() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Delete($thread) {
        $conexion = new conexion();
        $consulta = "Call threads_DELETE('" . $thread->get_idthread() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Updatevotos($thread, $voto) {
        $conexion = new conexion();
        $consulta = "Call threads_UPDATEVOTOS('" . $thread->get_idthread() . "','" . $voto . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Load($thread) {
        $result = threads::Select($thread);

        if ($result == false) {
            return false;
        }
        $row = mysql_fetch_array($result);

        $thread->set_idthreadauto($row["idThreadAuto"]);
        $thread->set_idthread($row["idThread"]);
        $thread->set_titulo($row["Titulo"]);
        $thread->set_contenido($row["Contenido"]);
        $thread->set_idusuario($row["idUsuario"]);
        $thread->set_fechaalta($row["FechaAlta"]);
        $thread->set_fechamodif($row["FechaModificacion"]);
        $thread->set_idusuariomodif($row["idUsuarioModificacion"]);
        $thread->set_visitas($row["Visitas"]);
        $thread->set_votosp($row["Votosp"]);
        $thread->set_votosn($row["Votosn"]);
        $thread->set_status($row["Status"]);
        $thread->set_nombre($row["Nombre"]);

        return $thread;
    }

    // </editor-fold>
}

;
?>
