<?php
    if (isset($_SESSION))
        session_destroy();
    require_once 'conexion.php';
    $usuario = $_POST['id_usuario'];// ? $_POST['id_usuario'] : die("Accesoaaaaaaaaa denegado");
    $contrasena = $_POST['contrasena'];// ? $_POST['contrasena'] : die("Acceso bbbbbbbbbbbbbbdenegado");
    $contrasena = md5($contrasena);
    $query = "select * from usuario as U where U.id_usuario = '$usuario' and U.contrasena = '$contrasena' ";
    $resultado = mysqli_query($link,$query);
    $array = mysqli_fetch_assoc($resultado);
        
    if ($array['id_tipo']=='0')
    {
      
        session_start();

        $_SESSION["id_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
        $_SESSION["id_tipo"] = $array["id_tipo"];
        if ((isset($_SESSION["id_usuario"])) && (isset($_SESSION["contrasena"])))
        {

            header('location: dashboard_admin.php');
        }
        
    }
    else if ($array['id_tipo']=='')
    {
        echo "<script>alert('Acceso Denegado');</script>";
        header("refresh:0; url=index.php");
        die();
    }
    else 
    {
        session_start();
        $_SESSION["id_usuario"] = $usuario;
        $_SESSION["contrasena"] = $contrasena;
        $_SESSION["id_tipo"] = $array["id_tipo"];
        if ((isset($_SESSION["id_usuario"])) && (isset($_SESSION["contrasena"])))
        {
            header('location: dashboard_user.php');
        }
    }
    
    
?>