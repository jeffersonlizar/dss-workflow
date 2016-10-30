<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');	
		if (!isset($session_data)){
			redirect('usuarios/login');
		}
		

		
		$this->load->library('indicadores_libreria');
		
		$actividad = $this->indicadores_libreria->indicador_actividad();
		$categoria = $this->indicadores_libreria->indicador_categoria();
		$indicadores = $this->indicadores_libreria->indicador_indicadores();
		$crecimiento = $this->indicadores_libreria->indicador_crecimiento();
		$tiempo_promedio = $this->indicadores_libreria->indicador_tiempo_promedio();
		$actividad_user = $this->indicadores_libreria->indicador_actividad_usuario();
		$resumen = $this->indicadores_libreria->indicador_resumen();
		$duracion_transicion = $this->indicadores_libreria->indicador_duracion_transicion();
		$duracion_workflow = $this->indicadores_libreria->indicador_duracion_workflow();
		$ultimas = $this->indicadores_libreria->indicador_ultimas();
		
		
		$home = array(
			'ultimas_instancias'=>$ultimas['ultimas_instancias'],
			'ultimas_transiciones'=>$ultimas['ultimas_transiciones']
		);

		$header = array(
			'session'=>$session_data
		);

		$this->load->view('header',$header, FALSE);	
		$this->load->view('home',$home, FALSE);	
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('actividad',$actividad, FALSE);	
		$this->load->view('categoria',$categoria, FALSE);	

		$this->load->view('indicadores',$indicadores, FALSE);	
		$this->load->view('crecimiento',$crecimiento, FALSE);	
		$this->load->view('tiempo_promedio',$tiempo_promedio, FALSE);	
		$this->load->view('actividad_usuario',$actividad_user, FALSE);							
		$this->load->view('ultimas_instancias_transiciones',$ultimas['ultimas_instancias_transiciones'], FALSE);	
		$this->load->view('resumen',$resumen, FALSE);	
		$this->load->view('duracion_transicion',$duracion_transicion, FALSE);	
		$this->load->view('duracion_workflow',$duracion_workflow, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */



