<?php
include 'tablas.php';
include 'conexion.php';

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
        $this->_fechamodif= 0;
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
