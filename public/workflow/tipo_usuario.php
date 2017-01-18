<?php 
	require_once 'conexion.php';
	$descripcion_error=$descripcion="";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if (empty($_POST['descripcion']))
			$descripcion_error="Debe Ingresar la descripcion";
		else
		{
			$descripcion=limpiar_data($_POST['descripcion']);
			$query="SELECT COUNT(*) FROM tipo_usuario";
			$result=mysqli_query($link,$query);
			if (mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$num=$row['COUNT(*)'];				
			}
			$query="INSERT INTO tipo_usuario (id_tipo,descripcion) VALUES('$num','$descripcion')";
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
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>tipo de usuario</title>
</head>
<body>

<section id="registro" class="contact-section">
    <div class="container">

        <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <br>
            <h3>Nuevo tipo de usuario</h3>
            <label for="descripcion">Descripción</label>
            <p><input  class="form-control" type="text" id="descripcion" name="descripcion"></input>
            <span style="color:red">* <?php echo $descripcion_error ?></span>
            </p>
            <input class="btn btn-success"  class="form-control" type="submit" value="Registrar"></input>
            <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
        </form>
    </div>
    </section>

	<script>
		function atras(){
			window.location.href="dashboard_admin.php"
		}
	</script>


</body>
</html>

