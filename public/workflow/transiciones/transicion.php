<?php
require_once '../conexion.php';
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}
$transicion_data['id_transicion'] = '';
$transicion_data['nombre'] = '';
$transicion_data['descripcion'] = '';
$transicion_data['id_workflow'] = '';
$transicion_data['estado_asociado'] = '';
$transicion_data['estado_siguiente'] = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_transicion = limpiar_data($_POST['id_transicion']);
    $nombre = limpiar_data($_POST['nombre']);
    $descripcion = limpiar_data($_POST['descripcion']);
    $estado_asociado = limpiar_data($_POST['estado_asociado']);
    $estado_siguiente = limpiar_data($_POST['estado_siguiente']);
    if ((isset($_POST['id_transicion'])) && (!empty($_POST['id_transicion']))) {
        $query = "UPDATE transicion SET nombre = '$nombre', descripcion = '$descripcion', estado_asociado = '$estado_asociado', estado_siguiente = '$estado_siguiente' WHERE id_transicion = '$id_transicion' ";
        $result = mysqli_query($link, $query);
        if (mysqli_query($link, $query)) {
            echo '<script> alert("Se ha actualizado exitosamente")</script>';
            header("refresh:0; url=lista.php");
        } else {
            echo '<script> alert("Se ha producido un error al actualizar")</script>';
            header("Refresh:0");
        }
        mysqli_close($link);
        die();
    } else {
        if ((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['estado_asociado'])) && (!empty($_POST['estado_siguiente']))) {
            $query = "INSERT INTO transicion (nombre,descripcion,estado_siguiente,estado_asociado) VALUES('$nombre','$descripcion','$estado_siguiente','$estado_asociado')";
            if (mysqli_query($link, $query)) {
                echo '<script> alert("Se ha registrado exitosamente")</script>';
                header("refresh:0; url=lista.php");
            } else {
                echo '<script> alert("Se ha producido un error al registrar")</script>';
                header("Refresh:0");
            }
            mysqli_close($link);
            die();
        }
    }
}

if ($_GET) {
    $id_transicion = $_GET['id'];
    $query = "SELECT * FROM transicion WHERE id_transicion = '$id_transicion' ORDER BY transicion.id_transicion";
    $result = mysqli_query($link, $query);
    $transicion_data = mysqli_fetch_assoc($result);
    $asociado = $transicion_data['estado_asociado'];
    $query = "SELECT * FROM estado WHERE id_estado = '$asociado'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $transicion_data['id_workflow'] = $row['id_workflow'];
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <title>Transición - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <?php if (!empty($transicion_data['nombre'])): ?>
                <h3 class="uppercase">Modificar transición</h3>
            <?php else: ?>
                <h3 class="uppercase">Nuevo transición</h3>
            <?php endif; ?>
        </div>
        <div class="profile-img-card center-align">
            <i class="glyphicon glyphicon-briefcase" style="font-size: 80px"></i>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form method="post" class="form-signin" id="transicion-new">
            <input type="hidden" name="id_transicion" value="<?php echo $transicion_data['id_transicion'] ?>">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                   value="<?php echo $transicion_data['nombre'] ?>"
                   required autofocus>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción"
                   value="<?php echo $transicion_data['descripcion'] ?>"
                   required autofocus>
            <label for="id_workflow">Flujo de trabajo asociado</label>
            <select class="form-control" name="id_workflow" id="id_workflow">
                <option value="null">Seleccione</option>
                <?php

                $query = "SELECT * FROM workflow";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option ';
                        if ($row['id_workflow'] == $transicion_data['id_workflow'])
                            echo 'selected ';
                        echo 'value="' . $row['id_workflow'] . '">' . $row['nombre'] . '</option>';
                    }
                ?>
            </select>
            <label for="id_workflow">Estado asociado</label>
            <select class="form-control" name="estado_asociado" id="estado_asociado">
                <option value="null" selected>Seleccione</option>
            </select>
            <label for="id_workflow">Estado siguiente</label>
            <select class="form-control" name="estado_siguiente" id="estado_siguiente">
                <option value="null" selected>Seleccione</option>
            </select>

            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">
                <?php if (!empty($transicion_data['nombre'])) {
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
    var id_workflow;

    $(document).ready(function(){
        id_workflow = '<?php echo $transicion_data['id_workflow']?>';
        getAsociado('<?php echo $transicion_data['id_workflow']?>','<?php echo $transicion_data['estado_asociado'] ?>');
        getSiguiente('<?php echo $transicion_data['estado_asociado'] ?>','<?php echo $transicion_data['estado_siguiente'] ?>');
    });

    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "Debe seleccionar una opción");



    $("#id_workflow").change(function () {
        id_workflow = $(this).val();
        getAsociado(id_workflow, null);
    });


    function getAsociado(id, selected_id) {
        $.ajax({
            url: "../estado.php",
            type: "POST",
            data: {id_workflow: id, asociado: null},
            success: function (data) {
                data = JSON.parse(data);
                $('#estado_asociado').empty();
                $('#estado_asociado').append('<option value="null" >Seleccione</option>');

                $('#estado_siguiente').empty();
                $('#estado_siguiente').append('<option value="null" >Seleccione</option>');
                $.each(data, function (key, value) {
                    if (selected_id == value.id_estado){
                        $('#estado_asociado').append('<option selected value="' + value.id_estado + '">' + value.nombre + '</option>')
                    }
                    else{
                        $('#estado_asociado').append('<option value="' + value.id_estado + '">' + value.nombre + '</option>')
                    }

                });
            },
            error: function (data) {
                console.log(data);
            }

        });
    }

    $("#estado_asociado").change(function () {
        asociado = $(this).val();
        getSiguiente(asociado, null);
    });

    function getSiguiente(asociado, selected_id) {
        $.ajax({
            url: "../estado.php",
            type: "POST",
            data: {id_workflow: id_workflow, asociado: asociado},
            success: function (data) {
                data = JSON.parse(data);
                $('#estado_siguiente').empty();
                $('#estado_siguiente').append('<option value="null" >Seleccione</option>');
                $.each(data, function (key, value) {
                    if (selected_id == value.id_estado){
                        $('#estado_siguiente').append('<option selected value="' + value.id_estado + '">' + value.nombre + '</option>')
                    }
                    else{
                        $('#estado_siguiente').append('<option value="' + value.id_estado + '">' + value.nombre + '</option>')
                    }
                });
            },
            error: function (data) {
                console.log(data);
            }

        });
    }


    $("#transicion-new").submit(function (event) {
        var validator = $("#transicion-new").validate({
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
                estado_asociado: {
                    valueNotEquals: "null"
                },
                estado_siguiente: {
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

