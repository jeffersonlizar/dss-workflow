<?php
require_once '../conexion.php';

session_start();
header('Content-Type: text/html; charset=utf-8');

if (empty($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesion');</script>";
    header("refresh:0; url=../index.php");
    die();
}

if ($_POST) {
    $id = $_POST['id'];
    $query = "DELETE  FROM workflow WHERE id_workflow = '$id' ";
    $result = mysqli_query($link, $query);
    if (mysqli_query($link, $query)) {
        echo '<script> alert("Se ha eliminado exitosamente")</script>';
        header("Refresh:0");
        die();
    } else {
        echo '<script> alert("Se ha producido un error al eliminar")</script>';
        header("Refresh:0");
        die();
    }
    mysqli_close($link);
}

//muesta todas las intancias creadas, primero las q no se han terminado y luego las terminadas por orden de la fecha de inicio
$query = "SELECT id_workflow,workflow.nombre,workflow.descripcion, categoria.descripcion as categoria FROM workflow INNER JOIN categoria on workflow.id_categoria = categoria.id_categoria";
$result = mysqli_query($link, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Flujos de trabajo - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="text-uppercase">Sistema de registro de flujos de trabajo</h3>
            <h4 class="text-uppercase">Flujos de trabajo</h4>
        </div>
        <div class="btn-toolbar">
            <a class="btn btn-primary btn-wrk" href="workflow.php">Nuevo flujo de trabajo</a>
            <a class="btn btn-primary btn-wrk" href="../dashboard_admin.php">Panel principal</a>
        </div>
        <div class="well">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th style="width: 36px;"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?php echo $row['id_workflow'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['categoria'] ?></td>
                            <td>
                                <a href="workflow.php?id=<?php echo $row['id_workflow'] ?>"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                                <a href="#" data-toggle="modal" class="delete-category"
                                   data-id="<?php echo $row['id_workflow'] ?>" data-target="#myModal"><i
                                            class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                endif;
                ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar flujo de trabajo</h4>
                    </div>
                    <div class="modal-body">
                        <p class="error-text">Desea eliminar el flujo de trabajo?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-danger" id="delete-item" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /card-container -->
    <form action="" id="delete-category" method="post">
        <input type="hidden" name="id" id="id-category">
    </form>
</div><!-- /container -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(".delete-category").click(function () {
        var id = $(this).attr('data-id');
        $("#id-category").val(id);
    });
    $("#delete-item").click(function () {
        $("#delete-category").submit();
    })
</script>
</body>
</html>