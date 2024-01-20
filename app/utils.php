<?php
namespace Utils;
// Restricted access
function loggedin() {
    session_start();
    if ($_SESSION['current']['name'] == null) {
        return false;
    }
    return true;
}

?>