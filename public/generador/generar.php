<?php 
	require_once 'conexion.php';

	
	if ((isset($_GET['cantidad'])) and (isset($_GET['fecha']))and (isset($_GET['fecha_final']))){
		$fecha= $_GET['fecha'];
		$fecha= strtotime($fecha);
		$fecha=date('Y-m-d H:i:s',$fecha);		

		$fecha_final= $_GET['fecha_final'];
		$fecha_final= strtotime($fecha_final);
		$fecha_final=date('Y-m-d H:i:s',$fecha_final);		

		$cantidad= $_GET['cantidad'];


		generar();
	}
	else{
		die();	
	}
	function make_seed()
	{
		list($usec, $sec) = explode(' ', microtime());
		return (float) $sec + ((float) $usec * 100000);
	}
	function random_date($from = 0, $to = null) {
	 
	 
	    $from = strtotime($from);
	    $to = strtotime($to);
	    mt_srand(make_seed());
	    return date('Y-m-d H:i:s', mt_rand($from, $to));
	}
	function add_fecha($fecha,$fecha2){
		$i=0;
		do
		{
			mt_srand(make_seed());
			$value=mt_rand(1,185);
			$horas='+24 hour';
			$horas=str_replace('24', $value, $horas);
			mt_srand(make_seed());
			$value=mt_rand(1,350);
			$minutos='+24 minute';
			$minutos=str_replace('24', $value, $minutos);
			mt_srand(make_seed());
			$value=mt_rand(1,350);
			$segundos='+24 second';
			$segundos=str_replace('24', $value, $segundos);

			$nuevafecha = strtotime ( $horas , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );
			$nuevafecha = strtotime ( $minutos , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );
			$nuevafecha = strtotime ( $segundos , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );			
			if ($i>0){
				$nuevafecha=random_date($fecha,$fecha2);
			}		 
			$i++;
		} while(strtotime($nuevafecha)>strtotime($fecha2));		
		return $nuevafecha;
	}
	function add_inicial($fecha,$fecha2){
		$i=0;
		do
		{
			mt_srand(make_seed());
			$value=mt_rand(0,120);
			$horas='+24 hour';
			$horas=str_replace('24', $value, $horas);
			mt_srand(make_seed());
			$value=mt_rand(1,350);
			$minutos='+24 minute';
			$minutos=str_replace('24', $value, $minutos);
			mt_srand(make_seed());
			$value=mt_rand(1,350);
			$segundos='+24 second';
			$segundos=str_replace('24', $value, $segundos);

			$nuevafecha = strtotime ( $horas , strtotime ( $fecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );
			$nuevafecha = strtotime ( $minutos , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );
			$nuevafecha = strtotime ( $segundos , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y-m-d H:i:s' , $nuevafecha );			
			if ($i>0){
				$nuevafecha=random_date($fecha,$fecha2);
			}		 
			$i++;
		} while(strtotime($nuevafecha)>strtotime($fecha2));		
		return $nuevafecha;
	}

	function get_id_tipo(){
		$id_tipo=null;
		//se busca el id de tipo
		$query="SELECT * from tipo_usuario";
		$result= mysqli_query($GLOBALS['link'],$query);
		if ($result)
		if (mysqli_num_rows($result)>0){
			$i=0;
			while ($row=mysqli_fetch_assoc($result)){
					$data[$i++]=$row['id_tipo'];								
			}
			shuffle($data);
			$id_tipo = array_rand($data, 1);
			$id_tipo = $data[$id_tipo];	
		}
		return $id_tipo;
	}
	function get_id_usuario($id_tipo){
		$id_usuario=null;
		//se busca el id de tipo
		$query="SELECT * from usuario where id_tipo='$id_tipo'";
		$result= mysqli_query($GLOBALS['link'],$query);
		if ($result)
		if (mysqli_num_rows($result)>0){
			$i=0;
			while ($row=mysqli_fetch_assoc($result)){
					
					$data[$i++]=$row['id_usuario'];								
			}
			shuffle($data);
			$id_usuario = array_rand($data, 1);
			$id_usuario = $data[$id_usuario];	
		}
		return $id_usuario;
	}
	function get_id_workflow($id_tipo){
		$value= null;
		//se selecciona el tipo de usuario a utilizar
		$query="SELECT estado.nombre as nombre_estado, estado.descripcion as descripcion, workflow.nombre as nombre_workflow, estado.id_workflow FROM estado INNER JOIN workflow on estado.id_workflow=workflow.id_workflow WHERE id_tipo='$id_tipo' AND inicial=1";
		$result=mysqli_query($GLOBALS['link'],$query);
		if($result)
		if (mysqli_num_rows($result)>0){
			$i=0;
			unset($data);
			while ($row=mysqli_fetch_assoc($result)){				
				$data[$i++]=$row['id_workflow'];								
			}
			shuffle($data);
			$value = array_rand($data);
			$value = $data[$value];			
		}
		return $value;
	}
	function crear_instancia($id_workflow,$id_usuario,$fecha){
		$query="SELECT COUNT(*) from instancia";
		$result = mysqli_query($GLOBALS['link'],$query);
		if($result)
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$num = $row['COUNT(*)'];
		}
		$nombre='instancia'.$fecha;
		$descripcion='descripcion'.$fecha;				
		$query="INSERT INTO instancia (id_workflow,id_usuario,titulo,descripcion,fecha_inicio) VALUES ('$id_workflow','$id_usuario','$nombre','$descripcion','$fecha')";
        $data = mysqli_query($GLOBALS['link'],$query);
		if($data){
			return mysqli_insert_id($GLOBALS['link']);
		}
		else{
			return false;
		} 		
	}
	function transicion($id_estado,$id_tipo,$id_instancia,$fecha_inicio,$fecha_final,$id_instancia_usuario){
		$final=0;
		//busca las transiciones del estado y selecciona una
		$id_usuario=get_id_usuario($id_tipo);
		$query="select * from transiciones where transiciones.estado_asociado='$id_estado'";
		$result=mysqli_query($GLOBALS['link'],$query);
		if(mysqli_num_rows($result)>0){
			$i=0;
			while($row=mysqli_fetch_assoc($result)){
				$data[$i++]=$row['id_transicion'];
			}
			shuffle($data);
			$value = array_rand($data);
			$transicion = $data[$value];
			//se busca si la transiciones llega a estado final
			$query="select id_transicion, id_estado,final
			from transiciones
			inner join (select id_estado,nombre,final from estado) as est
			on transiciones.estado_siguiente=est.id_estado
			where id_transicion='$transicion'
			and final=1";
			$result=mysqli_query($GLOBALS['link'],$query);
			if($result)
			if (mysqli_num_rows($result)>0){
				$final=1;
				mt_srand(make_seed());
				$satisfactoria=mt_rand(0, 1);
			}
			//busca los usuarios que se le pueden asignar
			$query="select transiciones.id_transicion,estado.id_estado,estado.nombre,usuario.id_usuario
			from transiciones
			inner join estado
			on transiciones.estado_siguiente=estado.id_estado
			inner join usuario
			on estado.id_tipo=usuario.id_tipo
			where id_transicion='$transicion'";
			$result=mysqli_query($GLOBALS['link'],$query);
			if($result)
			if (mysqli_num_rows($result)>0)
			{
				$i=1;
				//opcion todos en los usuarios
				$data[0]=0;
				while($row=mysqli_fetch_assoc($result)){											
					$data[$i++]=$row['id_usuario'];
				}
				shuffle($data);
				$value = array_rand($data);
				$usuario_asignado = $data[$value];
				//luego que se tiene al usuario, se act la bd si es final
				$fecha=add_fecha($fecha_inicio,$fecha_final);
				if ($final==1){
					$query="UPDATE instancia SET satisfactoria= '$satisfactoria',fecha_final = '$fecha'  where id_instancia='$id_instancia'";
					mysqli_query($GLOBALS['link'],$query);
				}
				else{
					//cuento la cantidad de datos en la tabla instancia_usuario para insertar con el id=cant
					$query="SELECT COUNT(*) from instancia_usuario";
					$result = mysqli_query($GLOBALS['link'],$query);
					if ($result)
					if(mysqli_num_rows($result)>0){
						$row=mysqli_fetch_assoc($result);
						$id_instancia_usuario_num = $row['COUNT(*)'];
					}

					$query_update="UPDATE instancia_usuario SET realizado= 1 where id_instancia_usuario='$id_instancia_usuario'";
					mysqli_query($GLOBALS['link'],$query_update);
					

					$query="INSERT INTO instancia_usuario (id_instancia,id_estado,id_usuario,realizado) VALUES ($id_instancia','$id_estado','$usuario_asignado',0)";
					$result=mysqli_query($GLOBALS['link'],$query);	

				}
				//sea final o no se registra el proceso
				$query="SELECT COUNT(*) from proceso";
				$result = mysqli_query($GLOBALS['link'],$query);
				if ($result)
				if(mysqli_num_rows($result)>0){
					$row=mysqli_fetch_assoc($result);
					$num = $row['COUNT(*)'];
				}
				$descripcion='';
				mt_srand(make_seed());
				$problema_estado=mt_rand(0, 1);
				$query="INSERT INTO proceso (id_usuario,id_instancia,id_transicion,descripcion,problema_estado,fecha) VALUES ('$id_usuario','$id_instancia','$transicion','$descripcion','$problema_estado','$fecha')";
				if(mysqli_query($GLOBALS['link'],$query)){
					if($final==1){
						echo 'se termino el ciclo';
					}
					else{
						cargar_estados($id_instancia,$fecha,$fecha_final,$id_instancia_usuario_num);
					}
				}



			}

		}
	}
	function cargar_estados($id_instancia,$fecha_inicio,$fecha_final,$id_instancia_usuario_num){
		$query="SELECT * FROM proceso INNER join (transiciones) on transiciones.id_transicion= proceso.id_transicion INNER JOIN (estado) on transiciones.estado_siguiente=estado.id_estado where id_instancia = '$id_instancia' ORDER by id_proceso DESC LIMIT 1";
		$result=mysqli_query($GLOBALS['link'],$query);
		if ($result)
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$id_estado = $row['id_estado'];
			$id_tipo = $row['id_tipo'];
			echo 'siguiente estado: '.$id_estado.' </br>';
			transicion($id_estado,$id_tipo,$id_instancia,$fecha_inicio,$fecha_final,$id_instancia_usuario_num);

		}
	}
	function estado_inicial($id_workflow,$id_instancia,$fecha_inicio,$fecha_final){
		$query2="select estado.id_estado,estado.id_tipo,estado.nombre as estado_nombre
			from estado
			where estado.id_workflow='$id_workflow' and estado.inicial=1";
		$result=mysqli_query($GLOBALS['link'],$query2);
		if ($result)
		if(mysqli_num_rows($result)>0){
			$i=0;
			while($row=mysqli_fetch_assoc($result)){
				$data[$i]=$row['id_estado'];
				$data2[$i]=$row['id_tipo'];
				$i++;
			}			
			$value = array_rand($data);
			$id_estado = $data[$value];
			echo 'estado inicial: '.$id_estado.' </br>';
			$id_tipo = $data2[$value];			
			transicion($id_estado,$id_tipo,$id_instancia,$fecha_inicio,$fecha_final,0);
		}		
		
	};
	function generar(){
		$i=0;
		while ($i<$GLOBALS['cantidad'])
		{
			$id_tipo=get_id_tipo();
			if (isset($id_tipo)){			
				$id_workflow=get_id_workflow($id_tipo);
				if (isset($id_workflow)){				
					$id_usuario=get_id_usuario($id_tipo);
					if (isset($id_usuario)){
						$fecha_final=$GLOBALS['fecha_final'];					
						if ($fecha_final=='1970-01-01 01:00:00')
							$fecha_final=add_fecha($GLOBALS['fecha']);			
						$fecha=	add_inicial($GLOBALS['fecha'],$fecha_final);						
						
						$id_instancia = crear_instancia($id_workflow,$id_usuario,$fecha);
						if ($id_instancia!=false){
							echo 'se creo la instancia';						
							estado_inicial($id_workflow,$id_instancia,$fecha,$fecha_final);
							$i++;
						}
						
						
					}				
				}
				
			}
		}				
		
	}


	
		
		
	

?>