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
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="text-uppercase">Sistema de registro de flujos de trabajo</h3>
            <h4 class="text-uppercase">Flujos de trabajo en ejecución</h4>
        </div>
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
                    <li><a href="estados/lista.php">Estados</a></li>
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

        <div class="well">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive">
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
                    mysqli_close($link);
                    ?>
                </table>
                <?php
                if (mysqli_num_rows($result) == 0):
                    ?>
                    <div class="center-align">
                        <h4>No existen flujos de trabajo en ejecución</h4>
                    </div>

                    <?php
                endif;
                ?>
            </div>

        </div>
    </div>
</div>

<script>

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

</script>
<!-- jQuery -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>