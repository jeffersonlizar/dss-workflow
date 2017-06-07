<?php 
	require_once 'conexion.php';
	//traer los datos de session, no es necesario hacer un form para esto
	//en este caso solo es necesario traer id_estado
	$id_usuario=$_POST['id_usuario'];
	$id_instancia=$_POST['id_instancia'];
	$id_estado=$_POST['id_estado'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Proceso</title>
</head>
<body>

	<form class="form-signin" name="formulario" method="POST" action="ejecutar_proceso.php">
        <h3>Seleccione la transicion para el estado</h3>
		<p>Transicion
			<?php 
			//muestra las transiciones para el estado actual
			echo '<select class="form-control" name="transiciones">';
			$query="select * from transiciones where transiciones.estado_asociado='$id_estado'";
			$result=mysqli_query($link,$query);
			if(mysqli_num_rows($result)>0)
				while($row=mysqli_fetch_assoc($result)){
					echo '<option value="'.$row['id_transicion'].'">'.$row['nombre'].' </option>';
				}
			echo '</select>';
			?>
		</p>
        <p>Descripción <textarea class="form-control"name="descripcion"></textarea></p>

		<input type="hidden" name="id_usuario" value=<?php echo $id_usuario ?>>
		<input type="hidden" name="id_instancia" value=<?php echo $id_instancia ?>>		
		<input type="hidden" name="problema" id="problema" value="">
		<button class="btn btn-success" onclick="mensaje()" >Enviar</button>
        <a class="btn btn-danger" onclick="$:location.href='dashboard_user.php' ">Atrás</a>
	</form>

    <section id="registro" class="contact-section">
        <div class="container">
            <div class="table-responsive">
         	<?php			    
				//datos de la creacion
				$query="select *
				from instancia
				where id_instancia='$id_instancia'";
				$result= mysqli_query($link,$query);
				$row=mysqli_fetch_assoc($result);
				echo '<h3>'.$row['titulo'].'</h3>';
				echo '<p>Descripcion: '.$row['descripcion'].'</p>';
				echo '<p>Iniciado por: '.$row['id_usuario'].', Fecha: '.$row['fecha_inicio'].'</p>';
				
				//historial de transiciones
				$query="select id_usuario,descripcion,fecha,nombre,nombre_estado_asociado,nombre_estado_siguiente
				from proceso
				inner join (select transiciones.id_transicion,transiciones.nombre,transiciones.estado_asociado,transiciones.estado_siguiente from transiciones) as transi
				on proceso.id_transicion=transi.id_transicion
				inner join (select estado.id_estado, estado.nombre as nombre_estado_asociado from estado) as esta
				on transi.estado_asociado=esta.id_estado
				inner join (select estado.id_estado, estado.nombre as nombre_estado_siguiente from estado) as est
				on transi.estado_siguiente=est.id_estado
				where proceso.id_instancia='$id_instancia'
				order by id_proceso DESC";
				$result=mysqli_query($link,$query);
				if (mysqli_num_rows($result)>0)
				{
			        echo '<table class="table table-striped table-bordered">';
			        echo '<tr>';
			        echo '<th class="table-header">Estados</th>';
			        echo '<th class="table-header">Transición</th>';
			        echo '<th class="table-header">Descripción</th>';
			        echo '<th class="table-header">Usuario</th>';
			        echo '<th class="table-header">Fecha</th>';
			        echo '</tr>';
					echo '<p><strong>Historial</strong> </p>';
					while($row=mysqli_fetch_assoc($result)){
			            echo '<tr class="table-row">';
						echo '<td>'.$row['nombre_estado_asociado'].' -----> '.$row['nombre_estado_siguiente'].' </td>';
						echo '<td>'.$row['nombre'].' </td>';
						echo '<td>'.$row['descripcion'].' </td>';
						echo '<td>'.$row['id_usuario'].'</td>';
			            echo '<td>'.$row['fecha'].'</td>';
						echo '</tr>';
					}
			        
				}
				echo '</table>';
				mysqli_close($link);
			?>
            </div>
        </div>
    </section>
	<script>
		function mensaje(){
			var r,m;
			m = confirm("Se realizó el estado sin inconvenientes?");
			if (m == true)
				r=0;
			else
				r=1;
			document.getElementById('problema').value=r;
			document.getElementsByTagName('formulario').submit;
		}
	</script>
</body>
</html>
