<?php 
	require_once 'conexion.php';
	
	$nombre_error=$descripcion_error=$categoria_error="";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if (empty($_POST['nombre']))
			$nombre_error="Debe Ingresar el nombre de workflow";
		else
		if (empty($_POST['descripcion']))
			$descripcion_error="Debe ingresar la descripcion";
		else
		if ($_POST['categoria']=="")
			$categoria_error="Debe ingresar la categoria";
		else
		{
			$nombre=limpiar_data($_POST['nombre']);
			$descripcion=limpiar_data($_POST['descripcion']);
			$categoria=$_POST['categoria'];
			$query="SELECT COUNT(*) FROM workflow";
			$result=mysqli_query($link,$query);
			if (mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$num=$row['COUNT(*)'];				
			}
			$query="INSERT INTO workflow (id_workflow,nombre,descripcion,id_categoria) VALUES('$num','$nombre','$descripcion','$categoria')";
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
	<title>Workflow</title>
</head>
<body>

<section id="registro" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <form class="form-signin"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                    <br><br>
                    <h3>Nuevo workflow</h3>

                    <p id="aqui">Nombre <input class="form-control" type="text" id="nombre"  name="nombre"></input>
                        <span style="color:red">* <?php echo $nombre_error ?></span>
                    </p>
                    <p>Descripción <input class="form-control"   type="text" id="descripcion" name="descripcion"></input>
                        <span style="color:red">* <?php echo $descripcion_error ?></span>
                    </p>
                    <p>Categoria
                        <select class="form-control" name="categoria">
                            <?php
                            $query="SELECT * FROM categoria";
                            $result=mysqli_query($link,$query);
                            if (mysqli_num_rows($result)>0)
                                while($row=mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row['id_categoria'].'">'.$row['descripcion'].'</option>';
                                }
                            ?>
                        </select>
                        <span style="color:red">* <?php echo $categoria_error ?></span>
                    </p>
                    <input class="btn btn-success"  type="submit" value="Registrar"></input>
                    <a class="btn btn-danger" onclick="$:location.href='dashboard_admin.php' ">Atrás</a>
                </form>



            </div>
        </div>
    </div>
</section>



	<!--
	<button onclick="showUser()">Mostrar</button>
	<input type="text" size="30" onkeyup="buscarnombre(this.value)" id="prueba">
	<div id="livesearch"></div>
	<div id="txtHint"><b>Person info will be listed here...</b></div>
	-->
</form>


	<script>
		function atras(){
			window.location.href="dashboard_admin.php"
		}
		function mostrar(value){			
			document.getElementById("prueba").value=value;
			document.getElementById("livesearch").hidden="true";

		}
		/*
		function showUser() {
			
	        xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","mostrar_workflows.php",true);
	        //xmlhttp.open("GET","getuser.php?q="+str,true);
	        xmlhttp.send();
    
		}
		function buscarnombre(nombre){
			if ($nombre=""){
				document.getElementById("livesearch").innerHTML="";
    			document.getElementById("livesearch").style.border="0px";
				return;
			}
			else{
				solicitud = new XMLHttpRequest();
		        solicitud.onreadystatechange = function() {
		            if (solicitud.readyState == 4 && solicitud.status == 200) {
		                document.getElementById("livesearch").innerHTML=solicitud.responseText;
      					document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		            }
		        };
		        solicitud.open("GET","buscar.php?q="+nombre,true);
		        //solicitud.open("GET","getuser.php?q="+str,true);
		        solicitud.send();
			}			

		}
		*/
		
	</script>


</body>
</html>

