<?php
    session_start();
    $_SESSION = array();
    //Destruimos la sesión
    session_destroy();

header ("Location: index.php");

?>