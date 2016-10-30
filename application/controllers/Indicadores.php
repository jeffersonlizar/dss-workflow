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

	//ajax filtro 
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

	//vista indicadores/actividad
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

	//vista indicadores/indicador
	public function indicador(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->library('indicadores_libreria');
		$indicadores = $this->indicadores_libreria->indicador_indicadores();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/indicador','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('indicadores',$indicadores, FALSE);
		
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/categoria
	public function categoria(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->library('indicadores_libreria');
		$categoria = $this->indicadores_libreria->indicador_categoria();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/categoria','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('categoria',$categoria, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/crecimiento
	public function crecimiento(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->library('indicadores_libreria');
		$crecimiento = $this->indicadores_libreria->indicador_crecimiento();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/crecimiento','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('crecimiento',$crecimiento, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/crecimiento
	public function actividad_usuario(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$this->load->library('indicadores_libreria');
		$actividad_user = $this->indicadores_libreria->indicador_actividad_usuario();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/actividad_usuario','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('actividad_usuario',$actividad_user, FALSE);
		$this->load->view('footerend','', FALSE);	
	}

	//guardar en la bd el nuevo indicador actividad
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

	//guardar en la bd el nuevo indicador indicadores
	public function registrar_indicadores(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtro = $this->input->post("filtro");
		$dia = $this->input->post("dia");
		$mesespecifico1 = $this->input->post("mesespecifico1");
		$mesespecifico2 = $this->input->post("mesespecifico2");
		$anoespecifico = $this->input->post("anoespecifico");
		$periodo_inicio = $this->input->post("periodo_inicio");
		$periodo_fin = $this->input->post("periodo_fin");
		if ((isset($dia))&&($dia!='')){
			$d = explode('/',$dia);
			$dia = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		
		if (((isset($mesespecifico1))&&($mesespecifico1!=''))&&((isset($mesespecifico2))&&($mesespecifico2!=''))){
			$mes = $mesespecifico2.'/'.$mesespecifico1.'/01';
		}
		if ((isset($anoespecifico))&&($anoespecifico!='')){
			$ano = $anoespecifico.'/01/01';	
		}
		if ((isset($periodo_inicio))&&($periodo_inicio!='')){
			$d = explode('/',$periodo_inicio);
			$periodo_inicio = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($periodo_fin))&&($periodo_fin!='')){
			$d = explode('/',$periodo_fin);
			$periodo_fin = $d[2].'/'.$d[1].'/'.$d[0];	
		}

		switch ($filtro) {
			case 'hoy':
				$bd = $this->database->guardar_indicador_indicadores('1',$session_data['user'],$today);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_indicadores('2',$session_data['user'],$today);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_indicadores('3',$session_data['user'],$today,$dia);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_indicadores('4',$session_data['user'],$today);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_indicadores('5',$session_data['user'],$today,'',$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_indicadores('6',$session_data['user'],$today);
				var_dump($bd);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_indicadores('7',$session_data['user'],$today,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_indicadores('8',$session_data['user'],$today,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		redirect('indicadores/indicador');

	}

	//guardar en la bd el nuevo indicador categoria
	public function registrar_categoria(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtro = $this->input->post("filtro");
		$dia = $this->input->post("dia");
		$mesespecifico1 = $this->input->post("mesespecifico1");
		$mesespecifico2 = $this->input->post("mesespecifico2");
		$anoespecifico = $this->input->post("anoespecifico");
		$periodo_inicio = $this->input->post("periodo_inicio");
		$periodo_fin = $this->input->post("periodo_fin");
		if ((isset($dia))&&($dia!='')){
			$d = explode('/',$dia);
			$dia = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		
		if (((isset($mesespecifico1))&&($mesespecifico1!=''))&&((isset($mesespecifico2))&&($mesespecifico2!=''))){
			$mes = $mesespecifico2.'/'.$mesespecifico1.'/01';
		}
		if ((isset($anoespecifico))&&($anoespecifico!='')){
			$ano = $anoespecifico.'/01/01';	
		}
		if ((isset($periodo_inicio))&&($periodo_inicio!='')){
			$d = explode('/',$periodo_inicio);
			$periodo_inicio = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($periodo_fin))&&($periodo_fin!='')){
			$d = explode('/',$periodo_fin);
			$periodo_fin = $d[2].'/'.$d[1].'/'.$d[0];	
		}

		switch ($filtro) {
			case 'hoy':
				$bd = $this->database->guardar_indicador_categoria('1',$session_data['user'],$today);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_categoria('2',$session_data['user'],$today);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_categoria('3',$session_data['user'],$today,$dia);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_categoria('4',$session_data['user'],$today);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_categoria('5',$session_data['user'],$today,'',$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_categoria('6',$session_data['user'],$today);
				var_dump($bd);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_categoria('7',$session_data['user'],$today,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_categoria('8',$session_data['user'],$today,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		redirect('indicadores/categoria');

	}

	//guardar en la bd el nuevo indicador crecimiento
	public function registrar_crecimiento(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtro = $this->input->post("filtro");
		$filtrotipo = $this->input->post("filtrotipo");
		$dia = $this->input->post("dia");
		$periodo1_inicio = $this->input->post("periodo1_inicio");
		$periodo1_fin = $this->input->post("periodo1_fin");
		$periodo2_inicio = $this->input->post("periodo2_inicio");
		$periodo2_fin = $this->input->post("periodo2_fin");
		if ((isset($periodo1_inicio))&&($periodo1_inicio!='')){
			$d = explode('/',$periodo1_inicio);
			$periodo1_inicio = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($periodo1_fin))&&($periodo1_fin!='')){
			$d = explode('/',$periodo1_fin);
			$periodo1_fin = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($periodo2_inicio))&&($periodo2_inicio!='')){
			$d = explode('/',$periodo2_inicio);
			$periodo2_inicio = $d[2].'/'.$d[1].'/'.$d[0];	
		}
		if ((isset($periodo2_fin))&&($periodo2_fin!='')){
			$d = explode('/',$periodo2_fin);
			$periodo2_fin = $d[2].'/'.$d[1].'/'.$d[0];	
		}

		switch ($filtro) {
			case 'crecimiento-hoy-ayer':
				$bd = $this->database->guardar_indicador_crecimiento(($filtrotipo.'1'),$session_data['user'],$today);
				break;
			case 'crecimiento-mactual-manterior':
				$bd = $this->database->guardar_indicador_crecimiento(($filtrotipo.'2'),$session_data['user'],$today);
				break;
			case 'crecimiento-aactual-aanterior':
				$bd = $this->database->guardar_indicador_crecimiento(($filtrotipo.'3'),$session_data['user'],$today);
				break;
			case 'crecimiento-periodos':
				$bd = $this->database->guardar_indicador_crecimiento(($filtrotipo.'4'),$session_data['user'],$today,$periodo2_inicio,$periodo2_fin,$periodo1_inicio,$periodo1_fin);
				break;
		}
		redirect('indicadores/crecimiento');

	}



}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */