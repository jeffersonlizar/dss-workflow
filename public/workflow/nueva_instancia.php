<?php 
	require_once 'conexion.php';
	//traer los datos de session, no es necesario hacer un form para esto
	$id_tipo = $_POST['id_tipo'];
	$id_usuario = $_POST['id_usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Nueva instancia -Sistema de registro de flujos de trabajo</title>
</head>
<body>


<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="text-uppercase">Sistema de registro de flujos de trabajo</h3>
            <h4 class="text-uppercase">Nueva instancia</h4>
        </div>
        <div>
            <h4>Bienvenido <span><?php echo $id_usuario ?></span></h4>
        </div>
        <div class="btn-group">
            <a class="btn btn-default" href="dashboard_user.php">Atrás</a>
        </div>
        <div class="table-responsive">

            <h3>Workflows disponibles</h3>
            <?php
            //muestra todos los workflows donde el estado inicial esta asociado al tipo de usuario del usuario actual
            $query="SELECT estado.nombre as nombre_estado, estado.descripcion as descripcion, workflow.nombre as nombre_workflow, estado.id_workflow FROM estado INNER JOIN workflow on estado.id_workflow=workflow.id_workflow WHERE id_tipo='$id_tipo' AND inicial=1";
            $result=mysqli_query($link,$query);
            if (mysqli_num_rows($result)>0)
            {
                echo '<table class="table table-striped table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Workflows</th>';
                echo '<th>Estado</th>';
                echo '<th>Descripción</th>';
                echo '<th>Nuevo</th>';
                echo '</tr>';
                echo '</thead>';
                while ($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>'.$row['nombre_workflow'].'</td>';
                    echo '<td>'.$row['nombre_estado'].'</td>';
                    echo '<td>'.$row['descripcion'].'</td>';
                    $id_workflow=$row['id_workflow'];
                    echo '<td><button class="btn btn-success" onclick="nueva_instancia('.$id_workflow.')">Nueva Instancia</button></td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            else
                echo 'No puede generar ninguna instancia';
            mysqli_close($link);
            ?>
            <form class="form-signin" name="formulario1" id="formulario1" method="post" action="crear_instancia.php">
                <input type="hidden" id="id_workflow"  name="id_workflow">
                <input type="hidden" id="id_usuario"  name="id_usuario" value="<?php echo $id_usuario ?>">
                <!--- al terminar no enviar, traerse el usuario y el tipo de session -->
                <input type="hidden" id="id_tipo"  name="id_tipo" value="<?php echo $id_tipo ?>">
                <p>Nombre <input class="form-control" type="text" name="nombre"></p>
                <p>Descripción <textarea class="form-control"name="descripcion"></textarea></p>
            </form>

        </div>
    </div>
    </div>


	<script type="text/javascript">
		function nueva_instancia(id){
			window.document.getElementById('id_workflow').value=id;
			window.document.getElementById('formulario1').submit();
		}
	</script>
</body>
</html>