<?php
require_once '../conexion.php';
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}
$estado_data['id_estado'] = '';
$estado_data['nombre'] = '';
$estado_data['descripcion'] = '';
$estado_data['id_workflow'] = '';
$estado_data['id_tipo'] = '';
$estado_data['inicial'] = '';
$estado_data['final'] = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_estado=limpiar_data($_POST['id_estado']);
    $nombre=limpiar_data($_POST['nombre']);
    $descripcion=limpiar_data($_POST['descripcion']);
    $workflow=limpiar_data($_POST['id_workflow']);
    $inicial=limpiar_data($_POST['inicial']);
    $final=limpiar_data($_POST['final']);
    $tipo=limpiar_data($_POST['id_tipo']);
    if ((isset($_POST['id_estado'])) && (!empty($_POST['id_estado']))) {
        $query = "UPDATE estado SET nombre = '$nombre', descripcion = '$descripcion', id_workflow = '$workflow', inicial = '$inicial', final = '$final', id_tipo = '$tipo' WHERE id_estado = '$id_estado' ";
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
        if ((!empty($_POST['nombre'])) && (!empty($_POST['descripcion']))) {
            $query="INSERT INTO estado (nombre,descripcion,id_workflow,inicial,final,id_tipo) VALUES('$nombre','$descripcion','$workflow','$inicial','$final','$tipo')";
            if (mysqli_query($link,$query))
            {
                echo '<script> alert("Se ha registrado exitosamente")</script>';
                header("refresh:0; url=lista.php");
            }
            else
            {
                echo '<script> alert("Se ha producido un error al registrar")</script>';
                header("Refresh:0");
            }
            mysqli_close($link);
            die();
        }
    }
}

if ($_GET) {
    $id_estado = $_GET['id'];
    $query = "SELECT * FROM estado WHERE id_estado = '$id_estado' ORDER BY estado.id_estado";
    $result = mysqli_query($link, $query);
    $estado_data = mysqli_fetch_assoc($result);
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
    <title>Estado - Sistema web para el control de flujo de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <?php if (!empty($estado_data['nombre'])): ?>
                <h3 class="uppercase">Modificar estado</h3>
            <?php else: ?>
                <h3 class="uppercase">Nuevo estado</h3>
            <?php endif; ?>
        </div>
        <div class="profile-img-card center-align">
            <i class="glyphicon glyphicon-briefcase" style="font-size: 80px"></i>
        </div>
        <p id="profile-name" class="profile-name-card"></p>
        <form method="post" class="form-signin" id="estado-new">
            <input type="hidden" name="id_estado" value="<?php echo $estado_data['id_estado'] ?>">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                   value="<?php echo $estado_data['nombre'] ?>"
                   required autofocus>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción"
                   value="<?php echo $estado_data['descripcion'] ?>"
                   required autofocus>
            <label for="id_workflow">Flujo de trabajo asociado</label>
            <select class="form-control" name="id_workflow" id="id_workflow">
                <?php
                $query = "SELECT * FROM workflow";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<option ';
                        if ($row['id_workflow'] == $estado_data['id_workflow'])
                            echo 'selected ';
                        echo 'value="'.$row['id_workflow'] . '">' . $row['nombre'] . '</option>';
                    }
                ?>
            </select>
            <div id="tipo">
                <label for="id_tipo">Tipo de usuario asignado</label>
                <select class="form-control" name="id_tipo" id="id_tipo">
                    <?php
                    $query = "SELECT * FROM tipo_usuario";
                    $result = mysqli_query($link, $query);
                    if (mysqli_num_rows($result) > 0)
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option ';
                            if ($row['id_tipo'] == $estado_data['id_tipo'])
                                echo 'selected ';
                            echo 'value="' . $row['id_tipo'] . '">' . $row['descripcion'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <label for="">Inicial: </label>
            <input type="radio" id="inicial2"
                    <?php if ($estado_data['inicial']==1){
                        echo 'checked ';
                    }
                    ?>
                   name="inicial" value="1" onclick="ocultar()">Si</input>
            <input type="radio" id="inicial1"
                    <?php if ($estado_data['inicial']==0){
                        echo 'checked ';
                    }
                    ?>
                   name="inicial" value="0" onclick="mostrar()">No</input>
            <p></p>
            <div id="final">
                <label for="">Final: </label>
                <input type="radio" id="final2"
                        <?php if ($estado_data['final']==1){
                            echo 'checked ';
                        }
                        ?>
                       name="final" value="1" onclick="ocultar_usuario()">Si</input>
                <input type="radio" id="final1"
                        <?php if ($estado_data['final']==0){
                            echo 'checked ';
                        }
                        ?>
                       name="final" value="0" onclick="mostrar_usuario()">No</input>
                <p></p>
            </div>


            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">
                <?php if (!empty($estado_data['nombre'])) {
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
    function ocultar(){
        final.style.display = 'none';
        tipo.style.display = 'block';
        window.document.getElementById('final1').checked="true";
    }
    function ocultar_usuario(){
        tipo.style.display = 'none';
    }
    function mostrar_usuario(){
        tipo.style.display = 'block';
    }
    function mostrar(){
        final.style.display = 'block';
    }

    $("#estado-new").submit(function (event) {
        var validator = $("#estado-new").validate({
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
                id_workflow: {
                    required: true
                },
                id_tipo: {
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

