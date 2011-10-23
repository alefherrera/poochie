<?php 
include $_SERVER['DOCUMENT_ROOT'].'/poochie/template/header.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/poochie/language/spanish/login.spanish.php';
if (isset($_REQUEST['submit'])){
    $usuario = new usuarios();
    $usuario->set_nombre($_REQUEST['user']);
    $usuario = usuarios::Load($usuario);
    if(!($usuario)){
        //Mandar a página de error.
    }
    else if($usuario->get_nombre() == $_REQUEST['user'] && $usuario->get_pass() == $_REQUEST['password']){
        //Iniciar Session
        $_SESSION['usuario'] = $var;
        echo '<meta http-equiv="Refresh" content="0;url=/poochie/index.php" />';
        exit;
    }
    
}

?>
<head>
    <link rel="stylesheet" href="/poochie/template/styles/form_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/poochie/scripts/general.js"></script>
    <script src="login.js"></script>
</head>
<?php
echo '<div id="loginbox" style="margin:auto; display: table; margin-top: 5%">
    <form class="defaultform"  name="login" action="/poochie/login/login.php" method="post">
        <table>
            <tr>
                <td class="labelcell">
                    <label for="user"> '. $txt['form_username'] .' </label>
                </td>
                <td class="fieldcell">
                    <input name="user" class="textbox" id="user" type="text" tabindex="1"/><br/>
                </td>
            </tr>
            <tr>
                <td class="labelcell">
                    <label for="password">'. $txt['form_password'] .'</label>
                </td>
                <td class="fieldcell">
                    <input name="password" class="textbox" id="password" type="password" tabindex="2"/><br/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="'. $txt['form_submit'] .'" tabindex="3" />
                </td>
            </tr>
        </table>
    </form>
</div>'
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/poochie/template/footer.php'; ?>



