<?php

class conexion {

    private $conexion, $db, $query;

    public function __construct() {
        $db = 'PoochieDB';
        $conexion = mysql_connect("poochiedb.no-ip.org", "admin", "pedro") or die("No se pudo establecer la conexion con MySQL" . mysql_error());
        mysql_select_db($db);
    }

    public function __destruct() {
        mysql_close($conexion);
    }

}

;
?>
