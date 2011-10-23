<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/poochie/template/header.php'; 
session_destroy();
redir_session();
?>