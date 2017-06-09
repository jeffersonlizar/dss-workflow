<?php
$link = mysqli_connect('localhost', 'root', '', 'workflow');
mysqli_set_charset($link,'utf8');
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


