<?php 
	require_once 'conexion.php';
	
	$usuario_error=$contrasena_error=$tipo_error="";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if (empty($_POST['usuario']))
			$usuario_error="Debe Ingresar el nombre de usuario";
		else
		if (empty($_POST['contrasena']))
			$contrasena_error="Debe ingresar la contrasena";
		else
		if ($_POST['tipo']=="")
			$tipo_error="Debe ingresar el tipo";
		else
		{
			$usuario=limpiar_data($_POST['usuario']);
			$contrasena=limpiar_data($_POST['contrasena']);
			$contrasena=md5($contrasena);
			$tipo=$_POST['tipo'];
			$query="INSERT INTO usuario (id_usuario,contrasena,id_tipo) VALUES('$usuario','$contrasena','$tipo')";
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
	<meta charset="UTF-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Usuario</title>
</head>
<body>


	<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <br>
        <h3>Nuevo usuario</h3>
		<p>Usuario <input class="form-control" type="text" id="usuario" name="usuario"></input>
		<span style="color:red">* <?php echo $usuario_error ?></span>
		</p>
		<p>Contraseña <input class="form-control" type="password" id="contrasena" name="contrasena"></input>
		<span style="color:red">* <?php echo $contrasena_error ?></span>
		</p>
		<p>Tipo
			<select class="form-control" name="tipo">
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
		<input class="btn btn-success" type="submit" value="Registrar"></input>
        <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
	</form>

	<script>
		function atras(){
			window.location.href="dashboard_admin.php"
		}
	</script>


</body>
</html>

