<?php
require_once 'conexion.php';
$value = $_GET['q'];
//echo "$value</br>";
//$value='j';
$query = "SELECT * FROM usuario WHERE id_usuario LIKE '".$value."%'  ";
	$result= mysql_query($link,$query);
	if(mysqli_num_rows($result)>0)
	while($row=mysqli_fetch_assoc($result)){
		$usuario=$row['id_usuario'];
		echo '<span onclick="mostrar("7")">'.$row['id_usuario'].'</span></br>';
	}


mysqli_close($link);
?>