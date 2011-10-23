<?php

include_once 'tablas.php';
include_once 'conexion.php';

class posts implements tablas {

    private $_idpostauto, $_idpost, $_idthread, $_idpostpadre, $_idusuario, $_mensaje, $_fechaalta, $_fechamodificacion, $_usuariomodif, $_votos, $_status;

    public function get_idpostauto() {
        return $this->_idpostauto;
    }

    public function get_idpost() {
        return $this->_idpost;
    }

    public function get_idthread() {
        return $this->_idthread;
    }

    public function get_idpostpadre() {
        return $this->_idpostpadre;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function get_mensaje() {
        return $this->_mensaje;
    }

    public function get_fechaalta() {
        return $this->_fechaalta;
    }

    public function get_fechamodificacion() {
        return $this->_fechamodif;
    }

    public function get_usuariomodif() {
        return $this->_idusuariomodif;
    }

    public function get_votos() {
        return $this->_votos;
    }

    public function get_status() {
        return $this->_status;
    }

    public function set_idpostauto($_idpostauto) {
        $this->_idpostauto = $_idpostauto;
    }

    public function set_idpost($_idpost) {
        $this->_idpost = $_idpost;
    }

    public function set_idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function set_idpostpadre($_idpostpadre) {
        $this->_idpostpadre = $_idpostpadre;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function set_mensaje($_mensaje) {
        $this->_mensaje = $_mensaje;
    }

    public function set_fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function set_fechamodificacion($_fechamodif) {
        $this->_fechamodificacion = $_fechamodif;
    }

    public function set_usuariomodif($_idusuariomodif) {
        $this->_usuariomodif = $_idusuariomodif;
    }

    public function set_votos($_votos) {
        $this->_votos = $_votos;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

    function __construct() {
        $this->_idpostauto = -1;
        $this->_idpost = -1;
        $this->_idthread = -1;
        $this->_idpostpadre = -1;
        $this->_idusuario = -1;
        $this->_mensaje = '';
        $this->_votos = -1;
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_idusuariomodif = -1;
        $this->_status = 1;
    }

    static public function Select($post) {
        $conexion = new conexion();
        $consulta = "Call posts_SELECT('" . $post->get_idpostauto() . "','" . $post->get_idpost() .
                "','" . $post->get_idthread() . "','" . $post->get_idpostpadre() . "','" . $post->get_idusuario()
                . "','" . $post->get_mensaje() . "'," . $post->get_fechaalta() . "," . $post->get_fechamodificacion()
                . ",'" . $post->get_usuariomodif() . "','" . $post->get_votos() . "'," . $post->get_status() . ")";
        return mysql_query($consulta);
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Insert($post) {
        $conexion = new conexion();
        $consulta = "Call posts_INSERT('" . $post->get_idthread() . "','" . $post->get_idpostpadre() . "','" . $post->get_idusuario() . "','" . $post->get_mensaje() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Update($post) {
        //($idPost int, $idThread int, $idPostPadre int, $idUsuario int, $Mensaje text, $FechaAlta timestamp,$idUsuarioModificacion int)
        $conexion = new conexion();
        $consulta = "Call posts_UPDATE('" . $post->get_idthread() . "','" . $post->get_idpostpadre() . "','" . $post->get_idusuario() . "','" . $post->get_mensaje() . "'," . $post->get_fechaalta() . ",'" . $post->get_usuariomodif() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Delete($post) {
        $conexion = new conexion();
        $consulta = "Call posts_DELETE('" . $usuario->get_idpost() . "')";
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
        $post->set_mensaje($row["Mensaje"]);        
        $post->set_fechaalta($row["FechaCreacion"]);
        $post->set_fechamodif($row["FechaModificacion"]);
        $post->set_idusuariomodif($row["idUsuarioModificacion"]);
        $post->set_votos($row["Votos"]);
        $post->set_status($row["Status"]);
        return $post;
    }

}

;
?>
