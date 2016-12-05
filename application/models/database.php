<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function cargar_indicador_actividad(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_actividad ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_actividad($opcion,$usuario_admin=null,$fecha=null,$dia=null,$dia_comparativo1=null,$dia_comparativo2=null,$mes=null,$mes_comparativo1=null,$mes_comparativo2=null,$ano=null,$ano_comparativo1=null,$ano_comparativo2=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_actividad(opcion,usuario_admin,fecha,dia,dia_comparativo1,dia_comparativo2,mes,mes_comparativo1,mes_comparativo2,ano,ano_comparativo1,ano_comparativo2) values ('$opcion','$usuario_admin','$fecha','$dia','$dia_comparativo1','$dia_comparativo2','$mes','$mes_comparativo1','$mes_comparativo2','$ano','$ano_comparativo1','$ano_comparativo2')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_categoria(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_categoria ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_categoria($opcion,$usuario_admin=null,$fecha=null,$dia=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_categoria(opcion,usuario_admin,fecha,dia,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$dia','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_indicadores(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_indicadores ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_indicadores($opcion,$usuario_admin=null,$fecha=null,$dia=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_indicadores(opcion,usuario_admin,fecha,dia,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$dia','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_crecimiento(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_crecimiento ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_crecimiento($opcion,$usuario_admin=null,$fecha=null,$periodo1_inicio=null,$periodo1_fin=null,$periodo2_inicio=null,$periodo2_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_crecimiento(opcion,usuario_admin,fecha,periodo1,periodo2,periodo3,periodo4) values ('$opcion','$usuario_admin','$fecha','$periodo1_inicio','$periodo1_fin','$periodo2_inicio','$periodo2_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_tiempo_promedio(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_tiempo_promedio ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}

	public function guardar_indicador_tiempo_promedio($opcion,$usuario_admin=null,$fecha=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_tiempo_promedio(opcion,usuario_admin,fecha,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_actividad_usuario(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_actividad_usuario ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_actividad_usuario($opcion,$usuario_admin=null,$fecha=null,$usuario1=null,$usuario2=null,$tipo_usuario=null,$dia=null,$mes=null,$ano=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_actividad_usuario(opcion,usuario_admin,fecha,usuario1,usuario2,tipo_usuario,dia,mes,ano) values ('$opcion','$usuario_admin','$fecha','$usuario1','$usuario2','$tipo_usuario','$dia','$mes','$ano')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_resumen(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_resumen ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_resumen($opcion,$usuario_admin=null,$fecha=null,$dia=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_resumen(opcion,usuario_admin,fecha,dia,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$dia','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_duracion_transicion(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_duracion_transicion ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_duracion_transicion($opcion,$usuario_admin=null,$fecha=null,$tipo_usuario=null,$usuario=null,$transicion=null,$dia=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_duracion_transicion(opcion,usuario_admin,fecha,tipo_usuario,usuario,transicion,dia,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$tipo_usuario','$usuario','$transicion','$dia','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_duracion_workflow(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_duracion_workflow ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_duracion_workflow($opcion,$usuario_admin=null,$fecha=null,$tipo_usuario=null,$usuario=null,$workflow=null,$dia=null,$mes=null,$ano=null,$periodo_inicio=null,$periodo_fin=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_duracion_workflow(opcion,usuario_admin,fecha,tipo_usuario,usuario,workflow,dia,mes,ano,periodo_inicio,periodo_fin) values ('$opcion','$usuario_admin','$fecha','$tipo_usuario','$usuario','$workflow','$dia','$mes','$ano','$periodo_inicio','$periodo_fin')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
	public function cargar_indicador_ultimas(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM indicador_ultimas ORDER BY id DESC limit 1");
		if($query -> num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
	}
	public function guardar_indicador_ultimas($usuario_admin=null,$fecha=null,$rangoft=null,$rangotran=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO indicador_ultimas(usuario_admin,fecha,ultimas_instancias,ultimas_transiciones) values ('$usuario_admin','$fecha','$rangoft','$rangotran')");
		if($query)
        {
            return true;
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

	
	public function cargar_alarmas_transicion(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT * FROM alarmas_transicion");
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
		$data['superadmin'] = false;
		$query = $this->db->query("SELECT * FROM usuario WHERE id_usuario = '$usuario' AND contrasena = '$pass' AND id_tipo = 0");
		if($query -> num_rows() > 0)
        {
        	$data['usuario'] = $query->result_array()[0]['id_usuario'];
        	$data['tipo'] = 1;
        	$data['superadmin'] = true;
        	return $data;
        }
        else
        {
        	$this->db->db_select('dss');
        	$pass = md5($pass);
            $query = $this->db->query("SELECT * FROM usuarios WHERE username = '$usuario' AND contrasena = '$pass'");
			if($query -> num_rows() > 0)
	        {
	        	$data['usuario'] = $query->result_array()[0]['username'];
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
		if ($tipo=='all')
			return 'Todos';
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

	//devuelve el nombre del workflow
	public function nombreCategoria($cat){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT descripcion FROM categoria WHERE id_categoria =".$cat."";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array()[0]['descripcion'];

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
		$query_mas = "SELECT tran.nombre , COUNT(*) as cant FROM proceso AS pro INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro.id_transicion = tran.id_transicion WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) GROUP by (tran.id_transicion) ORDER BY (cant) DESC LIMIT 1";
		$query_menos = "SELECT tran.nombre , COUNT(*) as cant FROM proceso AS pro INNER JOIN (SELECT id_transicion,nombre FROM transicion) as tran on pro.id_transicion = tran.id_transicion WHERE (DATE(fecha) BETWEEN DATE(?) AND DATE(?)) GROUP by (tran.id_transicion) ORDER BY (cant) ASC LIMIT 1";
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
		$data['instancias'] = 0;
		$data['procesos'] = 0;
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
	public function alarmaMaxWorkflow($workflow,$instancia,$tipo_usuario,$usuario,$tiempo_max){
		$this->db->db_select('workflow');
		$tiempo_max = $tiempo_max*0.6;
		$data= array();
		$query = "SELECT instancia.id_instancia, TIMESTAMPDIFF(MINUTE, fecha_inicio, NOW()) as time, instancia.id_instancia as instancia, instancia.id_usuario as usuario,instancia.titulo as titulo,usuario.id_tipo as tipo_usuario FROM instancia INNER JOIN usuario ON instancia.id_usuario = usuario.id_usuario WHERE fecha_final IS NULL AND TIMESTAMPDIFF(MINUTE, fecha_inicio, NOW()) > $tiempo_max";
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
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	
            $data = $sql->result_array();
        }       	
       	return $data;       	
	}

	public function guardar_alarma_workflow($usuario_admin=null,$fecha,$nombre,$descripcion,$workflow=null,$instancia=null,$tipousuario=null,$usuario=null,$tiempo_max=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO alarmas_workflow(usuario_admin,fecha,nombre,descripcion,workflow,instancia,tipo_usuario,usuario,tiempo_max) values ('$usuario_admin','$fecha','$nombre','$descripcion','$workflow','$instancia','$tipousuario','$usuario','$tiempo_max')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function eliminar_alarma_workflow($id){
		$this->db->db_select('dss');
		$query = $this->db->query("DELETE FROM alarmas_workflow WHERE id = '$id'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	//calcula duracion de workflow por filtro
	public function alarmaMinWorkflow($workflow,$instancia,$tipo_usuario,$usuario,$tiempo_min){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT instancia.id_instancia, TIMESTAMPDIFF(MINUTE, fecha_inicio, fecha_final) as time, instancia.id_instancia as instancia, instancia.id_usuario as usuario,instancia.titulo as titulo,usuario.id_tipo as tipo_usuario FROM instancia INNER JOIN usuario ON instancia.id_usuario = usuario.id_usuario WHERE fecha_final IS NOT NULL AND TIMESTAMPDIFF(MINUTE, fecha_inicio, fecha_final)<$tiempo_min";
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
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	
            $data = $sql->result_array();
        }       	
       	return $data;       	
	}

	//calcula duracion de workflow por filtro
	public function alarmaMaxTransicion($workflow,$instancia,$tipo_usuario,$usuario,$tiempo_max){
		$this->db->db_select('workflow');
		$tiempo_max = $tiempo_max*0.6;
		$trans = array();
		$i = 0;
		$query = "SELECT instancia.id_instancia,instancia.titulo FROM instancia where instancia.fecha_final is NULL";
		if ($workflow!= "all"){
			$query = $query." AND id_workflow = ".$workflow."";
		}
		if ($instancia!= "all"){
			$query = $query." AND id_instancia = ".$instancia."";
		}
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	
            $data = $sql->result_array();
            foreach ($data as $data) {
            	$value = $data['id_instancia'];
            	$query = "SELECT workflow.nombre, instancia.id_instancia, instancia.titulo,proceso.id_proceso,TIMESTAMPDIFF(MINUTE, proceso.fecha, NOW()) as time, estado.nombre as estado, proceso.descripcion, transicion.nombre as transicion,proceso.id_usuario,usuario.id_tipo, estado.final
					FROM proceso
					INNER JOIN transicion
					ON proceso.id_transicion = transicion.id_transicion
					INNER JOIN instancia
					ON proceso.id_instancia = instancia.id_instancia
					INNER JOIN workflow
					ON instancia.id_workflow = workflow.id_workflow
					INNER JOIN estado
					ON transicion.estado_siguiente = estado.id_estado 
					INNER JOIN usuario
					ON proceso.id_usuario = usuario.id_usuario
					WHERE proceso.id_instancia = $value AND TIMESTAMPDIFF(MINUTE, proceso.fecha, NOW()) > $tiempo_max";
				if ($usuario!= "all"){			
					$query = $query." AND proceso.id_usuario = '".$usuario."'";
				}
				if ($tipo_usuario!= "all"){
					$query = $query." AND usuario.id_tipo = ".$tipo_usuario."";
				}
				$query = $query." ORDER BY id_proceso DESC LIMIT 1";	
            	$sql = $this->db->query($query);
				if($sql -> num_rows() > 0)
		        {	
		            $result = $sql->result_array();
		            foreach ($result as $element) {
		            	if ($element['final']!="1"){
		            		$trans[$i++] = $element;
		            	}
		            }
		        }  
            }
        }       	
       	return $trans;       	
	}

	public function guardar_alarma_transicion($usuario_admin=null,$fecha,$nombre,$descripcion,$workflow=null,$instancia=null,$tipousuario=null,$usuario=null,$tiempo_max=null){
		$this->db->db_select('dss');
		$query = $this->db->query("INSERT INTO alarmas_transicion(usuario_admin,fecha,nombre,descripcion,workflow,instancia,tipo_usuario,usuario,tiempo_max) values ('$usuario_admin','$fecha','$nombre','$descripcion','$workflow','$instancia','$tipousuario','$usuario','$tiempo_max')");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function eliminar_alarma_transicion($id){
		$this->db->db_select('dss');
		$query = $this->db->query("DELETE FROM alarmas_transicion WHERE id = '$id'");
		if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	//devuelve categorias
	public function getCategorias(){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_categoria,descripcion FROM categoria";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve workflows
	public function getWorkflow(){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_workflow,nombre FROM workflow";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve workflows
	public function getTransicion($tipo){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT transicion.id_transicion,transicion.nombre,tipo_usuario.id_tipo FROM transicion INNER JOIN estado ON transicion.estado_asociado = estado.id_estado INNER JOIN tipo_usuario ON estado.id_tipo = tipo_usuario.id_tipo ";
		if ($tipo!='all'){
			$query = $query.' WHERE tipo_usuario.id_tipo= '.$tipo.'';
		}
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve workflows
	public function getInstancia($workflow){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_instancia,titulo FROM instancia";
		if ($workflow!='all')
			$query = $query.' WHERE id_workflow = '.$workflow.'';
		$query = $query.' order by id_instancia DESC ';
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve workflows
	public function getTipoUsuario(){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_tipo,descripcion FROM tipo_usuario";
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}

	//devuelve workflows
	public function getUsuario($tipo){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT id_usuario FROM usuario ";
		if ($tipo!='all')
			$query = $query.'WHERE id_tipo = '.$tipo.'';
		$sql = $this->db->query($query);
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();

        }		
		return $data;
	}
	//---------------------------------------- REPORTES PDF ----------------------------------------//
	//calcula la actividad transiciones en el periodo
	public function pdfTransicionesPeriodo($fecha_inicial,$fecha_final,$usuario = "all",$tipo_usuario = "all"){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT pro.id_proceso as proceso,ins.titulo as workflow, pro.id_usuario as usuario, trans.nombre as transicion, pro.fecha,tipo_usuario.id_tipo as id_tipo, tipo_usuario.descripcion as tipo_usuario FROM proceso as pro INNER JOIN instancia as ins ON pro.id_instancia = ins.id_instancia INNER JOIN transicion as trans ON pro.id_transicion = trans.id_transicion INNER JOIN usuario on pro.id_usuario = usuario.id_usuario INNER JOIN tipo_usuario ON usuario.id_tipo = tipo_usuario.id_tipo WHERE (DATE(pro.fecha) BETWEEN DATE(?) AND DATE(?)) ";
		if ($usuario != "all"){
			$query = $query.' AND pro.id_usuario = "'.$usuario.'" ';
		}
		if ($tipo_usuario!= "all"){
			$query = $query.' AND tipo_usuario.id_tipo = "'.$tipo_usuario.'"';
		}
		$query = $query.' ORDER BY pro.fecha ASC';
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();
        }		
		
		return $data;
	}


	//calcula la actividad flujos en el periodo
	public function pdfFlujosPeriodo($fecha_inicial,$fecha_final,$usuario = "all",$tipo_usuario = "all"){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT ins.id_instancia as instancia,wor.nombre as workflow,ins.id_usuario,tipo_usu.id_tipo,ins.titulo as nombre_instancia,ins.fecha_inicio as fecha FROM instancia as ins INNER JOIN workflow as wor ON ins.id_workflow = wor.id_workflow INNER JOIN usuario as usu ON ins.id_usuario = usu.id_usuario INNER JOIN tipo_usuario as tipo_usu ON usu.id_tipo = tipo_usu.id_tipo WHERE (DATE(ins.fecha_inicio) BETWEEN DATE(?) AND DATE(?)) ";
		if ($usuario != "all"){
			$query = $query.' AND ins.id_usuario = "'.$usuario.'" ';
		}
		if ($tipo_usuario!= "all"){
			$query = $query.' AND tipo_usu.id_tipo = "'.$tipo_usuario.'"';
		}
		$query = $query.' ORDER BY ins.fecha_inicio ASC';
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final));
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();
        }		
		return $data;
	}

	//calcula los procesos de una categoria en un periodo
	public function pdfCategoria($fecha_inicial,$fecha_final,$cat){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT * from instancia INNER join workflow on instancia.id_workflow = workflow.id_workflow INNER join categoria on workflow.id_categoria = categoria.id_categoria WHERE (DATE(instancia.fecha_inicio) BETWEEN (?) AND (?)) AND categoria.id_categoria = ?";
		$sql = $this->db->query($query, array($fecha_inicial,$fecha_final,$cat));
		if($sql -> num_rows() > 0)
        {	        	
            $data = $sql->result_array();
        }		
		return $data;
	}

	//calcula los procesos de una categoria en un periodo
	public function pdfDetalle($id_instancia){
		$cant = 0;
		$this->db->db_select('workflow');
		$data= array();
		$query_ins = "SELECT id_instancia,id_usuario,titulo,instancia.descripcion as descripcion_instancia,fecha_inicio,fecha_final,nombre,workflow.descripcion as descripcion_workflow, categoria.descripcion as categoria FROM instancia INNER JOIN workflow ON instancia.id_workflow = workflow.id_workflow INNER JOIN categoria ON workflow.id_categoria = categoria.id_categoria WHERE instancia.id_instancia = ? ";
		$sql = $this->db->query($query_ins, array($id_instancia));
		if($sql -> num_rows() > 0)
        {	        	
            $data['datos'] = $sql->result_array()[0];
        }		
        $query = "SELECT id_proceso,id_usuario,descripcion,fecha,nombre,nombre_estado_asociado,nombre_estado_siguiente from proceso
	inner join (select transicion.id_transicion,transicion.nombre,transicion.estado_asociado,transicion.estado_siguiente from transicion) as transi
	on proceso.id_transicion=transi.id_transicion
	inner join (select estado.id_estado, estado.nombre as nombre_estado_asociado from estado) as esta
	on transi.estado_asociado=esta.id_estado
	inner join (select estado.id_estado, estado.nombre as nombre_estado_siguiente from estado) as est
	on transi.estado_siguiente=est.id_estado
	where proceso.id_instancia= ?
	order by fecha ASC";
		$sql = $this->db->query($query, array($id_instancia));
		if($sql -> num_rows() > 0)
        {	        	
            $data['procesos'] = $sql->result_array();
        }
		return $data;
	}


	
}

/* End of file database.php */
/* Location: ./application/models/database.php */
