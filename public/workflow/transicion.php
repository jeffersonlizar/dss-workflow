<?php 
	require_once 'conexion.php';
	$siguiente=$asociado=$workflow=$siguiente=-1;
	$nombre=$descripcion=$nombre_err=$descripcion_err=$workflow_err=$asociado_err=$siguiente_err="";
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		if (isset($_POST['nombre']))
			$nombre=$_POST['nombre'];
		if (isset($_POST['descripcion']))
			$descripcion=$_POST['descripcion'];
		if (isset($_POST['workflow']))
			$workflow=$_POST['workflow'];
		if (isset($_POST['asociado']))
			$asociado=$_POST['asociado'];
		if (isset($_POST['siguiente']))
			$siguiente=$_POST['siguiente'];
		//validar los datos
		if ($workflow==-1)
		{
			$workflow_err= "Debe ingresar el workflow";
			$asociado_err= "Debe ingresar el estado asociado";
			$siguiente_err= "Debe ingresar el estado siguiente";
			if($nombre=="")
				$nombre_err='Debe ingresar el nombre';
			if($descripcion=="")
				$descripcion_err='Debe ingresar la descripcion';
		}
		else
		if ($workflow!=-1)
		{
			if($nombre=="")
				$nombre_err='Debe ingresar el nombre';
			if($descripcion=="")
			{
				$descripcion_err='Debe ingresar la descripcion';
				$workflow=-1;
			}
			if(($asociado==-1) || ($asociado==-10))
				$asociado_err= "Debe ingresar el estado asociado";
			if(($siguiente==-1) || ($siguiente==-10))
			{
				$siguiente_err= "Debe ingresar el estado siguiente";
			}
			else
			{
				$nombre=limpiar_data($nombre);
				$descripcion=limpiar_data($descripcion);

				$query='SELECT count(*) FROM transicion';
				$result= mysqli_query($link,$query);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result))
						$num=$row['count(*)'];
				}			
				$query="INSERT INTO transicion (id_transicion,nombre,descripcion,estado_asociado,estado_siguiente) VALUES ('$num','$nombre','$descripcion','$asociado','$siguiente')";
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
	<title>Transición</title>
</head>
<body>


	
	<form name="work" class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <br>
        <h3>Nueva transicion</h3>
		<p>Nombre <input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>"></input>
		<span style="color:red">* <?php echo $nombre_err ?></span></p>
		<p>Descripción <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>"></input>
		<span style="color:red">* <?php echo $descripcion_err ?></span></p>
		<p>Workflow
		<select class="form-control" name="workflow" onchange="document.work.submit()">
			<option value="-10"></option>
			<?php 			
				$query="SELECT * FROM workflow";
				$result=mysqli_query($link,$query);
				if (mysqli_num_rows($result)>0)
				while($row=mysqli_fetch_assoc($result)){
					if ($row['id_workflow']==$workflow)
						echo '<option value="'.$row['id_workflow'].'" selected>'.$row['nombre'].'</option>';
					else
						echo '<option value="'.$row['id_workflow'].'">'.$row['nombre'].'</option>';
				}

			?>			
		</select><span style="color:red">* <?php echo $workflow_err ?></span></p>

	</form>


	<form class="form-signin" name="asociado" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" name="nombre" value="<?php echo $nombre ?>" hidden="true" ></input>
		<input type="text" name="descripcion" value="<?php echo $descripcion ?>" hidden="true"></input>
		<input type="text" name="workflow" value="<?php echo $workflow ?>" hidden="true"></input>
		<p>Estado Asociado
		<select class="form-control" name="asociado" onchange="document.asociado.submit()">
			<?php 
				if ($workflow!=-1) {
					echo '<option value="-10"></option>';
					$query="SELECT * FROM estado WHERE id_workflow ='$workflow' and final=0";
					$result=mysqli_query($link,$query);
					if (mysqli_num_rows($result)>0)
						while($row=mysqli_fetch_assoc($result)){
							if ($row['id_estado']==$asociado)
								echo '<option value="'.$row['id_estado'].'" selected>'.$row['nombre'].'</option>';
							else
								echo '<option value="'.$row['id_estado'].'">'.$row['nombre'].'</option>';
						}	

				}
			?>
		</select><span style="color:red">* <?php echo $asociado_err ?></span></p>
	</form>	
	<form class="form-signin" name="siguiente" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" name="nombre" value="<?php echo $nombre ?>" hidden="true" ></input>
		<input type="text" name="descripcion" value="<?php echo $descripcion ?>" hidden="true"></input>
		<input type="text" name="workflow" value="<?php echo $workflow ?>" hidden="true"></input>
		<input type="text" name="asociado" value="<?php echo $asociado ?>" hidden="true"></input>
		<p>Estado Siguiente
		<select class="form-control" name="siguiente" >
			<?php 
				if ($asociado!=-1) {
					echo '<option value="-10"></option>';
					$query="SELECT * FROM estado WHERE id_workflow ='$workflow' AND id_estado!='$asociado'";
					$result=mysqli_query($link,$query);
					if (mysqli_num_rows($result)>0)
						while($row=mysqli_fetch_assoc($result)){	
							if ($row['id_estado']==$siguiente)			
								echo '<option value="'.$row['id_estado'].'" selected>'.$row['nombre'].'</option>';
							else
								echo '<option value="'.$row['id_estado'].'">'.$row['nombre'].'</option>';
						}		

				}
			?>
		</select><span style="color:red">* <?php echo $siguiente_err ?></span></p>
		<input class="btn btn-success" type="submit">
        <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
	</form>
    <div class="container">
        <div class="table-responsive">

	<?php 
	//muestra todas las transiciones registradas 
	$query= "select transicion.nombre, esta.nombre as asociado, est.nombre as siguiente,workflow.nombre as nombre_workflow
	from transicion
	inner join estado as est
	on transicion.estado_siguiente=est.id_estado
	inner join estado as esta 
	on transicion.estado_asociado=esta.id_estado
	inner join workflow
	on est.id_workflow=workflow.id_workflow";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result)>0){
		echo '<table class="table table-striped table-bordered">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Workflow</th>';
		echo '<th>Transicion</th>';
		echo '<th>Asociado</th>';
		echo '<th>Siguiente</th>';
		echo '</tr>';
		echo '</thead>';
		while ($row=mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>'.$row['nombre_workflow'].'</td>';
			echo '<td>'.$row['nombre'].'</td>';
			echo '<td>'.$row['asociado'].'</td>';
			echo '<td>'.$row['siguiente'].'</td>';
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
	</script>
    </div>
        </div>

</body>
</html>

