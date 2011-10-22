<?php
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/language/spanish/register.spanish.php';
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/clases/usuarios.php';
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/funciones.php';

if (isset($_REQUEST['submit'])) {
    $usuario = new usuarios();
    //Valido longitud y que no haya caracteres extraños
    $valido = true;

    if (!strlen(trim($_REQUEST['user'])) > 0 || !ctype_alnum($_REQUEST['user']))
        $valido = false;
    if (!strlen(trim($_REQUEST['password'])) > 0 || !ctype_alnum($_REQUEST['password']))
        $valido = false;
    if (!strlen(trim($_REQUEST['passwordrpt'])) > 0 || !ctype_alnum($_REQUEST['passwordrpt']) || !($_REQUEST['passwordrpt'] == $_REQUEST['password']))
        $valido = false;
    if (!check_email_address($_REQUEST['mail']))
        $valido = false;
    if ($valido) {
        $usuario->set_nombre($_REQUEST['user']);
        $usuario->set_pass($_REQUEST['password']);
        $usuario->set_mail($_REQUEST['mail']);
        $usuario->insert($usuario);
    }
}
?>
<head>
    <link rel="stylesheet" href="/poochie/template/styles/form_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/poochie/login/register.js"></script>
    <script src="/poochie/scripts/general.js"></script>
</head>
<body>
</body>
<?php
echo '<div id="registerbox" style="margin:auto; display: table; margin-top: 5%">
    <form class="defaultform"  name="register" method="post">
        <table>
            <tr>
                <td class="labelcell">
                    <label for="user">' . $txt['form_username'] . '</label>
                </td>
                <td class="fieldcell">
                    <input name="user" class="textbox" id="user" type="text" tabindex="1"/><br/>
                </td>
            </tr>
            <tr>
                <td class="labelcell">
                    <label for="password">' . $txt['form_password'] . '</label>
                </td>
                <td class="fieldcell">
                    <input name="password" class="textbox" id="password" type="password" tabindex="2"/><br/>
                </td>
            </tr>
            <tr>
                <td class="labelcell">
                    <label for="passwordrpt">' . $txt['form_passwordrpt'] . '</label>
                </td>
                <td class="fieldcell">
                    <input name="passwordrpt" class="textbox" id="passwordrpt" type="password" tabindex="3"/><br/>
                </td>
            </tr>
            <tr>
                <td class="labelcell">
                    <label for="mail">' . $txt['form_mail'] . '</label>
                </td>
                <td class="fieldcell">
                    <input name="mail" id="mail" class="textbox" type="text" tabindex="4"/><br/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="' . $txt['form_submit'] . '" tabindex="5" />
                </td>
            </tr>
        </table>
    </form>
</div>'
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/footer.php';
?>
