<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/clases/usuarios.php';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/funciones.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/language/spanish/header.spanish.php';

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
                    ';
if (isset($_SESSION['usuario'])) {
    //Usuario
    echo '<li id="left"><a href="/poochie/index.php" target="_self">' . $txt['header_home'] . '</a></li>';
    echo '<li id="left"><a href="/poochie/threads/submit.php" target="_self">' . $txt['header_new_thread'] . '</a></li>';
    echo '<li id="left"><a href="users.php" target="_self">' . $txt['header_users'] . '</a></li>';
    echo '<li id="right"><a href="/poochie/login/logout.php" target="_self">' . $txt['header_disconnect'] . '</a></li>';
    echo '<li id="right"><a href="/poochie/perfil.php" target="_self">' . $_SESSION['usuario']->get_nombre() . '</a></li>';
} else {
    //Invitado
    echo '<li id="left"><a href="/poochie/index.php" target="_self">' . $txt['header_home'] . '</a></li>';
    echo '<li id="right"><a href="/poochie/login/register.php" target="_self">' . $txt['header_register'] . '</a></li>';
    echo '<li id="right"><a href="/poochie/login/login.php" target="_self">' . $txt['header_connect'] . '</a></li>';
}
?>
</ul>


