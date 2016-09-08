<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function cargar_preferencias(){
		$this->db->db_select('dss');
		$query = $this->db->query("SELECT actividad FROM preferencias");
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
		$query = "SELECT COUNT(id_proceso) as cant FROM proceso WHERE fecha BETWEEN ? AND ?";
		$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));		
		$i = 0;
		do {			
			$fecha_nueva = strtotime('+24 hour',strtotime($fecha_inicial));
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
}

/* End of file database.php */
/* Location: ./application/models/database.php */