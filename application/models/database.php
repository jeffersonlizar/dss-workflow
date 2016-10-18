<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function cargar_preferencias(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM preferencias");
		if($query -> num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
	}

	public function cargar_alarmas_workflow(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM alarmas_workflow");
		if($query -> num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
	}

	public function login($usuario,$pass){
		$this->db->db_select('workflow');
		$query = $this->db->query("SELECT * FROM usuario WHERE id_usuario = '$usuario' AND contrasena = '$pass' AND id_tipo = 0");
		if($query -> num_rows() > 0)
        {
        	$data['tipo']=1;
        	return $data;
        }
        else
        {
        	$this->db->db_select('dss');
        	$pass = md5($pass);
            $query = $this->db->query("SELECT * FROM usuarios WHERE username = '$usuario' AND contrasena = '$pass'");
			if($query -> num_rows() > 0)
	        {
	        	$data['tipo']=$query->result_array()[0]['tipo'];
	        	return $data;
	        }
	        else 
	        	return null;
        }
	}

	public function search_user($usuario){
		$this->db->db_select('workflow');
		$query = $this->db->query("SELECT * FROM usuario WHERE id_usuario = '$usuario'");
		if($query -> num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
        	$this->db->db_select('dss');
            $query = $this->db->query("SELECT * FROM usuarios WHERE username = '$usuario'");
			if($query -> num_rows() > 0)
	        {
	            return $query->result_array();
	        }
	        else
	        {
	            return false;
	        }
        }
	}

	public function singin($username,$nombre,$apellido,$email,$tipo){
		$this->db->db_select('dss');
		$pass = md5($pass);
		$query = $this->db->query("INSERT INTO usuarios(username,nombre,apellido,email,tipo,contrasena) values ('$username','$nombre','$apellido','$email','$tipo','$pass')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function modificar($username,$nombre,$apellido,$email,$tipo){
		$this->db->db_select('dss');
		$query = $this->db->query("UPDATE usuarios SET nombre='$nombre',apellido='$apellido',email='$email',tipo='$tipo' WHERE username = '$username'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function primerLogin($username,$contrasena){
		$this->db->db_select('dss');
		$contrasena = md5($contrasena);
		$query = $this->db->query("UPDATE usuarios SET contrasena='$contrasena' WHERE username = '$username'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function delete($username){
		$this->db->db_select('dss');
		$query = $this->db->query("DELETE FROM usuarios WHERE username = '$username'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function reiniciarContrasena($username){
		$this->db->db_select('dss');
		$contrasena = md5($contrasena);
		$query = $this->db->query("UPDATE usuarios SET contrasena='$contrasena' WHERE username = '$username'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function usuarioslist(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM usuarios");
		if($query -> num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
	}
	
	//calcula la actividad de un dia por rangos de 1 hora
	public function actividadDia($fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (fecha BETWEEN ? AND ?)";
		$fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $data['total'] = $sql->result_array()[0]["cant"];
        }		
        $fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
		$i = 0;
		do {			
			$fecha_nueva = strtotime('+1 hour',strtotime($fecha_inicial));
			$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data[$i++] = $sql->result_array()[0]["cant"];
	            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
	            //echo '</br>';
	        }
	        $fecha_inicial = $fecha_nueva;
		} while (strtotime($fecha_nueva)<= $fecha_final);
		return $data;
	}

	//calcula la actividad de un mes por rangos de dia
	public function actividadMes($fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?))";
		$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);	
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $data['total'] = $sql->result_array()[0]["cant"];
        }
        $fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
		$i = 0;
		do {			
			$fecha_nueva = strtotime('+24 hour',strtotime($fecha_inicial));
			$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data[$i++] = $sql->result_array()[0]["cant"];
	        }
	        $fecha_inicial = $fecha_nueva;
		} while (strtotime($fecha_nueva)< $fecha_final);
		return $data;
	}

	//calcula la actividad de un ano por rangos de meses
	public function actividadAno($fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?))";
		$fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $data['total'] = $sql->result_array()[0]["cant"];
        }
        $fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
		$i = 0;
		do {			
			$fecha_nueva = strtotime('+1 month',strtotime($fecha_inicial));
			$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data[$i++] = $sql->result_array()[0]["cant"];
	            /*echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
	            echo '</br>';
	            */
	        }
	        $fecha_inicial = $fecha_nueva;
		} while (strtotime($fecha_nueva)< $fecha_final);
		return $data;
	}

	//calcula los procesos en cada categoria de un dia
	public function categoriasDia($fecha_inicial){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?))";
		$query_cat = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?)) AND categoria.id_categoria = ?";
		$fecha_final = strtotime ('+1 day',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $cant = $sql->result_array()[0]["cant"];
        }
    	$query = $this->db->query("SELECT id_categoria,descripcion FROM categoria");
    	if($query -> num_rows() > 0)
        {	        
        	$result = $query->result_array();		        	
        	$j = 0;
        	for ($i = 0; $i< count($result); $i++){
        		$cat = $result[$i]['id_categoria'];
        		$cat_nombre = $result[$i]['descripcion'];
        		$sql = $this->db->query($query_cat, array($fecha_inicial,$fecha_final,$cat));
        		if($sql -> num_rows() > 0)
		        {	        	
		            $total_cat = $sql->result_array()[0]['cant'];
		            $data[$j]['nombre'] = $cat_nombre;	
		            $data[$j]['cant'] = $total_cat;				      
		            if ($cant!=0){
		            	$total = number_format(($total_cat*100)/$cant,2);
		            }
		            else{
		            	$total = number_format(0,2);
		            }	
		            $data[$j++]['porcentaje'] = $total;
		        }
        	}
        }        
		return $data;
	}

	//calcula los procesos en cada categoria de un mes
	public function categoriasMes($fecha_inicial){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?))";
		$query_cat = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?)) AND categoria.id_categoria = ?";
		$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $cant = $sql->result_array()[0]["cant"];
        }
    	$query = $this->db->query("SELECT id_categoria,descripcion FROM categoria");
    	if($query -> num_rows() > 0)
        {	        
        	$result = $query->result_array();		        	
        	$j = 0;
        	for ($i = 0; $i< count($result); $i++){
        		$cat = $result[$i]['id_categoria'];
        		$cat_nombre = $result[$i]['descripcion'];
        		$sql = $this->db->query($query_cat, array($fecha_inicial,$fecha_final,$cat));
        		if($sql -> num_rows() > 0)
		        {	        	
		            $total_cat = $sql->result_array()[0]['cant'];
		            $data[$j]['nombre'] = $cat_nombre;			      
		            $data[$j]['cant'] = $total_cat;			      
		            if ($cant!=0){
		            	$total = number_format(($total_cat*100)/$cant,2);
		            }
		            else{
		            	$total = number_format(0,2);
		            }	
		            $data[$j++]['porcentaje'] = $total;
		        }
        	}
        }        
		return $data;
	}

	//calcula los procesos en cada categoria de un ano
	public function categoriasAno($fecha_inicial){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?))";
		$query_cat = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?)) AND categoria.id_categoria = ?";
		$fecha_final = strtotime ('+1 year',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $cant = $sql->result_array()[0]["cant"];
        }
    	$query = $this->db->query("SELECT id_categoria,descripcion FROM categoria");
    	if($query -> num_rows() > 0)
        {	        
        	$result = $query->result_array();		        	
        	$j = 0;
        	for ($i = 0; $i< count($result); $i++){
        		$cat = $result[$i]['id_categoria'];
        		$cat_nombre = $result[$i]['descripcion'];
        		$sql = $this->db->query($query_cat, array($fecha_inicial,$fecha_final,$cat));
        		if($sql -> num_rows() > 0)
		        {	        	
		            $total_cat = $sql->result_array()[0]['cant'];
		            $data[$j]['nombre'] = $cat_nombre;			      
		            $data[$j]['cant'] = $total_cat;			      
		            if ($cant!=0){
		            	$total = number_format(($total_cat*100)/$cant,2);
		            }
		            else{
		            	$total = number_format(0,2);
		            }	
		            $data[$j++]['porcentaje'] = $total;
		        }
        	}
        }        
		return $data;
	}

	//calcula los procesos en cada categoria de un ano
	public function categoriasPeriodo($fecha_inicial,$fecha_final){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?))";
		$query_cat = "SELECT COUNT(instancia.id_instancia) as cant from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN DATE(?) and DATE(?)) AND categoria.id_categoria = ?";
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $cant = $sql->result_array()[0]["cant"];
        }
    	$query = $this->db->query("SELECT id_categoria,descripcion FROM categoria");
    	if($query -> num_rows() > 0)
        {	        
        	$result = $query->result_array();		        	
        	$j = 0;
        	for ($i = 0; $i< count($result); $i++){
        		$cat = $result[$i]['id_categoria'];
        		$cat_nombre = $result[$i]['descripcion'];
        		$sql = $this->db->query($query_cat, array($fecha_inicial,$fecha_final,$cat));
        		if($sql -> num_rows() > 0)
		        {	        	
		            $total_cat = $sql->result_array()[0]['cant'];
		            $data[$j]['nombre'] = $cat_nombre;			      
		            $data[$j]['cant'] = $total_cat;			      
		            if ($cant!=0){
		            	$total = number_format(($total_cat*100)/$cant,2);
		            }
		            else{
		            	$total = number_format(0,2);
		            }	
		            $data[$j++]['porcentaje'] = $total;
		        }
        	}
        }        
		return $data;
	}

	//calcula el rendimiento de un periodo
	public function rendimiento($fecha_inicial,$fecha_final){
		$cant_total_realizados=$cant_total_instancias=$cant_total_procesos=0;
		$this->db->db_select('workflow');
		$data= array();
		$data['cant_total_procesos'] = 0;
		$data['cant_total_realizados'] = 0;
		$data['cant_total_instancias'] = 0;
		$query_total_procesos = "SELECT COUNT(*) as cant FROM proceso as pro1 WHERE (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?))";
		$query_total_realizados = "SELECT * FROM proceso as pro1, proceso as pro2 WHERE pro1.id_instancia = pro2.id_instancia AND pro1.id_proceso<pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?)) AND (DATE(pro2.fecha) BETWEEN DATE(?) AND DATE(?)) GROUP BY pro1.id_proceso";
		$query_total_instancias = "SELECT COUNT(*) as cant FROM instancia WHERE (DATE(fecha_final) BETWEEN DATE(?) AND DATE(?))";
		$sql = $this->db->query($query_total_procesos, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_procesos = $sql->result_array()[0]["cant"];
            $data['cant_total_procesos']=$cant_total_procesos;
        }
        $sql = $this->db->query($query_total_realizados, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_realizados = $sql->result_array();
            $cant_total_realizados = count($cant_total_realizados);
            $data['cant_total_realizados']=$cant_total_realizados;
        }
        $sql = $this->db->query($query_total_instancias, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_instancias = $sql->result_array()[0]["cant"];
            $data['cant_total_instancias']=$cant_total_instancias;
        }
        return $data;
	}

	//calcula la eficacia de un periodo
	public function eficacia($fecha_inicial,$fecha_final){
		$cant_total_realizados=$cant_total_instancias=$cant_total_procesos=0;
		$this->db->db_select('workflow');
		$data= array();
		$data['cant_total_procesos'] = 0;
		$data['cant_total_sinproblemas'] = 0;
		$query_total_procesos = "SELECT COUNT(*) as cant FROM proceso as pro1 WHERE (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?))";
		$query_total_sinproblemas = "SELECT COUNT(*) as cant FROM proceso as pro WHERE (DATE(pro.fecha) BETWEEN DATE(?) AND DATE(?)) AND pro.problema_estado='0'";
		$sql = $this->db->query($query_total_procesos, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_procesos = $sql->result_array()[0]["cant"];
            $data['cant_total_procesos']=$cant_total_procesos;
        }
        $sql = $this->db->query($query_total_sinproblemas, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_procesos = $sql->result_array()[0]["cant"];
            $data['cant_total_sinproblemas']=$cant_total_procesos;            
        }          
        return $data;
	}

	//calcula la respuesta de un periodo
	public function respuesta($fecha_inicial,$fecha_final){
		$cant_total_realizados=$cant_total_instancias=$cant_total_procesos=0;
		$this->db->db_select('workflow');
		$data= array();
		$data['cant_total_instancias'] = 0;
		$data['cant_total_finalizas'] = 0;
		$query_total_instancias = "SELECT COUNT(*) as cant FROM instancia as ins WHERE (DATE(ins.fecha_inicio) BETWEEN DATE(?) AND DATE(?))";
		$query_total_instancias_finalizadas = "SELECT COUNT(*) as cant FROM instancia as ins WHERE (ins.fecha_final BETWEEN DATE(?) AND DATE(?)) AND (ins.fecha_inicio BETWEEN DATE(?) AND DATE(?))";
		$sql = $this->db->query($query_total_instancias, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_instancias = $sql->result_array()[0]["cant"];
            $data['cant_total_instancias']=$cant_total_instancias;
        }
        $sql = $this->db->query($query_total_instancias_finalizadas, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	
            $cant_total_finalizas = $sql->result_array()[0]["cant"];
            $data['cant_total_finalizas']=$cant_total_finalizas;
            
        } 
        return $data;
	}

	//calcula el crecimiento en un periodo
	public function crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4){
		$cant_total=0;
		$this->db->db_select('workflow');
		$data= array();
		$data['cant_total_1'] = 0;
		$data['cant_total_2'] = 0;
		if ($tipo==1)
			$query_total = "SELECT COUNT(*) as cant FROM instancia as ins WHERE (DATE(ins.fecha_inicio) BETWEEN DATE(?) AND DATE(?))";
		else
			$query_total = "SELECT COUNT(*) as cant FROM proceso as pro WHERE (DATE(pro.fecha) BETWEEN DATE(?) AND DATE(?))";
		$sql1 = $this->db->query($query_total, array($fecha1,$fecha2));
		$sql2 = $this->db->query($query_total, array($fecha3,$fecha4));
		if($sql1 -> num_rows() > 0)
        {	
            $cant_total = $sql1->result_array()[0]["cant"];
            $data['cant_total_1']=$cant_total;
        }
        if($sql2 -> num_rows() > 0)
        {	
            $cant_total = $sql2->result_array()[0]["cant"];
            $data['cant_total_2']=$cant_total;
        }
        return $data;
	}

	//calcula el tiempo promedio en un periodo
	public function tiempoPromedio($tipo,$fecha1,$fecha2){
		$total=0;
		$this->db->db_select('workflow');
		$data= array();
		$data['time'] = 0;
		if ($tipo==1){
			$query_total = "SELECT AVG(TIME_TO_SEC(TIMEDIFF(fecha_final, fecha_inicio))) as time FROM instancia WHERE (DATE(fecha_inicio) BETWEEN DATE(?) AND DATE(?)) AND (DATE(fecha_final) BETWEEN DATE(?) AND DATE(?))";
			$sql = $this->db->query($query_total, array($fecha1,$fecha2,$fecha1,$fecha2));
			if($sql -> num_rows() > 0)
	        {	
	            $cant_total = $sql->result_array()[0]["time"];
	            $data['time']=$cant_total;

	        }
		}
		if ($tipo==2){
			$query_total = "SELECT TIME_TO_SEC(TIMEDIFF(pro2.fecha, pro1.fecha)) as time FROM proceso AS pro1 INNER JOIN proceso AS pro2 ON DATE(pro1.fecha)<=DATE(pro2.fecha) WHERE pro1.id_instancia=pro2.id_instancia AND pro1.id_proceso!=pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?)) AND (DATE(pro2.fecha) BETWEEN DATE(?) AND DATE(?)) GROUP BY pro1.id_proceso";
			$sql = $this->db->query($query_total, array($fecha1,$fecha2,$fecha1,$fecha2));
			if($sql -> num_rows() > 0)
	        {	
	            $tiempo = $sql->result_array();
	            $cant = count($tiempo);	            
            	for($i=0;$i<count($tiempo);$i++)
            	{
            		$data['time'] += intval($tiempo[$i]['time']);
            	}
            	$data['time'] = $data['time']/$cant;
            	
	        }
			
		}
       $data= $this->convert_seconds(round($data['time']))."\n";
       return $data;
	}

	//transforma segundos a dias horas min segs
	function convert_seconds($seconds) {
		$dt1 = new DateTime("@0");
		$dt2 = new DateTime("@$seconds");
		return $dt1->diff($dt2)->format('%a,%h,%i,%s');
  	}

  	//calcula la actividad de un dia por rangos de 1 hora para 1 usuario
	public function actividadUsuarioDia($tipo,$usuario,$fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		if ($tipo==2){
			$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (fecha BETWEEN ? AND ?) AND id_usuario = ?";
			$fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+1 hour',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)<= $fecha_final);
		}
		else if ($tipo==1){
			$query = "SELECT COUNT(id_instancia) as cant FROM instancia WHERE (fecha_inicio BETWEEN ? AND ?) AND id_usuario = ?";
			$fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+23 hour',strtotime($fecha_inicial));
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+1 hour',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)<= $fecha_final);
		}
		
		return $data;
	}

	//calcula la actividad de un mes por rangos de 1 dia para 1 usuario
	public function actividadUsuarioMes($tipo,$usuario,$fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		if ($tipo==2){
			$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) AND id_usuario = ?";
			$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+24 hour',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)< $fecha_final);
		}
		else if ($tipo==1){
			$query = "SELECT COUNT(id_instancia) as cant FROM instancia WHERE (DATE(fecha_inicio) BETWEEN DATE(?) AND DATE(?)) AND id_usuario = ?";
			$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+24 hour',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)< $fecha_final);
		}
		
		return $data;
	}

	//calcula la actividad de un año por rangos de 1 mes para 1 usuario
	public function actividadUsuarioAno($tipo,$usuario,$fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		if ($tipo==2){
			$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) AND id_usuario = ?";
			$fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+1 month',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)< $fecha_final);
		}
		else if ($tipo==1){
			$query = "SELECT COUNT(id_instancia) as cant FROM instancia WHERE (DATE(fecha_inicio) BETWEEN DATE(?) AND DATE(?)) AND id_usuario = ?";
			$fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
			$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
			$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$usuario));
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['total'] = $sql->result_array()[0]["cant"];
	        }		
	        $fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));		
			$i = 0;
			do {			
				$fecha_nueva = strtotime('+1 month',strtotime($fecha_inicial));
				$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
				$sql = $this->db->query($query, array($fecha_inicial,$fecha_nueva,$usuario));
				if($sql -> num_rows() > 0)
		        {	        	
		            $data[$i++] = $sql->result_array()[0]["cant"];
		            //echo 'entre fecha: '.$fecha_inicial.' y fecha final: '.$fecha_nueva.'cant: '.$data[$i-1];
		            //echo '</br>';
		        }
		        $fecha_inicial = $fecha_nueva;
			} while (strtotime($fecha_nueva)< $fecha_final);
		}
		return $data;
	}

	//calcula la actividad de un dia por rangos de 1 hora para 1 usuario
	public function usuariosTodos($tipo = null){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_usuario FROM usuario";
		if (isset($tipo)){
			$query = $query." WHERE id_tipo = ".$tipo;
		}
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve el nombre del tipo de usuario
	public function nombreTipoUsuario($tipo){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT descripcion FROM tipo_usuario WHERE id_tipo =".$tipo."";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array()[0]['descripcion'];

        }		
		return $data;
	}

	//devuelve el nombre de la transicion
	public function nombreTransicion($transicion){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT nombre FROM transicion WHERE id_transicion =".$transicion."";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array()[0]['nombre'];

        }		
		return $data;
	}

	//devuelve el nombre del workflow
	public function nombreWorkflow($workflow){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT nombre FROM workflow WHERE id_workflow =".$workflow."";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array()[0]['nombre'];

        }		
		return $data;
	}

	//calcula el resumen de instancias en un periodo
	public function workflowResumen($fecha_inicial,$fecha_final){
		$this->db->db_select('workflow');
		$data = array();
		$rapido = array();
		$cant = array();
		$promedio = array();		
		$query_mas = "SELECT w.nombre, COUNT(ins.id_instancia) as cant FROM instancia as ins INNER JOIN (SELECT workflow.nombre, workflow.id_workflow FROM workflow) as w ON w.id_workflow = ins.id_workflow WHERE (ins.fecha_final BETWEEN DATE(?) AND DATE(?)) AND (ins.fecha_inicio BETWEEN DATE(?) AND DATE(?)) GROUP BY ins.id_workflow ORDER BY (cant) DESC LIMIT 1";
		$query_menos = "SELECT w.nombre, COUNT(ins.id_instancia) as cant FROM instancia as ins INNER JOIN (SELECT workflow.nombre, workflow.id_workflow FROM workflow) as w ON w.id_workflow = ins.id_workflow WHERE (ins.fecha_final BETWEEN DATE(?) AND DATE(?)) AND (ins.fecha_inicio BETWEEN DATE(?) AND DATE(?)) GROUP BY ins.id_workflow ORDER BY (cant) ASC LIMIT 1";
		$query_cant = "SELECT COUNT(id_instancia) as cant FROM instancia WHERE (fecha_final BETWEEN DATE(?) AND DATE(?)) AND (fecha_inicio BETWEEN DATE(?) AND DATE(?))";
		$query_rapido = "SELECT w.id_workflow,w.nombre, TIME_TO_SEC(TIMEDIFF(fecha_final, fecha_inicio)) as time FROM instancia as ins INNER JOIN (SELECT workflow.nombre, workflow.id_workflow FROM workflow) as w ON w.id_workflow = ins.id_workflow WHERE (ins.fecha_final BETWEEN DATE(?) AND DATE(?)) AND (ins.fecha_inicio BETWEEN DATE(?) AND DATE(?)) ORDER BY time ASC ";
		$query_lento = "SELECT w.id_workflow,w.nombre, TIME_TO_SEC(TIMEDIFF(fecha_final, fecha_inicio)) as time FROM instancia as ins INNER JOIN (SELECT workflow.nombre, workflow.id_workflow FROM workflow) as w ON w.id_workflow = ins.id_workflow WHERE (ins.fecha_final BETWEEN DATE(?) AND DATE(?)) AND (ins.fecha_inicio BETWEEN DATE(?) AND DATE(?)) ORDER BY time DESC ";
		$query_workflow_nombre = "SELECT nombre FROM workflow WHERE id_workflow = ?";
		$sql = $this->db->query($query_mas, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['mas_realizado']= $sql->result_array()[0];
        }
       	$sql = $this->db->query($query_menos, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['menos_realizado']= $sql->result_array()[0];
        }
       	$sql = $this->db->query($query_cant, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['total']= $sql->result_array()[0];
        }
        $sql = $this->db->query($query_rapido, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $datos= $sql->result_array();
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_workflow'];
            	$value = (int)$datos[$i]['time'];            	
            	if (!isset($rapido[$pos])){
            		$rapido[$pos] = 0;
            		$cant[$pos] = 0;            		
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] = 0;            		
            		$cant[$pos] ++;            		
            	}else{
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] ++;            		
            	}
            }
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_workflow'];            	
            	$promedio[$pos] = round($rapido[$pos]/$cant[$pos]);
            }
            $tiempo = min($promedio);
            $maximo = array_search(min($promedio), $promedio);
            $sql = $this->db->query($query_workflow_nombre, array($maximo));		
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['mas_rapido'] = $sql->result_array()[0];
	            $data['mas_rapido']['time']= $this->convert_seconds($tiempo);
	        }
        }
        $sql = $this->db->query($query_lento, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $datos= $sql->result_array();
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_workflow'];
            	$value = (int)$datos[$i]['time'];            	
            	if (!isset($rapido[$pos])){
            		$rapido[$pos] = 0;
            		$cant[$pos] = 0;            		
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] = 0;            		
            		$cant[$pos] ++;            		
            	}else{
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] ++;            		
            	}
            }
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_workflow'];            	
            	$promedio[$pos] = round($rapido[$pos]/$cant[$pos]);
            }
            $tiempo = max($promedio);
            $maximo = array_search(max($promedio), $promedio);
            $sql = $this->db->query($query_workflow_nombre, array($maximo));		
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['mas_lento'] = $sql->result_array()[0];
	            $data['mas_lento']['time']= $this->convert_seconds($tiempo);
	        }
        }        
        return $data;
	}

	//calcula el resumen de procesos en un periodo
	public function procesoResumen($fecha_inicial,$fecha_final){
		$this->db->db_select('workflow');
		$data = array();
		$rapido = array();
		$cant = array();
		$promedio = array();
		$query_mas = "SELECT tran.nombre , COUNT(*) as cant FROM proceso AS pro INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro.id_transicion = tran.id_transicion WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) GROUP by (tran.nombre) ORDER BY (cant) DESC LIMIT 1";
		$query_menos = "SELECT tran.nombre , COUNT(*) as cant FROM proceso AS pro INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro.id_transicion = tran.id_transicion WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) GROUP by (tran.nombre) ORDER BY (cant) ASC LIMIT 1";
		$query_cant = "SELECT COUNT(*) as cant FROM proceso AS pro INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro.id_transicion = tran.id_transicion WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?))";
		$query_rapido = "SELECT tran.id_transicion,tran.nombre,TIME_TO_SEC(TIMEDIFF(pro2.fecha, pro1.fecha)) as time FROM proceso as pro2, proceso as pro1 INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro1.id_transicion = tran.id_transicion WHERE pro1.id_instancia = pro2.id_instancia AND pro1.id_proceso<pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?)) AND (DATE(pro2.fecha) BETWEEN DATE(?) AND DATE(?)) GROUP BY pro1.id_proceso ORDER BY time ASC";
		$query_lento = "SELECT tran.id_transicion,tran.nombre,TIME_TO_SEC(TIMEDIFF(pro2.fecha, pro1.fecha)) as time FROM proceso as pro2, proceso as pro1 INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro1.id_transicion = tran.id_transicion WHERE pro1.id_instancia = pro2.id_instancia AND pro1.id_proceso<pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?)) AND (DATE(pro2.fecha) BETWEEN DATE(?) AND DATE(?)) GROUP BY pro1.id_proceso ORDER BY time DESC";
		$query_transicion_nombre = "SELECT nombre FROM transicion WHERE id_transicion = ?";
		$sql = $this->db->query($query_mas, array($fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['mas_realizado'] = $sql->result_array()[0];
        }
        $sql = $this->db->query($query_menos, array($fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['menos_realizado'] = $sql->result_array()[0];
        }
        $sql = $this->db->query($query_cant, array($fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['total'] = $sql->result_array()[0];
        }
        $sql = $this->db->query($query_rapido, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $datos= $sql->result_array();
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_transicion'];
            	$value = (int)$datos[$i]['time'];            	
            	if (!isset($rapido[$pos])){
            		$rapido[$pos] = 0;
            		$cant[$pos] = 0;            		
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] = 0;            		
            		$cant[$pos] ++;            		
            	}else{
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] ++;            		
            	}
            }
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_transicion'];            	
            	$promedio[$pos] = round($rapido[$pos]/$cant[$pos]);
            }
            $tiempo = min($promedio);
            $maximo = array_search(min($promedio), $promedio);
            $sql = $this->db->query($query_transicion_nombre, array($maximo));		
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['mas_rapido'] = $sql->result_array()[0];
	            $data['mas_rapido']['time']= $this->convert_seconds($tiempo);
	        }
        }
        $sql = $this->db->query($query_lento, array($fecha_inicial,$fecha_final,$fecha_inicial,$fecha_final));		
		if($sql -> num_rows() > 0)
        {	        	
            $datos= $sql->result_array();
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_transicion'];
            	$value = (int)$datos[$i]['time'];            	
            	if (!isset($rapido[$pos])){
            		$rapido[$pos] = 0;
            		$cant[$pos] = 0;            		
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] = 0;            		
            		$cant[$pos] ++;            		
            	}else{
            		$rapido[$pos] = $rapido[$pos] + $value;	
            		$cant[$pos] ++;            		
            	}
            }
            for ($i=0; $i < count($datos) ; $i++) { 
            	$pos = (int)$datos[$i]['id_transicion'];            	
            	$promedio[$pos] = round($rapido[$pos]/$cant[$pos]);
            }
            $tiempo = max($promedio);
            $maximo = array_search(max($promedio), $promedio);
            $sql = $this->db->query($query_transicion_nombre, array($maximo));		
			if($sql -> num_rows() > 0)
	        {	        	
	            $data['mas_lento'] = $sql->result_array()[0];
	            $data['mas_lento']['time']= $this->convert_seconds($tiempo);
	        }
        }        
        return $data;
	}

	//trae las ultimas instancias 
	public function ultimas($fecha,$cant_ins,$cant_pro){
		$this->db->db_select('workflow');	
		$data = array();
		$query_instancias = "SELECT * FROM instancia INNER JOIN (SELECT id_workflow,nombre FROM workflow) as wk ON instancia.id_workflow=wk.id_workflow WHERE DATE(fecha_inicio)=DATE(?) ORDER BY fecha_inicio  DESC LIMIT ?";
		$query_procesos = "SELECT * FROM proceso INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tr ON proceso.id_transicion=tr.id_transicion INNER JOIN (SELECT id_instancia,titulo as instancia_nombre FROM instancia) as ins ON proceso.id_instancia=ins.id_instancia WHERE DATE(fecha)=DATE(?) ORDER BY fecha DESC LIMIT ?";
		$sql = $this->db->query($query_instancias, array($fecha,intval($cant_ins)));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['instancias'] = $sql->result_array();
        }
        $sql = $this->db->query($query_procesos, array($fecha,intval($cant_pro)));		
		if($sql -> num_rows() > 0)
        {	        	
            $data['procesos'] = $sql->result_array();
        }
        return $data;
	}	

	//calcula duracion de transiciones por filtro
	public function duracionTransicion($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){
		$this->db->db_select('workflow');
		$data= array();
		$data['time'] = 0;
		$query = "SELECT TIME_TO_SEC(TIMEDIFF(pro2.fecha, pro1.fecha)) as time FROM proceso as pro2, proceso as pro1 INNER JOIN (SELECT id_usuario,id_tipo FROM usuario) as usr ON pro1.id_usuario = usr.id_usuario WHERE pro1.id_instancia = pro2.id_instancia AND pro1.id_proceso<pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE('$fecha_inicial') AND DATE('$fecha_final')) AND (DATE(pro2.fecha) BETWEEN DATE('$fecha_inicial') AND DATE('$fecha_final'))";
		if ($usuario!= "all"){			
			$query = $query." AND pro1.id_usuario = '".$usuario."'";
		}
		if ($transicion!= "all"){
			$query = $query." AND pro1.id_transicion = ".$transicion."";
		}
		if ($tipo_usuario!= "all"){
			$query = $query." AND usr.id_tipo = ".$tipo_usuario."";
		}
		$query = $query." GROUP BY pro1.id_proceso";		
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $tiempo = $sql->result_array();
            //var_dump($tiempo);
            $cant = count($tiempo);	            
        	for($i=0;$i<count($tiempo);$i++)
        	{        		
        		$data['time'] += intval($tiempo[$i]['time']);
        	}
        	$data['time'] = round($data['time']/$cant);
        	
        }       	
        $data = $data['time'];       	 
       	return $data;       	
	}

	//calcula duracion de workflow por filtro
	public function duracionWorkflow($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){
		$this->db->db_select('workflow');
		$data= array();
		$data['time'] = 0;
		$query = "SELECT TIME_TO_SEC(TIMEDIFF(pro2.fecha, pro1.fecha)) as time FROM proceso as pro2, proceso as pro1 INNER JOIN (SELECT id_usuario,id_tipo FROM usuario) as usr ON pro1.id_usuario = usr.id_usuario INNER JOIN (SELECT id_instancia,id_workflow FROM instancia) as ins ON pro1.id_instancia = ins.id_instancia INNER JOIN (SELECT id_workflow,nombre FROM workflow) as wrk ON ins.id_workflow = wrk.id_workflow WHERE pro1.id_instancia = pro2.id_instancia AND pro1.id_proceso<pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE('$fecha_inicial') AND DATE('$fecha_final')) AND (DATE(pro2.fecha) BETWEEN DATE('$fecha_inicial') AND DATE('$fecha_final'))";
		if ($usuario!= "all"){			
			$query = $query." AND pro1.id_usuario = '".$usuario."'";
		}
		if ($workflow!= "all"){
			$query = $query." AND wrk.id_workflow = ".$workflow."";
		}
		if ($tipo_usuario!= "all"){
			$query = $query." AND usr.id_tipo = ".$tipo_usuario."";
		}
		$query = $query." GROUP BY pro1.id_proceso";		
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $tiempo = $sql->result_array();
            //var_dump($tiempo);
            $cant = count($tiempo);	            
        	for($i=0;$i<count($tiempo);$i++)
        	{        		
        		$data['time'] += intval($tiempo[$i]['time']);
        	}
        	$data['time'] = round($data['time']/$cant);
        	
        }       	
        $data = $data['time'];       	 
       	return $data;       	
	}

	//calcula duracion de workflow por filtro
	public function alarmaMaxWorkflow($workflow,$instancia,$tipo_usuario,$usuario){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT TIMESTAMPDIFF(MINUTE, fecha_inicio, NOW()) as time, instancia.id_instancia as instancia, instancia.id_usuario as usuario,instancia.titulo as titulo,usuario.id_tipo as tipo_usuario FROM instancia INNER JOIN usuario ON instancia.id_usuario = usuario.id_usuario WHERE fecha_final IS NULL";
		if ($usuario!= "all"){			
			$query = $query." AND instancia.id_usuario = '".$usuario."'";
		}
		if ($workflow!= "all"){
			$query = $query." AND id_workflow = ".$workflow."";
		}
		if ($tipo_usuario!= "all"){
			$query = $query." AND usuario.id_tipo = ".$tipo_usuario."";
		}
		if ($instancia!= "all"){
			$query = $query." AND id_instancia = ".$instancia."";
		}
		var_dump($query);	
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	
            $data = $sql->result_array();
        }       	
       	return $data;       	
	}




	
}

/* End of file database.php */
/* Location: ./application/models/database.php */
