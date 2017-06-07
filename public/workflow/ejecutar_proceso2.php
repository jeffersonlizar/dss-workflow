<?php 
	require_once 'conexion.php';
	$satisfactoria=$_POST['satisfactoria'];
	$final=$_POST['final'];
	$id_usuario=$_POST['id_usuario'];
	$id_instancia=$_POST['id_instancia'];
	$usuario_asignado=$_POST['usuario_asignado'];
	$id_estado=$_POST['id_estado'];
	$transicion=$_POST['transiciones'];
	$descripcion=$_POST['descripcion'];
	$problema_estado=$_POST['problema_estado'];

	date_default_timezone_set('America/La_Paz');
	$fecha=date("Y-m-d H:i:sa");

	if ($final==1){
		$query="UPDATE instancia SET satisfactoria= '$satisfactoria',fecha_final = '$fecha'  where id_instancia='$id_instancia'";
		mysqli_query($link,$query);
	}
	else {
		//cuento la cantidad de datos en la tabla instancia_usuario para insertar con el id=cant
		$query="SELECT COUNT(*) from instancia_usuario";
		$result = mysqli_query($link,$query);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$num = $row['COUNT(*)'];
		}
		//inserto el usuario para el estado de la instancia. Nota: id_usuario en esta tabla no es clave foranea debido a que todos se guarda como 0 y daria un error ya que el usuario no existe
			$query_select="select *
from instancia_usuario
inner join transiciones
on instancia_usuario.id_estado=transiciones.estado_asociado 
where transiciones.id_transicion='$transicion'
and instancia_usuario.realizado=0";
			$result_select=mysqli_query($link,$query_select);
			$row_select=mysqli_fetch_assoc($result_select);
			$id_instancia_usuario= $row_select['id_instancia_usuario'];
			$query_update="UPDATE instancia_usuario SET realizado= 1 where id_instancia_usuario='$id_instancia_usuario'";
			mysqli_query($link,$query_update);


			$query="INSERT INTO instancia_usuario (id_instancia_usuario,id_instancia,id_estado,id_usuario,realizado) VALUES ('$num','$id_instancia','$id_estado','$usuario_asignado',0)";
			$result=mysqli_query($link,$query);		
	}
	
	//cuento la cantidad de datos en la tabla para insertar con el id=cant
	$query="SELECT COUNT(*) from proceso";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$num = $row['COUNT(*)'];
	}
	
	//insertar un nuevo proceso en la bd
	$query="INSERT INTO proceso (id_proceso,id_usuario,id_instancia,id_transicion,descripcion,problema_estado,fecha) VALUES ('$num','$id_usuario','$id_instancia','$transicion','$descripcion','$problema_estado','$fecha')";
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