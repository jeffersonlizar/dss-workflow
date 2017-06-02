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
    $query = "DELETE  FROM estado WHERE id_estado = '$id' ";
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

$query= "SELECT estado.id_estado, estado.nombre as nombre_estado,estado.inicial,estado.final,workflow.nombre,tipo_usuario.descripcion
	FROM estado 
	INNER JOIN workflow ON estado.id_workflow = workflow.id_workflow  
	INNER JOIN tipo_usuario on estado.id_tipo = tipo_usuario.id_tipo
	ORDER BY estado.id_estado";
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
    <title>Estados - Sistema de registro de flujos de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="text-uppercase">Sistema de registro de flujos de trabajo</h3>
            <h4 class="text-uppercase">Estados</h4>
        </div>
        <div class="btn-toolbar">
            <a class="btn btn-primary btn-wrk" href="estado.php">Nuevo estado</a>
            <a class="btn btn-primary btn-wrk" href="../dashboard_admin.php">Panel principal</a>
        </div>
        <div class="well">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Inicial</th>
                    <th>Final</th>
                    <th>Flujo de trabajo</th>
                    <th>Tipo de usuario</th>
                    <th style="width: 36px;"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                        $final = 'no';
                        $inicial = 'no';
                        if ($row['inicial']=='1'){
                            $inicial = 'si';
                        }
                        if ($row['final']=='1'){
                            $final = 'si';
                        }
                        ?>
                        <tr>
                            <td><?php echo $row['id_estado'] ?></td>
                            <td><?php echo $row['nombre_estado'] ?></td>

                            <td><?php echo $inicial ?></td>
                            <td><?php echo $final ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td>
                                <a href="estado.php?id=<?php echo $row['id_estado'] ?>"><i
                                            class="glyphicon glyphicon-pencil"></i></a>
                                <a href="#" data-toggle="modal" class="delete-estado"
                                   data-id="<?php echo $row['id_estado'] ?>" data-target="#myModal"><i
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
                        <h4 class="modal-title">Eliminar estado</h4>
                    </div>
                    <div class="modal-body">
                        <p class="error-text">Desea eliminar el estado?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn btn-danger" id="delete-item" data-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /card-container -->
    <form action="" id="delete-estado" method="post">
        <input type="hidden" name="id" id="id-estado">
    </form>
</div><!-- /container -->
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(".delete-estado").click(function () {
        var id = $(this).attr('data-id');
        $("#id-estado").val(id);
    });
    $("#delete-item").click(function () {
        $("#delete-estado").submit();
    })
</script>
</body>
</html>

