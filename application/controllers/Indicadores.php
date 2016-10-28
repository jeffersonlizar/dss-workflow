<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores extends CI_Controller {

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
		$this->load->view('indicadores_vista','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	public function filtro($metodo,$dato){		
		if ($metodo=='workflow'){
			$values = $this->Database->getWorkflow();
		}
		if ($metodo=='instancia'){
			$values = $this->Database->getInstancia($dato);
		}
		if ($metodo=='tipousuario'){
			$values = $this->Database->getTipoUsuario();
		}
		if ($metodo=='usuario'){
			$values = $this->Database->getUsuario($dato);
		}
		echo json_encode($values);
	}

	public function actividad(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->library('indicadores_libreria');
		$actividad = $this->indicadores_libreria->indicador_actividad();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/actividad','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('actividad',$actividad, FALSE);
		
		$this->load->view('footerend','', FALSE);	
	}

	public function registrar_actividad(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtro = $this->input->post("filtro");
		$dia = $this->input->post("dia");
		$comparardias1 = $this->input->post("comparardias1");
		$comparardias2 = $this->input->post("comparardias2");
		$mesespecifico1 = $this->input->post("mesespecifico1");
		$mesespecifico2 = $this->input->post("mesespecifico2");
		$compararmeses1 = $this->input->post("compararmeses1");
		$compararmeses2 = $this->input->post("compararmeses2");
		$compararmeses3 = $this->input->post("compararmeses3");
		$compararmeses4 = $this->input->post("compararmeses4");
		$anoespecifico = $this->input->post("anoespecifico");
		$compararanos1 = $this->input->post("compararanos1");
		$compararanos2 = $this->input->post("compararanos2");
		if ((isset($dia))&&($dia!='')){
			$d = explode('/',$dia);
			$dia = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($comparardias1))&&($comparardias1!='')){
			$d = explode('/',$comparardias1);
			$comparardias1 = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($comparardias2))&&($comparardias2!='')){
			$d = explode('/',$comparardias2);
			$comparardias2 = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if (((isset($mesespecifico1))&&($mesespecifico1!=''))&&((isset($mesespecifico2))&&($mesespecifico2!=''))){
			$mes = $mesespecifico2.'/'.$mesespecifico1.'/01';
		}
		if (((isset($compararmeses1))&&($compararmeses1!=''))&&((isset($compararmeses2))&&($compararmeses2!=''))){
			$mes1 = $compararmeses2.'/'.$compararmeses1.'/01';
		}
		if (((isset($compararmeses3))&&($compararmeses3!=''))&&((isset($compararmeses4))&&($compararmeses4!=''))){
			$mes2 = $compararmeses4.'/'.$compararmeses3.'/01';
		}
		if ((isset($anoespecifico))&&($anoespecifico!='')){
			$ano = $anoespecifico.'/01/01';	
		}
		if ((isset($compararanos1))&&($compararanos1!='')){
			$ano1 = $compararanos1.'/01/01';	
		}
		if ((isset($compararanos2))&&($compararanos2!='')){
			$ano2 = $compararanos2.'/01/01';	
		}

		switch ($filtro) {
			case 'hoy':
				$bd = $this->database->guardar_indicador_actividad('1',$session_data['user'],$today);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_actividad('2',$session_data['user'],$today);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_actividad('3',$session_data['user'],$today,$dia);
				break;
			case 'comparardias':
				$bd = $this->database->guardar_indicador_actividad('4',$session_data['user'],$today,'',$comparardias1,$comparardias2);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_actividad('5',$session_data['user'],$today);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_actividad('6',$session_data['user'],$today,'','','',$mes);
				break;
			case 'compararmeses':
				$bd = $this->database->guardar_indicador_actividad('7',$session_data['user'],$today,'','','','',$mes1,$mes2);
				var_dump($bd);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_actividad('8',$session_data['user'],$today);
				var_dump($bd);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_actividad('9',$session_data['user'],$today,'','','','','','',$ano);
				break;
			case 'compararanos':
				$bd = $this->database->guardar_indicador_actividad('10',$session_data['user'],$today,'','','','','','','',$ano1,$ano2);
				break;
		}
		redirect('indicadores/actividad');
		


	}

}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */