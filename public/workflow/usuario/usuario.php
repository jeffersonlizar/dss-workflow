<?php
require_once '../conexion.php';
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}
$usuario_data['id_usuario'] = '';
$usuario_data['contrasena'] = '';
$usuario_data['id_tipo'] = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_usuario = limpiar_data($_POST['id_usuario']);
    $contrasena = limpiar_data($_POST['contrasena']);
    $contrasena=md5($contrasena);
    $id_tipo = $_POST['id_tipo'];
    if ((isset($_POST['update'])) && ($_POST['update'])) {
        $query = "UPDATE usuario SET contrasena = '$contrasena', id_tipo = '$id_tipo' WHERE id_usuario = '$id_usuario' ";
        $result = mysqli_query($link, $query);
        if (mysqli_query($link, $query)) {
            echo '<script> alert("Se ha actualizado exitosamente")</script>';
            header("refresh:0; url=lista.php");
            die();
        } else {
            echo '<script> alert("Se ha producido un error al actualizar")</script>';
            header("Refresh:0");
            die();
        }
        mysqli_close($link);
    } else {
        if ((!empty($_POST['id_usuario'])) && (!empty($_POST['id_usuario']))) {
            $query = "INSERT INTO usuario (id_usuario,contrasena,id_tipo) VALUES('$id_usuario','$contrasena','$id_tipo')";
            if (mysqli_query($link, $query)) {
                echo '<script> alert("Se ha registrado exitosamente")</script>';
                header("refresh:0; url=lista.php");
                die();
            } else {
                echo '<script> alert("Se ha producido un error al registrar")</script>';
                header("Refresh:0");
                die();
            }
            mysqli_close($link);
        }
    }
}
$update = false;
if ($_GET) {
    $id_usuario = $_GET['id'];
    $query = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
    $result = mysqli_query($link, $query);
    $usuario_data = mysqli_fetch_assoc($result);
    $update = true;
}


function limpiar_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <title>Usuario - Sistema web para el control de flujo de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <?php if (!empty($usuario_data['nombre'])): ?>
                <h3 class="uppercase">Modificar usuario</h3>
            <?php else: ?>
                <h3 class="uppercase">Nuevo usuario</h3>
            <?php endif; ?>
        </div>
        <div class="profile-img-card center-align">
            <i class="glyphicon glyphicon-briefcase" style="font-size: 80px"></i>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form method="post" class="form-signin" id="usuario-new">
            <input type="hidden" name="update" value="<?php echo $update ?>">
            <input type="text" name="id_usuario" class="form-control" placeholder="Username"
                   value="<?php echo $usuario_data['id_usuario'] ?>"
                   required autofocus>
            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Password"
                   required>
            <input type="password" name="repassword" class="form-control" placeholder="RePassword"
                   required>
            <label for="categoria">Tipo usuario</label>
            <select class="form-control" name="id_tipo" id="id_tipo">
                <?php
                $query = "SELECT * FROM tipo_usuario";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option ';
                        if ($row['id_tipo'] == $usuario_data['id_tipo'])
                            echo 'selected ';
                        echo ' value="' . $row['id_tipo'] . '">' . $row['descripcion'] . '</option>';
                    }
                ?>
            </select>
            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">
                <?php if (!empty($usuario_data['id_usuario'])) {
                    echo 'Modificar';
                } else {
                    echo 'Registrar';
                }
                ?>
            </button>
            <a class="btn btn-block btn-danger" href='lista.php'>Atrás</a>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/validate-spanish.js"></script>
<script>
    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "Debe seleccionar una opción");



    $("#usuario-new").submit(function (event) {
        var validator = $("#usuario-new").validate({
            rules: {
                id_usuario: {
                    required: true,
                    minlength: 3,
                    maxlength: 150
                },
                contrasena: "required",
                repassword: {
                    equalTo: "#contrasena"
                },
                tipo_usuario: {
                    valueNotEquals: "null"
                }
            }
        });
        if (!validator.form()) {
            event.preventDefault();
        }
    });
</script>
</body>
</html>

