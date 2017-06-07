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
    $query = "DELETE  FROM transicion WHERE id_transicion = '$id' ";
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

$query= "select transicion.id_transicion,transicion.nombre, esta.nombre as asociado, est.nombre as siguiente,workflow.nombre as nombre_workflow
	from transicion
	inner join estado as est
	on transicion.estado_siguiente=est.id_estado
	inner join estado as esta 
	on transicion.estado_asociado=esta.id_estado
	inner join workflow
	on est.id_workflow=workflow.id_workflow
    ORDER BY transicion.id_transicion";
$result = mysqli_query($link,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>Transiciones - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="text-uppercase">Sistema de registro de flujos de trabajo</h3>
            <h4 class="text-uppercase">Transiciones</h4>
        </div>
        <div class="btn-toolbar">
            <a class="btn btn-primary btn-wrk" href="transicion.php">Nueva transición</a>
            <a class="btn btn-primary btn-wrk" href="../dashboard_admin.php">Panel principal</a>
        </div>
        <div class="well">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Flujo de trabajo</th>
                    <th>Transición</th>
                    <th>Estado asociado</th>
                    <th>Estado siguiente</th>
                    <th style="width: 36px;"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?php echo $row['id_transicion'] ?></td>
                            <td><?php echo $row['nombre_workflow'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['asociado'] ?></td>
                            <td><?php echo $row['siguiente'] ?></td>
                            <td>
                                <a href="transicion.php?id=<?php echo $row['id_transicion'] ?>"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                                <a href="#" data-toggle="modal" class="delete-transicion"
                                   data-id="<?php echo $row['id_transicion'] ?>" data-target="#myModal"><i
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
                        <h4 class="modal-title">Eliminar transición</h4>
                    </div>
                    <div class="modal-body">
                        <p class="error-text">Desea eliminar la transición?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-danger" id="delete-item" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /card-container -->
    <form action="" id="delete-transicion" method="post">
        <input type="hidden" name="id" id="id-transicion">
    </form>
</div><!-- /container -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(".delete-transicion").click(function () {
        var id = $(this).attr('data-id');
        $("#id-transicion").val(id);
    });
    $("#delete-item").click(function () {
        $("#delete-transicion").submit();
    })
</script>
</body>
</html>

