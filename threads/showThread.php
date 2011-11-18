<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/language/spanish/showthread.spanish.php';

$thread = new threads();
$thread->set_idthread($_REQUEST['id']); // ME TENGO QUE FIJAR SI EXISTE
$thread = threads::Load($thread);


if (isset($_REQUEST['submit'])) {
    if (islogged()) {
        //Aca se validan boludeces
        $post = new posts();
        $post->set_contenido($_REQUEST['mensaje']);
        $post->set_idpostpadre($_REQUEST['idPostPadre']);
        $post->set_idusuario($_SESSION['usuario']->get_idUsuario());
        $post->set_idthread($_REQUEST['id']);

        posts::Insert($post);
    } else {
        echo "<script language=JavaScript>alert('No esta conectado.');</script>";
        echo '<meta http-equiv="Refresh" content="0;url=/poochie/login/login.php">';
        exit;
    }
}

$votos = $thread->get_votosp() - $thread->get_votosn();
$comentarios = count_post($thread->get_idthread());
if(!$comentarios) $comentarios = 0;

echo'<head>
    <link rel="stylesheet" href="/poochie/template/styles/thread_style.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/poochie/threads/showthread.js"></script>
</head>
<div id="showthread_main">
    <div id="thread_main">
        <table class="thread">
            <tr>
                <td class="column">
                    <table>
                        <tr>
                            <td class="up_arrow">
                            </td>
                        </tr>
                        <tr>
                            <td class="total">
                                '. $votos .'
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
                    <table class="table_message">
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td class="positive">
                                            +'.$thread->get_votosp().'
                                        </td>
                                        <td>
                                            /
                                        </td>
                                        <td class="negative">
                                            -'.$thread->get_votosn().'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="title">
                                <a href="/poochie/index.php">' . $thread->get_titulo() . '</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td class="user">
                                            <a href="/poochie/user/perfil.php?id=' . $thread->get_idusuario() . '">' . $thread->get_nombre() . '</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="general">
                                            '.$comentarios.' comentarios
                                        </td>
                                        <td class="general">
                                            5 visitas
                                        </td>
                                        <td>                             
                                        <td class="general">
                                            ' . $thread->get_fechaalta() . '
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="contenido">
                             ' . $thread->get_contenido() . '   
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form name="reply" method="post">
                                    <div>
                                        <input type=hidden name="idPostPadre" value="0">
                                        <textarea class="txtreply" id="txt0" name="mensaje" rows="10" ></textarea><br />
                                        <input class="btnsubmit" id="sub0" type="submit" name="submit" value="' . $txt['form_submit'] . '" />
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <!--ACA ARRANCAN LOS POSTS -->
    <div id="posts_main">';
// <!--UN HIJO ES DESDE ACA-->
getpost($thread->get_idthread(), 0);
//  <!--EL HIJO TERMINA ACA-->
echo'</div>
</div>';
?>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/footer.php';
?>