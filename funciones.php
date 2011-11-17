
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/clases/threads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/poochie/clases/posts.php';

/*
 * Valido que sea un mail valido
 */

function check_email_address($email) {
    // First, we check that there's one @ symbol, 
    // and that the lengths are right.
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters 
        // in one section or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if
        (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }
    // Check if domain is IP. If not, 
    // it should be valid domain name
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if
            (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
↪([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}

/**
 * Arma el link de la página en la que estoy y lo retorna.
 * @return string Link de la página
 */
function curPageURL() {
    $pageURL = 'http';
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

/**
 * Guarda la página en la session asi el usuario puede ser redireccionado.
 */
function save_lastPage() {
    $_SESSION['lastpage'] = curPageURL();
}

/**
 * Si el usuario esta loggeado redirecciona a la página anterior.
 */
function islogged() {
    if (isset($_SESSION['usuario'])) {
        return true;
    }
    return false;
}

/**
 * Redirecciona a la página indicada.
 * @param string $url Url de la página a redireccionar. 
 */
function redir($url) {
    echo '<meta http-equiv="Refresh" content="0;url=' . $url . '" />';
    exit;
}

function redir_session() {
    if (isset($_SESSION['lastpage'])) {
        echo '<meta http-equiv="Refresh" content="0;url=' . $_SESSION['lastpage'] . '" />';
        exit;
    } else {
        echo '<meta http-equiv="Refresh" content="0;url=' . $_SERVER['DOCUMENT_ROOT'] . "'/poochie/index.php/>'";
        exit;
    }
}

function mostrar_titulo_thread() {
    $result = threads::Select(new threads);

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo'   <div id="index_main">
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
                                <a href="/poochie/threads/showthread.php?id=' . $row['idThread'] . '">' . $row['Titulo'] . '</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td class="user">
                                            <a href="/poochie/user/perfil.php?id=' . $row['idUsuario'] . '">' . $row['Nombre'] . '</a> 
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
    </div>';
    }
}

function getpost($idthread, $idpadre) {
    
    $post = new posts();
    $post->set_idthread($idthread);
    $post->set_idpostpadre($idpadre);
$txt['form_reply'] = 'Responder';
$txt['form_submit'] = 'Enviar';
    $result = posts::Select($post);
  //  if(!$result)
    //    exit;
    while ($row = mysql_fetch_array($result, MYSQLI_ASSOC)) {
        echo'<table id="mesidThis" class="thread">
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
                                            '.$row['Votosp'].'
                                        </td>
                                        <td>
                                            /
                                        </td>
                                        <td class="negative">
                                            '.$row['Votosn'].'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td class="user">
                                            '.$row['Nombre'].'
                                        </td>
                                    </tr>
                                    <tr>                            
                                        <td class="general">
                                        '.$row['FechaAlta'].'
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="contenido">
                                '.$row['Contenido'].'
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label id="'. $row['idPost'].'" onclick="show_form(this);">' . $txt['form_reply'] . '</label>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <form name="reply" method="post">
                        <div>
                            <input type=hidden name="idPostPadre" value="'.$row['idPost'].'">
                            <textarea id="txt'.$row['idPost'].'" class="txtreply" name="mensaje" rows="10" ></textarea>
                            <input id="sub'.$row['idPost'].'" class="btnsubmit" type="submit" name="submit" value="' . $txt['form_submit'] . '" />
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="line">
                </td>
                <td>';
        getpost($row['idThread'], $row['idPost']);
        //ACA IRIAN LOS HIJOS, Recursividad de la funcion, lo de abajo se imprime despues de la función -->
        echo' </td>
            </tr>
        </table>';
    }
}

?>
