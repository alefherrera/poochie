<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/poochie/template/header.php'; 
include_once $_SERVER['DOCUMENT_ROOT'].'/poochie/language/spanish/submit.spanish.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/poochie/clases/threads.php';
        
if (!islogged()){
    reddir_session();
}

//Si apreto en enviar
if (isset($_REQUEST['submit'])) {
    $thread = new threads();
    $thread->set_idusuario($_SESSION['usuario']->get_idusuario());
    $thread->set_titulo($_REQUEST['titulo']);
    $thread->set_mensaje($_REQUEST['mensaje']);
    threads::Insert($thread);
}
?>
<head>
    <link rel="stylesheet" href="/poochie/template/styles/form_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/poochie/scripts/general.js"></script>
</head>
<?php
echo '<div id="submitbox" style="margin:auto; display: table; margin-top: 5%; width:60%">
    <form class="defaultform"  name="submitthread" method="post">
        <table width="100%">
            <tr>
                <td colspan="2" class="headercell">
                    ' . $txt['form_header'] . '
                </td>
            </tr >
            <tr>
                <!--Pedazo en blanco, para separar el header del mensaje en si-->
                <td style="padding-top:10px">
                </td>
            </tr>
            <tr>
                <td width="100px" class="labelcell">
                    <label for="titulo">' . $txt['form_title'] . '</label>
                </td>
                <!--Pedazo en blanco, para hacer la separacion a la derecha del label-->
                <td>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="fieldcell" style="padding-right: 30%" colspan="2">
                    <input name="titulo" class="textbox" id="titulo" type="text" tabindex="1"/>
                </td>
            </tr>
            <tr>
                <td class="fieldcell" style="padding-right: 10px" colspan="2">
                    <textarea name="mensaje" class="textarea" rows="13" id="mensaje" type="password" tabindex="2"></textarea>
                </td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="submit" value="' . $txt['form_submit'] . '" tabindex="5" />
                </td>
            </tr>
        </table>
    </form>
</div>'
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/footer.php'; ?>
