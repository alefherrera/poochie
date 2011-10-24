<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/header.php';
save_lastPage();
?>
<head>
    <link rel="stylesheet" href="/poochie/template/styles/index_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div id="index_main">
    <table class="thread">
        <tr>
            <td class="column">
                1
            </td>
            <td class="column">
                <table>
                    <tr>
                        <td class="up_arrow">
                        </td>
                    </tr>
                    <tr>
                        <td class="total" align="center" >
                            3200
                        </td>
                    </tr>
                    <tr>

                        <td class="down_arrow">
                        </td>
                    </tr>

                </table>
            </td>
            <td>
                <!--Tabla de titulo, fecha, informacion en egeneral -->
                <table>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td class="positive">
                                        +32
                                    </td>
                                    <td>
                                        /
                                    </td>
                                    <td class="negative">
                                        -20
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="title">
                            <a href="/poochie/index.php">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td class="user">
                                        usuario
                                    </td>
                                </tr>
                                <tr>
                                    <td class="general">
                                        10 comentarios
                                    </td>
                                    <td class="general">
                                        5 visitas
                                    </td>
                                    <td>                             <td class="general">
                                        01/01/1995
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/footer.php';
?>



