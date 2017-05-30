<?php
require_once 'conexion.php';
session_start();
if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("refresh:0; url=index.php");
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Panel -Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div id="panel-admin" class="card">
    <div class="container color-white">
        <div class="btn-group">
            <a  class="btn btn-default" href="logout.php">Cerrar Sesion</a>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Workflows
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="categorias/lista.php">Categorias</a></li>
                    <li><a href="workflow/lista.php">Flujos de trabajo</a></li>
                    <li><a href="estado.php">Agregar un nuevo estado</a></li>
                    <li><a href="transicion.php">Agregar un nueva transicion</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Usuarios
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="tipo_usuario.php">Agregar nuevo tipo de usuario</a></li>
                    <li><a href="usuario.php">Agregar nuevo usuario</a></li>

                </ul>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <div class="center-align">
                <h3 class="text-uppercase">Flujos de trabajo en ejecución</h3>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Título</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Finalización</th>
                    <th>Proceso</th>
                </tr>
                </thead>
                <?php
                //muesta todas las intancias creadas, primero las q no se han terminado y luego las terminadas por orden de la fecha de inicio
                $query = "(select id_instancia,id_usuario,titulo,fecha_inicio,fecha_final
            from instancia
            where fecha_final is NULL)
            union
            (select id_instancia,id_usuario,titulo,fecha_inicio,fecha_final
            from instancia
            where fecha_final is not NULL)
            order by fecha_inicio desc";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        $id_instancia = $row['id_instancia'];
                        echo '<td>' . $id_instancia . '</td>';
                        echo '<td>' . $row['titulo'] . '</td>';
                        echo '<td>' . $row['fecha_inicio'] . '</td>';
                        echo '<td>' . $row['fecha_final'] . '</td>';
                        echo '<td><button class="btn btn-success" onclick="mostrar_proceso(' . $id_instancia . ')">Ver proceso</button></td>';
                        echo '</tr>';
                    }
                }
                else{
                    echo '<tr>';
                    echo "<p>No existen flujos de trabajos</p>";
                    echo '</tr>';
                }
                mysqli_close($link);
                ?>
            </table>
            <button class="btn btn-warning" onclick="limpiar()" id="limpiar" style="display:none">Limpiar</button>
        </div>

    </div>
</div>

<script>

    function cerrar_sesion() {

        window.location.href = "logout.php";
    }
    function tipo_usuario() {
        window.location.href = "tipo_usuario.php";
    }
    function agregar_usuario() {
        window.location.href = "usuario.php";
    }
    function categoria_workflow() {
        window.location.href = "categorias/category.php"
    }
    function agregar_workflow() {
        window.location.href = "workflow.php"
    }
    function agregar_estado() {
        window.location.href = "estado.php"
    }
    function agregar_transicion() {
        window.location.href = "transicion.php"
    }
    //ajax para mostrar el registro de estados para la instancia
    function mostrar_proceso(instancia) {
        document.getElementById("limpiar").style.display = "block"
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "mostrar_workflows.php?q=" + instancia, true);
        xmlhttp.send();
    }
    function limpiar() {
        document.getElementById("txtHint").innerHTML = "";
        document.getElementById("limpiar").style.display = "none"
    }
</script>
<!-- jQuery -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>