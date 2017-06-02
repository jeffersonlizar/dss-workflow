<?php
require_once '../conexion.php';
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}
$workflow_data['id_workflow'] = '';
$workflow_data['nombre'] = '';
$workflow_data['descripcion'] = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_workflow = limpiar_data($_POST['id_workflow']);
    $nombre = limpiar_data($_POST['nombre']);
    $descripcion = limpiar_data($_POST['descripcion']);
    $id_categoria = $_POST['categoria'];
    if ((isset($_POST['id_workflow'])) && (!empty($_POST['id_workflow']))) {
        $query = "UPDATE workflow SET descripcion = '$descripcion', nombre = '$nombre', id_categoria = '$id_categoria' WHERE id_workflow = '$id_workflow' ";
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
        if ((!empty($_POST['descripcion'])) && (!empty($_POST['nombre']))) {
            $nombre = limpiar_data($_POST['nombre']);
            $descripcion = limpiar_data($_POST['descripcion']);
            $categoria = $_POST['categoria'];
            $query = "INSERT INTO workflow (nombre,descripcion,id_categoria) VALUES('$nombre','$descripcion','$categoria')";
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

if ($_GET) {
    $id_workflow = $_GET['id'];
    $query = "SELECT * FROM workflow WHERE id_workflow = '$id_workflow'";
    $result = mysqli_query($link, $query);
    $workflow_data = mysqli_fetch_assoc($result);
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
    <title>Flujo de trabajo - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <?php if (!empty($workflow_data['nombre'])): ?>
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
            <input type="hidden" name="id_workflow" value="<?php echo $workflow_data['id_workflow'] ?>">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                   value="<?php echo $workflow_data['nombre'] ?>"
                   required autofocus>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción"
                   value="<?php echo $workflow_data['descripcion'] ?>"
                   required autofocus>
            <label for="categoria">Categoría</label>
            <select class="form-control" name="categoria" id="categoria">
                <?php
                $query = "SELECT * FROM categoria";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option ';
                        if ($row['id_categoria'] == $workflow_data['id_categoria'])
                            echo 'selected ';
                        echo ' value="' . $row['id_categoria'] . '">' . $row['descripcion'] . '</option>';
                    }
                ?>
            </select>
            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">
                <?php if (!empty($workflow_data['nombre'])) {
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
                },
                categoria: {
                    required: true
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

