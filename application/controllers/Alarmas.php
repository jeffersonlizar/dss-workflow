<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alarmas extends CI_Controller {

	public function index()
	{
		$alarma = array();
		$data = array();
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$data = $this->Database->cargar_alarmas_workflow();
		$cant = count($data);
		for ($i=0;$i<$cant;$i++){
			if ($data[$i]['tiempo_max']!='')
				$data[$i]['alarmas'] = $this->Database->alarmaMaxWorkflow($data[$i]['workflow'],$data[$i]['instancia'],$data[$i]['tipo_usuario'],$data[$i]['usuario']);
			else if ($data[$i]['tiempo_min']!='')
				$data[$i]['alarmas'] = $this->Database->alarmaMinWorkflow($data[$i]['workflow'],$data[$i]['instancia'],$data[$i]['tipo_usuario'],$data[$i]['usuario']);
		}
		$header = array(
			'session'=>$session_data
		);
		$contenido = array(
			'data'		=>$data
		);
		$this->load->view('header',$header, FALSE);
		$this->load->view('alarmas',$contenido, FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
		$this->load->view('alarma',$contenido, FALSE);	
	}

}

/* End of file Alarmas.php */
/* Location: ./application/controllers/Alarmas.php */
