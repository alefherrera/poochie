<?php

class threads implements tablas {

    private $_idthread, $_titulo, $_contenido, $_idusuario, $_usuariomodif;

    public function idthread() {
        return $this->_idthread;
    }

    public function idthread($_idthread) {
        $this->_idthread = $_idthread;
    }

    public function titulo() {
        return $this->_titulo;
    }

    public function titulo($_titulo) {
        $this->_titulo = $_titulo;
    }

    public function contenido() {
        return $this->_contenido;
    }

    public function contenido($_contenido) {
        $this->_contenido = $_contenido;
    }

    public function idusuario() {
        return $this->_idusuario;
    }

    public function idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function usuariomodif() {
        return $this->_usuariomodif;
    }

    public function usuariomodif($_usuariomodif) {
        $this->_usuariomodif = $_usuariomodif;
    }

    public function Insert() {
        
    }

    public function Update() {
        
    }

    public function Delete() {
        
    }

    public function Select() {
        
    }

}

;
?>
