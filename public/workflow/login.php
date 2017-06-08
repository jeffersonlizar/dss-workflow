<?php
if (isset($_SESSION))
    session_destroy();
require_once 'conexion.php';
$usuario = $_POST['id_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = md5($contrasena);
$query = "select * from usuario as U where U.id_usuario = '$usuario' and U.contrasena = '$contrasena' ";
$resultado = mysqli_query($link, $query);
$array = mysqli_fetch_assoc($resultado);

if (isset($array)) {
    if ($array['id_tipo'] == '1') {

        session_start();

        $_SESSION["id_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
        $_SESSION["id_tipo"] = $array["id_tipo"];
        if ((isset($_SESSION["id_usuario"])) && (isset($_SESSION["contrasena"]))) {

            header('location: dashboard_admin.php');
        }

    } else {
        session_start();
        $_SESSION["id_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
        $_SESSION["id_tipo"] = $array["id_tipo"];
        if ((isset($_SESSION["id_usuario"])) && (isset($_SESSION["contrasena"]))) {
            header('location: dashboard_user.php');
        }
    }
} else {
    echo "<script>alert('Acceso Denegado');</script>";
    header("refresh:0; url=index.php");
    die();
}

