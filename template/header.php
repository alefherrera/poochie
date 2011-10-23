<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/clases/usuarios.php';
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/language/spanish/header.spanish.php';
echo '
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>' . $txt['head_title'] . '</title>
        <link rel="stylesheet" href="/poochie/template/menu/menu_style.css" type="text/css" />
        <script src="/poochie/scripts/jquery.js"></script>
    </head>
    <div id="wrap">
        <body>
            <div id="banner">
            </div> 
            <ul id="menu">
                    <li id="left"><a href="index.php" target="_self">' . $txt['home'] . '</a></li>
                    <li id="left"><a href="users.php" target="_self">Usuarios</a></li>';
if (isset($_SESSION['usuario'])) {
    //Usuario
    echo '<li id="right"><a href="/poochie/login/logout.php" target="_self">Desconectarse</a></li>
                        <li id="right"><a href="/poochie/perfil.php" target="_self">' . $_SESSION['usuario']->get_name() . '</a></li>';
} else {
    //Invitado
    echo '<li id="right"><a href="/poochie/login/register.php" target="_self">' . $txt['register'] . '</a></li>';
    echo '<li id="right"><a href="/poochie/login/login.php" target="_self">' . $txt['connect'] . '</a></li>';
}
?>
</ul>


