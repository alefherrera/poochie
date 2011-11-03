<?php

include_once 'tablas.php';
include_once 'conexion.php';

class posts implements tablas {

    private $_idpostauto, $_idpost, $_idthread, $_idpostpadre, $_idusuario, $_contenido, $_fechaalta, $_fechamodif, $_idusuariomodif, $_votosp, $_votosn, $_status;

// <editor-fold defaultstate="collapsed" desc="Gets y Sets">
    public function get_idpostauto() {
        return $this->_idpostauto;
    }

    public function set_idpostauto($_idpostauto) {
        $this->_idpostauto = $_idpostauto;
    }

    public function get_idpost() {
        return $this->_idpost;
    }

    public function set_idpost($_idpost) {
        $this->_idpost = $_idpost;
    }

    public function get_idthread() {
        return $this->_idthread;
    }

    public function set_idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function get_idpostpadre() {
        return $this->_idpostpadre;
    }

    public function set_idpostpadre($_idpostpadre) {
        $this->_idpostpadre = $_idpostpadre;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function get_contenido() {
        return $this->_contenido;
    }

    public function set_contenido($_contenido) {
        $this->_contenido = $_contenido;
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

    // </editor-fold>

    function __construct() {
        $this->_idpostauto = -1;
        $this->_idpost = -1;
        $this->_idthread = -1;
        $this->_idpostpadre = -1;
        $this->_idusuario = -1;
        $this->_contenido = '';
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_idusuariomodif = -1;
        $this->_votosp = -1;
        $this->_votosn = -1;
        $this->_status = 1;
    }

    // <editor-fold defaultstate="collapsed" desc="Select, Insert, Update, Delete, Load">
    static public function Select($post) {
        $conexion = new conexion();
        $consulta = "Call posts_SELECT('" . $post->get_idpostauto() . "','" . $post->get_idpost() .
                "','" . $post->get_idthread() . "','" . $post->get_idpostpadre() . "','" . $post->get_idusuario()
                . "','" . $post->get_contenido() . "'," . $post->get_fechaalta() . "," . $post->get_fechamodif()
                . ",'" . $post->get_idusuariomodif() . "','" . $post->get_votosp() . "','" . $post->get_votosn() . "'," . $post->get_status() . ")";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Insert($post) {
        $conexion = new conexion();
        $consulta = "Call posts_INSERT('" . $post->get_idthread() . "','" . $post->get_idpostpadre() . "','" . $post->get_idusuario() . "','" . $post->get_contenido() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Update($post) {
        $conexion = new conexion();
        $consulta = "Call posts_UPDATE('" . $post->get_idthread() . "','" . $post->get_idpostpadre()
                . "','" . $post->get_idusuario() . "','" . $post->get_contenido() . "'," . $post->get_fechaalta()
                . ",'" . $post->get_usuariomodificacion() . "','" . $post->get_votosp() . "','" . $post->get_votosn() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Delete($post) {
        $conexion = new conexion();
        $consulta = "Call posts_DELETE('" . $post->get_idpost() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Updatevotos($post, $voto) {
        $conexion = new conexion();
        $consulta = "Call threads_UPDATEVOTOS('" . $post->get_idpost() . "','" . $voto . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Load($post) {
        $result = threads::Select($post);

        if ($result == false) {
            return false;
        }
        $row = mysql_fetch_array($result);

        $post->set_idpostauto($row["idPostAuto"]);
        $post->set_idpost($row["idPost"]);
        $post->set_idthread($row["idThread"]);
        $post->set_idpostpadre($row["idPostPadre"]);
        $post->set_idusuario($row["idUusuario"]);
        $post->set_contenido($row["Contenido"]);
        $post->set_fechaalta($row["FechaAlta"]);
        $post->set_fechamodif($row["FechaModificacion"]);
        $post->set_idusuariomodif($row["idUsuarioModificacion"]);
        $post->set_votosp($row["Votosp"]);
        $post->set_votosn($row["Votosn"]);
        $post->set_status($row["Status"]);
        return $post;
    }

    // </editor-fold>
}

;
?>
