<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alarmas extends CI_Controller {

	public function index()
	{
		$alarma = array();
		$data = array();
		$data_trans = array();
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$data = $this->Database->cargar_alarmas_workflow();
		$cant = count($data);
		for ($i=0;$i<$cant;$i++){
			if ($data[$i]['tiempo_max']!='')
				$data[$i]['alarmas'] = $this->Database->alarmaMaxWorkflow($data[$i]['workflow'],$data[$i]['instancia'],$data[$i]['tipo_usuario'],$data[$i]['usuario'],$data[$i]['tiempo_max']);
		}
		$data_trans = $this->Database->cargar_alarmas_transicion();
		$cant = count($data_trans);
		for ($i=0;$i<$cant;$i++){
			if ($data_trans[$i]['tiempo_max']!='')
				$data_trans[$i]['alarmas'] = $this->Database->alarmaMaxTransicion($data_trans[$i]['workflow'],$data_trans[$i]['instancia'],$data_trans[$i]['tipo_usuario'],$data_trans[$i]['usuario'],$data_trans[$i]['tiempo_max']);
		}
		$header = array(
			'session'=>$session_data
		);
		$vista = array(
			'data'				=>$data,
			'data_trans'		=>$data_trans
		);
		$contenido = array(
			'data'		=>$data
		);
		$contenido_trans = array(
			'data_trans'		=>$data_trans
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);

		$this->load->view('header',$header, FALSE);
		$this->load->view('alarmas',$vista, FALSE);
		$this->load->view('footerbegin',$modal, FALSE);			
		$this->load->view('alarma_workflow',$contenido, FALSE);	
		$this->load->view('alarma_transicion',$contenido_trans, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	private function _guardadaExitosamente(){
		$this->session->set_flashdata('titulo', 'Registrada Exitosamente');
		$this->session->set_flashdata('contenido', 'Se ha registrado la alarma exitosamente.');
	}
	private function _guardadanoExitosamente(){
		$this->session->set_flashdata('titulo', 'Error al registrar');
		$this->session->set_flashdata('contenido', 'Se ha producido un error al registrar la alarma.');
	}

	//guardar en la bd el nuevo indicador actividad
	public function registrar_alarma(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$tipo = $this->input->post("tipo");
		$tipousuario = $this->input->post("tipousuario");
		$usuario = $this->input->post("usuario");
		$workflow = $this->input->post("workflow");
		$instancia = $this->input->post("instancia");
		$rangotran = $this->input->post("rangotran");
		$rangotran = $rangotran*1440; //1440 es 1 dia en minutos
		
		switch ($tipo) {
			case '1':
				$bd = $this->database->guardar_alarma_workflow($session_data['user'],$today,$nombre,$descripcion,$workflow,$instancia,$tipousuario,$usuario,$rangotran);
				break;
			case '2':
				$bd = $this->database->guardar_alarma_transicion($session_data['user'],$today,$nombre,$descripcion,$workflow,$instancia,$tipousuario,$usuario,$rangotran);
				break;
		}
		if ($bd == true){
			$this->_guardadaExitosamente();
		}
		else{
			$this->_guardadanoExitosamente();
		}	
		redirect('alarmas');

	}

	public function eliminar_alarma(){		
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$tipo = $this->input->post("tipo");
		$id = $this->input->post("id");
		switch ($tipo) {
			case '1':
				$bd = $this->database->eliminar_alarma_workflow($id);
				break;
			case '2':
				$bd = $this->database->eliminar_alarma_transicion($id);
				break;
		}
		redirect('alarmas');
	}


}




/* End of file Alarmas.php */
/* Location: ./application/controllers/Alarmas.php */
