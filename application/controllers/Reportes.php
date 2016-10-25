<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->view('header',$header, FALSE);
		$this->load->view('reportes','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);
	}

	//calcula la actividad transicionces en el periodo
	private function _actividadTransiciones($fecha_inicial,$fecha_final){		
		$data = $this->Database->pdfTransicionesPeriodo($fecha_inicial,$fecha_final);
		return $data;
	}

	public function reporte_actividad_transiciones($fecha_inicial,$fecha_final){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final);
		date_default_timezone_set('America/La_Paz');
		$fecha = date('d-m-Y');
		$hora = date('h:i:s A');
		$date = new DateTime($fecha_inicial);
		$fecha_inicial = date_format($date,'d-m-Y');
		$date = new DateTime($fecha_final);
		$fecha_final = date_format($date,'d-m-Y');
		$data = array(
			'fecha'			=>$fecha,
			'hora'			=>$hora,
			'usuario'		=>$session_data['user'],
			'fecha_inicial'	=>$fecha_inicial,
			'fecha_final'	=>$fecha_final,			
			'data'			=>$actividad
		);
		$this->load->view('pdf/actividad_transiciones',$data, FALSE);
	}

	//calcula la actividad flujos en el periodo
	private function _actividadFlujos($fecha_inicial,$fecha_final){		
		$data = $this->Database->pdfFlujosPeriodo($fecha_inicial,$fecha_final);
		return $data;
	}
	public function reporte_actividad_flujos($fecha_inicial,$fecha_final){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final);
		date_default_timezone_set('America/La_Paz');
		$fecha = date('d-m-Y');
		$hora = date('h:i:s A');
		$date = new DateTime($fecha_inicial);
		$fecha_inicial = date_format($date,'d-m-Y');
		$date = new DateTime($fecha_final);
		$fecha_final = date_format($date,'d-m-Y');
		$data = array(
			'fecha'			=>$fecha,
			'hora'			=>$hora,
			'usuario'		=>$session_data['user'],
			'fecha_inicial'	=>$fecha_inicial,
			'fecha_final'	=>$fecha_final,			
			'data'			=>$actividad
		);
		$this->load->view('pdf/actividad_flujos',$data, FALSE);
	}

}

/* End of file Reportes.php */
/* Location: ./application/controllers/Reportes.php */