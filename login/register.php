<?php 
include $_SERVER['DOCUMENT_ROOT'].'/poochie/template/header.php'; 
include $_SERVER['DOCUMENT_ROOT'].'/poochie/language/spanish/register.spanish.php';
?>
<head>
    <link rel="stylesheet" href="/poochie/template/styles/form_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/poochie/scripts/general.js"></script>
    <script src="register.js"></script>
</head>
<body>
</body>
<?php
echo '<div id="registerbox" style="margin:auto; display: table; margin-top: 5%">
    <form class="defaultform"  name="register" action="../index.php" method="post">
        <table>
            <tr>
                <td class="labelcell">
                    <label for="user">'. $txt['form_username'] .'</label>
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
                <td class="labelcell">
                    <label for="passwordrpt">'. $txt['form_passwordrpt'] .'</label>
                </td>
                <td class="fieldcell">
                    <input name="passwordrpt" class="textbox" id="passwordrpt" type="password" tabindex="3"/><br/>
                </td>
            </tr>
            <tr>
                <td class="labelcell">
                    <label for="mail">'. $txt['form_mail'] .'</label>
                </td>
                <td class="fieldcell">
                    <input name="mail" id="mail" class="textbox" type="text" tabindex="4"/><br/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="'. $txt['form_submit'] .'" tabindex="5" />
                </td>
            </tr>
        </table>
    </form>
</div>'
?>
<?php 
include $_SERVER['DOCUMENT_ROOT'].'/poochie/template/footer.php'; 
?>
