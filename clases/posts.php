<?php

class posts implements tablas {

    private $_idpost, $_idthread, $_padre, $_idusuario, $_mensaje, $_usuariomodif;

    public function idpost() {
        return $this->_idpost;
    }

    public function idpost($_idpost) {
        $this->_idpost = $_idpost;
    }

    public function idthread() {
        return $this->_idthread;
    }

    public function idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function padre() {
        return $this->_padre;
    }

    public function padre($_padre) {
        $this->_padre = $_padre;
    }

    public function idusuario() {
        return $this->_idusuario;
    }

    public function idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function mensaje() {
        return $this->_mensaje;
    }

    public function mensaje($_mensaje) {
        $this->_mensaje = $_mensaje;
    }

    public function usuariomodif() {
        return $this->_usuariomodif;
    }

    public function usuariomodif($_usuariomodif) {
        $this->_usuariomodif = $_usuariomodif;
    }

}

;
?>
