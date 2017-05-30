<?php
require_once '../conexion.php';
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}
$categoria['id_workflow'] = '';
$categoria['nombre'] = '';
$categoria['descripcion'] = '';
$descripcion_error = $descripcion = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = limpiar_data($_POST['id']);
    $nombre = limpiar_data($_POST['nombre']);
    $descripcion = limpiar_data($_POST['descripcion']);
    $categoria = $_POST['categoria'];
    if ((isset($_POST['id']) && (!empty($_POST['id'])))) {
        $query = "UPDATE workflow SET descripcion = '$descripcion', nombre = '$nombre', id_categoria = '$categoria' WHERE id_workflow = '$id' ";
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
        if (empty($_POST['descripcion']))
            $descripcion_error = "Debe Ingresar la descripcion";
        else {
            $nombre = limpiar_data($_POST['nombre']);
            $descripcion = limpiar_data($_POST['descripcion']);
            $categoria = $_POST['categoria'];
            $query = "SELECT COUNT(*) FROM workflow";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $num = $row['COUNT(*)'];
            }
            $query = "INSERT INTO workflow (id_workflow,nombre,descripcion,id_categoria) VALUES('$num','$nombre','$descripcion','$categoria')";
            if (mysqli_query($link, $query)) {
                echo '<script> alert("Se ha registrado exitosamente")</script>';
                header("Refresh:0");
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

if ($_GET) {
    $categoria_id = $_GET['id'];
    $query = "SELECT * FROM workflow WHERE id_workflow = '$categoria_id'";
    $result = mysqli_query($link, $query);
    $categoria = mysqli_fetch_assoc($result);
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
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sign-in.css" rel="stylesheet">
    <title>Flujo de trabajo - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <?php if (!empty($categoria['descripcion'])): ?>
                <h3 class="uppercase">Modificar flujo de trabajo</h3>
            <?php else: ?>
                <h3 class="uppercase">Nuevo flujo de trabajo</h3>
            <?php endif; ?>
        </div>
        <div class="profile-img-card center-align">
            <i class="glyphicon glyphicon-briefcase" style="font-size: 80px"></i>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form method="post" class="form-signin" id="category-new">
            <input type="hidden" name="id" value="<?php echo $categoria['id_workflow'] ?>">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                   value="<?php echo $categoria['nombre'] ?>"
                   required autofocus>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción"
                   value="<?php echo $categoria['descripcion'] ?>"
                   required autofocus>
            <select class="form-control" name="categoria">
                <?php
                $query = "SELECT * FROM categoria";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id_categoria'] . '">' . $row['descripcion'] . '</option>';
                    }
                ?>
            </select>
            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">
                <?php if (!empty($categoria['descripcion'])) {
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
    $("#category-new").submit(function (event) {
        var validator = $("#category-new").validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 150
                },
                descripcion: {
                    required: true,
                    minlength: 3,
                    maxlength: 150
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

