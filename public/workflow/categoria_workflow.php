<?php 
	require_once 'conexion.php';
	$descripcion_error=$descripcion="";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if (empty($_POST['descripcion']))
			$descripcion_error="Debe Ingresar la descripcion";
		else
		{
			$descripcion=limpiar_data($_POST['descripcion']);
			//cuento la cantidad de datos en la tabla para insertar con el id=cant
			$query="SELECT COUNT(*) FROM categoria";
			$result=mysqli_query($link,$query);
			if (mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$num=$row['COUNT(*)'];				
			}
			$query="INSERT INTO categoria (id_categoria,descripcion) VALUES('$num','$descripcion')";
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
	<title>Categoria workflow</title>
</head>
<body>


<!-- Iniciar Sesion -->
<section id="registro" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                   <br><br>
                    <h3>Nueva categoria</h3>
                    <label for="descripcion">Descripción</label>
                    <p><input class="form-control" type="text" id="descripcion" name="descripcion"></input>
                        <span style="color:red">* <?php echo $descripcion_error ?></span>
                    </p>
                    <input class="btn btn-success" type="submit" value="Registrar"></input>
                    <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
                </form>




            </div>
        </div>
    </div>
</section>


	<script>
		function atras(){
			window.location.href="dashboard_admin.php"
		}
	</script>
</body>
</html>

