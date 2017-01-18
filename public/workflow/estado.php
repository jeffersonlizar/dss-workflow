<?php 
	require_once 'conexion.php';
	$nombre_error=$workflow_error=$descripcion_error=$descripcion=$tipo_error="";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if (empty($_POST['nombre']))
			$nombre_error="Debe Ingresar el nombre";
		else
		if (empty($_POST['descripcion']))
			$descripcion_error="Debe Ingresar la descripcion";
		else
		if ($_POST['workflow']=="")
			$descripcion_error="Debe Ingresar el workflow asociado";
		else
		if ($_POST['tipo']=="")
			$tipo_error="Debe ingresar el tipo";
		else
		{
			$nombre=limpiar_data($_POST['nombre']);
			$descripcion=limpiar_data($_POST['descripcion']);
			$workflow=limpiar_data($_POST['workflow']);
			$inicial=limpiar_data($_POST['inicial']);
			$final=limpiar_data($_POST['final']);
			$tipo=limpiar_data($_POST['tipo']);

			//cuento la cantidad de datos en la tabla para insertar con el id=cant
			$query="SELECT COUNT(*) FROM estado";
			$result=mysqli_query($link,$query);
			if (mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$num=$row['COUNT(*)'];				
			}			
			$query="INSERT INTO estado (id_estado,nombre,descripcion,id_workflow,inicial,final,id_tipo) VALUES($num,'$nombre','$descripcion','$workflow','$inicial','$final','$tipo')";
			if (mysqli_query($link,$query))
			{
				echo '<script> alert("Se ha registrado exitosamente")</script>';
				header("Refresh:0");
			}
			else 
			{
				echo '<script> alert("Se ha producido un error al registrar")</script>';
				header("Refresh:0");
			}
			mysqli_close($link);	
		}
	}

	function limpiar_data($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Estado</title>
</head>
<body>



	<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <br>
        <h3>Nuevo estado</h3>

		<p>Nombre <input class="form-control" type="text" id="nombre" name="nombre"></input>
		<span style="color:red">* <?php echo $nombre_error ?></span>
		</p>
		<p>Descripción <input class="form-control" type="text" id="descripcion" name="descripcion"></input>
		<span style="color:red">* <?php echo $descripcion_error ?></span>
		</p>
		<p>Workflow Asociado
			<select class="form-control" name="workflow">
				<?php 
				$query="SELECT * FROM workflow";
				$result=mysqli_query($link,$query);
				if (mysqli_num_rows($result)>0)
					while($row=mysqli_fetch_assoc($result)){
						echo '<option value="'.$row['id_workflow'].'">'.$row['nombre'].'</option>';
					}
				?>			
			</select>
			<span style="color:red">* <?php echo $workflow_error ?></span>
		</p>
		<div id="tipo">
			<p>Tipo de usuario asignado
			<select class="form-control" name="tipo" >
				<?php 	
				$query="SELECT * FROM tipo_usuario";
				$result=mysqli_query($link,$query);
				if (mysqli_num_rows($result)>0)
					while($row=mysqli_fetch_assoc($result)){
						echo '<option value="'.$row['id_tipo'].'">'.$row['descripcion'].'</option>';
					}
				?>			
			</select>
			<span style="color:red">* <?php echo $tipo_error ?></span>
		</p>
		</div>
		<p>Inicial </p>
		<input type="radio" id="inicial1" name="inicial" value="0" onclick="mostrar()" checked="true">No</input>
		<input type="radio" id="inicial2" name="inicial" value="1" onclick="ocultar()">Si</input>
		<p></p>
		<div id="final">
			<p>Final </p>
			<input type="radio" id="final1" name="final" value="0" checked="true" onclick="mostrar_usuario()">No</input>
			<input type="radio" id="final2" name="final" value="1" onclick="ocultar_usuario()">Si</input>
			<p></p>
		</div>

        <br>
		<input  class="btn btn-success" type="submit" value="Registrar"></input>
        <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
	</form>





    <div class="container">
        <div class="table-responsive">

	<?php 
	$query= "SELECT estado.nombre as nombre_estado,estado.inicial,estado.final,workflow.nombre,tipo_usuario.descripcion
	FROM estado 
	INNER JOIN workflow ON estado.id_workflow = workflow.id_workflow  
	INNER JOIN tipo_usuario on estado.id_tipo = tipo_usuario.id_tipo";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result)>0){
		echo '<table class="table table-striped table-bordered">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>nombre_estado</th>';
		echo '<th>inicial</th>';
		echo '<th>final</th>';
		echo '<th>workflow</th>';
		echo '<th>Tipo de usuario</th>';
		echo '</tr>';
		echo '</thead>';
		while ($row=mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>'.$row['nombre_estado'].'</td>';
			echo '<td>'.$row['inicial'].'</td>';
			$final= $row['final'];
			echo '<td>'.$final.'</td>';
			echo '<td>'.$row['nombre'].'</td>';
			if ($final==1){
				echo '<td>Estado Final</td>';	
			}
			else
			echo '<td>'.$row['descripcion'].'</td>';
			echo '</tr>';
			}	
		echo '</table>';
	}
	else 
		echo 'No existen datos disponibles';
	?>
	<script>
		function atras(){
			window.location.href="dashboard_admin.php"
		}
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
	</script>
            </div>
        </div>
</body>
</html>

