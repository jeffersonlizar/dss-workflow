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
	
	//calcula la actividad de un dia por rangos de 1 hora
	public function actividadDia($fecha_inicial){
		$this->db->db_select('workflow');
		$data= array();
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE fecha BETWEEN ? AND ?";
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
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE DATE(fecha) BETWEEN DATE(?) AND DATE(?)";
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
		$query_total_realizados = "SELECT * FROM proceso AS pro1 INNER JOIN proceso AS pro2 ON DATE(pro1.fecha)<=DATE(pro2.fecha) WHERE pro1.id_instancia=pro2.id_instancia AND pro1.id_proceso!=pro2.id_proceso AND (DATE(pro1.fecha) BETWEEN DATE(?) AND DATE(?)) AND (DATE(pro2.fecha) BETWEEN DATE(?) AND DATE(?)) AND (TIME(pro1.fecha)<TIME(pro2.fecha)) GROUP BY pro1.id_proceso";
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
}

/* End of file database.php */
/* Location: ./application/models/database.php */
