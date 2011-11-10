<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/header.php';

$thread = new threads();
$thread->set_idthread($_REQUEST['id']);
$thread = threads::Load($thread);

if(isset($_REQUEST['submit'])){
    //Aca se validan boludeces
    $post = new posts();
    $post->set_contenido($_REQUEST['mensaje']);
    $post->set_idpostpadre($_REQUEST['idPostPadre']);
    $post->set_idusuario($_SESSION['usuario']->get_idUsuario());
    $post->set_idthread($_REQUEST['id']);
    
    posts::Insert($post);
    
}

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
                    <table class="table_message">
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
                                <a href="/poochie/index.php">'.$thread->get_titulo().'</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td class="user">
                                            '.$thread->get_nombre().'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="general">
                                            10 comentarios
                                        </td>
                                        <td class="general">
                                            5 visitas
                                        </td>
                                        <td>                             
                                        <td class="general">
                                            '.$thread->get_fechaalta().'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="contenido">
                             '.$thread->get_contenido().'   
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form name="reply" method="post">
                                    <div>
                                        <input type=hidden name="idPostPadre" value="0">
                                        <textarea class="txtreply" id="txt0" name="mensaje" rows="10" ></textarea><br />
                                        <input class="btnsubmit" id="sub0" type="submit" name="submit" value=" . $txt[form_submit] . " />
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
        getpost($thread->get_idthread(),0);
      //  <!--EL HIJO TERMINA ACA-->
    echo'</div>
</div>';
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/template/footer.php';
?>