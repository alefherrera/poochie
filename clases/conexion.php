<?php

class conexion {

    private $conexion, $db, $query;

    public function __construct() {
        $dbname = "Poochie";
        $user = "admin";
        $user_password = "pedro";
        mysql_connect("poochiedb.no-ip.org", "admin", "pedro") or die("No se pudo establecer la conexion con MySQL" . mysql_error());
        @mysql_select_db($dbname) or die("Error al seleccionar base de datos");
    }

    public function __destruct() {
        mysql_close();
    }

}

;
?>
