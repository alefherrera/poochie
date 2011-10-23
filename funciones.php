<?php

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
        redir($_SESSION['lastpage']);
        exit;
    }
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

?>
