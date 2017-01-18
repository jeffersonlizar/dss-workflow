<?php 	
	require_once 'conexion.php';
	$id_usuario=$_POST['id_usuario'];
	$id_instancia=$_POST['id_instancia'];	
	$transicion=$_POST['transicion'];	
	$descripcion=$_POST['descripcion'];
	$problema_estado=$_POST['problema'];
	$mensaje="";
	echo '<script>var r=final=0;</script>';	

	//validar si es estado final, si es estado final se pregunta si fue efectiva la gestion
	$query="select id_transicion, id_estado,final
	from transicion
	inner join (select id_estado,nombre,final from estado) as est
	on transicion.estado_siguiente=est.id_estado
	where id_transicion='$transicion'
	and final=1";
	$result=mysqli_query($link,$query);
	if (mysqli_num_rows($result)>0){
		$final=1;
		echo '
		<script>
			var m;
			final=1;
			m = confirm("Se cumplio de manera efectiva la gestion solicitada por el cliente?");
			if (m == true)
				r=1;
			else
				r=0;
		</script>
		';
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Asignar Usuario</title>
	<link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form class="form-signin" name="enviar" method="POST" action="ejecutar_proceso2.php">		
		<?php
		//busca los usuarios que se le pueden asignar al estado
		$query="select transicion.id_transicion,estado.id_estado,estado.nombre,usuario.id_usuario
		from transicion
		inner join estado
		on transicion.estado_siguiente=estado.id_estado
		inner join usuario
		on estado.id_tipo=usuario.id_tipo
		where id_transicion='$transicion'";
		$result=mysqli_query($link,$query);
		if (mysqli_num_rows($result)>0)
		{
			//trae la data del estado: nombre, tipo_user asignado
			$query2="select transicion.id_transicion,estado.id_estado,estado.nombre,tipo_usuario.id_tipo, tipo_usuario.descripcion
			from transicion
			inner join estado
			on transicion.estado_siguiente=estado.id_estado
			inner join tipo_usuario
			on estado.id_tipo=tipo_usuario.id_tipo
			where id_transicion='$transicion'";
			$result2=mysqli_query($link,$query2);
			$row2=mysqli_fetch_assoc($result2);
			echo '<input type="hidden" name="id_estado" id="id_estado" value="'.$row2['id_estado'].'">';
			echo '<h3>Seleccione el usuario a asignar el estado '.$row2['nombre'].'</h3>';
			echo '<span>Usuarios de la categoria '.$row2['descripcion'].'</span>';

			echo '<select class="form-control" name="usuario_asignado">';
			echo '<option value="0" selected>Todos en la categoria</option>';
			while($row=mysqli_fetch_assoc($result)){						
				echo '<option value="'.$row['id_usuario'].'">'.$row['id_usuario'].'</option>';
			}
			echo '</select></br>';
		}
		?>		
		<input type="submit" class="btn btn-success" value="Enviar">
		<a class="btn btn-danger" onclick="$:location.href='dashboard_user.php' ">Atrás</a>
		<input type="hidden" name="satisfactoria" id="satisfactoria" value="">
		<input type="hidden" name="final" id="final" value="<?php echo $final ?>">
		<input type="hidden" name="id_instancia" id="id_instancia" value="<?php echo $id_instancia ?>">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario ?>">		
		<input type="hidden" name="transicion" id="transicion" value="<?php echo $transicion ?>">
		<input type="hidden" name="descripcion" id="descripcion" value="<?php echo $descripcion ?>">
		<input type="hidden" name="problema_estado" id="problema_estado" value="<?php echo $problema_estado ?>">
	</form>
	<script>
		if (final==1){
			document.enviar.style.display='none';
			document.enviar.satisfactoria.value=r;
			document.enviar.submit();
		}		
	</script>
</body>
</html>
