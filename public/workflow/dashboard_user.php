<?php
	//utilizar session para mantener logueado al usuario, mantener como variables globales el id de usuario y su tipo de usuario 
	require_once 'conexion.php';

    session_start();

    if(empty($_SESSION['id_usuario']))
    {
        echo "<script>alert('Debes iniciar sesion');</script>";
        header("refresh:0; url=index.php");
        die();
    }
    else{
    	$id_tipo = $_SESSION['id_tipo'];
    	$id_usuario = $_SESSION['id_usuario'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Dashboard</title>
</head>
<body>

<br><br>
<section id="registro" class="contact-section">
    <div class="container">
        <div class="table-responsive">
	<button class="btn btn-danger" onclick="cerrar_sesion()">Cerrar Sesión</button><p></p>
	<h3>Workflows en ejecución</h3>
	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Número</th>
			<th>Título</th>
			<th>Fecha de Inicio</th>
			<th>Estado</th>
		</tr>
	</thead>
	<?php
	//query que busca todos los workflow que esten instanciados creados por el usuario sin ningun estado
	$query="select *
	from instancia	
	where instancia.id_usuario='$id_usuario'
	and instancia.id_instancia not in (select proceso.id_instancia from proceso)
	order by fecha_inicio ASC
	";
	$result=mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<tr>';
			$id_instancia=$row['id_instancia'];
			$id_workflow=$row['id_workflow'];
			echo '<td>'.$id_instancia.'</td>';
			echo '<td>'.$row['titulo'].'</td>';
			echo '<td>'.$row['fecha_inicio'].'</td>';
			$query2="select estado.id_estado,estado.nombre as estado_nombre
			from estado
			where estado.id_workflow='$id_workflow' and estado.inicial=1";
			$result2=mysqli_query($link,$query2);
			$row2=mysqli_fetch_assoc($result2);
			$id_estado=$row2['id_estado'];
			echo '<td>'.$row2['estado_nombre'].'</td>';
			echo '<td><button class="btn btn-success" onclick="cambiar_proceso('.$id_instancia.','.$id_estado.')">Realizar transicion</button></td>';
			echo '</tr>';
		}			
	}	
	//query que busca todos los workflow que se encuentren en un estado que este asociado al usuario actual
	$query="select *
	from instancia
	inner join (select proceso.id_proceso,proceso.id_transicion,proceso.descripcion,proceso.fecha,proceso.id_instancia
	from proceso
	group by proceso.id_instancia DESC) as pro
	on instancia.id_instancia=pro.id_instancia
	inner join transicion
	on pro.id_transicion=transicion.id_transicion
	inner join (select estado.id_estado,estado.nombre as estado_nombre,estado.id_tipo from estado) as est
	on transicion.estado_siguiente=est.id_estado
    inner join (select * from instancia_usuario) as inuser
    on instancia.id_instancia=inuser.id_instancia
	where instancia.fecha_final is NULL
	and (inuser.id_usuario='$id_usuario' or inuser.id_usuario='0') 
    and inuser.id_estado=transicion.estado_siguiente
    and est.id_tipo='$id_tipo'
    and inuser.realizado=0
    group by instancia.id_instancia
	order by instancia.fecha_inicio ASC
	";
	$result=mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<tr>';
			$id_instancia=$row['id_instancia'];
			echo '<td>'.$id_instancia.'</td>';
			echo '<td>'.$row['titulo'].'</td>';
			echo '<td>'.$row['fecha_inicio'].'</td>';
			$id_estado=$row['id_estado'];
			echo '<td>'.$row['estado_nombre'].'</td>';
			echo '<td><button class="btn btn-success" onclick="cambiar_proceso('.$id_instancia.','.$id_estado.')">Realizar transicion</button></td>';
			echo '</tr>';
		}			
	}	
	mysqli_close($link);
	?>
	</table>
        </div>
        </div>
    </section>

	<form class="form-signin" method="post" action="nueva_instancia.php" >
		<input type="hidden" name="id_tipo" value="<?php echo $id_tipo ?>">
		<input type="hidden" id="id_usuario"  name="id_usuario" value="<?php echo $id_usuario ?>"> 
		<input class="btn btn-success" type="submit" value="Crear nueva instancia">

	</form>


	<form class="form-signin" name="formulario1" id="formulario1" method="post" action="proceso.php">
		<input type="hidden" id="id_instancia"  name="id_instancia">
		<input type="hidden" id="id_estado"  name="id_estado">
		<input type="hidden" id="id_usuario"  name="id_usuario" value="<?php echo $id_usuario ?>">

	</form>


	<script type="text/javascript">
		function cerrar_sesion(){
			window.location.href="logout.php";
		}
		function cambiar_proceso(instancia,estado){
			window.document.getElementById('id_instancia').value=instancia;
			window.document.getElementById('id_estado').value=estado;
			window.document.getElementById('formulario1').submit();
		}
	</script>

</body>
</html>