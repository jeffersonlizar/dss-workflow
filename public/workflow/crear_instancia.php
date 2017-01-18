<?php
	require_once 'conexion.php';
	$id_workflow=$_POST['id_workflow'];
	$id_usuario=$_POST['id_usuario'];	
	$id_tipo=$_POST['id_tipo'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	
	//cuento la cantidad de datos en la tabla para insertar con el id=cant
	$query="SELECT COUNT(*) from instancia";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$num = $row['COUNT(*)']+1;
	}
	date_default_timezone_set('America/La_Paz');
	$fecha=date("Y-m-d H:i:sa");
	

	$query="INSERT INTO instancia (id_instancia,id_workflow,id_usuario,titulo,descripcion,fecha_inicio) VALUES ('$num','$id_workflow','$id_usuario','$nombre','$descripcion','$fecha')";
	if(mysqli_query($link,$query))
	{
		echo '<script> alert("Se ha registrado exitosamente")</script>';
		header("refresh:0; url=dashboard_user.php");
	}
	else 
	{
		echo '<script> alert("Se ha producido un error al registrar")</script>';
		header("refresh:0; url=dashboard_user.php");
	}
	mysqli_close($link);
?>