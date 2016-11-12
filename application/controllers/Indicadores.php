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

		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
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
		if ($metodo=='transicion'){
			$values = $this->Database->getTransicion($dato);
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
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);

		$this->load->library('indicadores_libreria');
		$actividad = $this->indicadores_libreria->indicador_actividad();


		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/actividad','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
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
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);

		$this->load->library('indicadores_libreria');
		$indicadores = $this->indicadores_libreria->indicador_indicadores();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/indicador','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
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
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);

		$this->load->library('indicadores_libreria');
		$categoria = $this->indicadores_libreria->indicador_categoria();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/categoria','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
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
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');
		$crecimiento = $this->indicadores_libreria->indicador_crecimiento();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/crecimiento','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('crecimiento',$crecimiento, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/actividad_usuario
	public function actividad_usuario(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');
		$actividad_user = $this->indicadores_libreria->indicador_actividad_usuario();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/actividad_usuario','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('actividad_usuario',$actividad_user, FALSE);
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/tiempo_promedio
	public function tiempo_promedio(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');
		$tiempo_promedio = $this->indicadores_libreria->indicador_tiempo_promedio();
		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/tiempo_promedio','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('tiempo_promedio',$tiempo_promedio, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/resumen
	public function resumen(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');

		$resumen = $this->indicadores_libreria->indicador_resumen();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/resumen','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('resumen',$resumen, FALSE);
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/ultimas
	public function ultimas(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');

		$ultimas = $this->indicadores_libreria->indicador_ultimas();

		$home = array(
			'ultimas_instancias'=>$ultimas['ultimas_instancias'],
			'ultimas_transiciones'=>$ultimas['ultimas_transiciones']
		);

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/ultimas',$home, FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('ultimas_instancias_transiciones',$ultimas['ultimas_instancias_transiciones'], FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/duracion_transicion
	public function duracion_transicion(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');

		$duracion_transicion = $this->indicadores_libreria->indicador_duracion_transicion();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/duracion_transicion','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('duracion_transicion',$duracion_transicion, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//vista indicadores/duracion_flujos
	public function duracion_flujos(){
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$header = array(
			'session'=>$session_data
		);
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		
		$this->load->library('indicadores_libreria');

		$duracion_workflow = $this->indicadores_libreria->indicador_duracion_workflow();

		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/duracion_flujos','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('duracion_workflow',$duracion_workflow, FALSE);	
		$this->load->view('footerend','', FALSE);	
	}


	private function _guardadoExitosamente(){
		$this->session->set_flashdata('titulo', 'Registrado Exitosamente');
		$this->session->set_flashdata('contenido', 'Se ha registrado el indicador exitosamente.');
	}
	private function _guardadonoExitosamente(){
		$this->session->set_flashdata('titulo', 'Error al registrar');
		$this->session->set_flashdata('contenido', 'Se ha producido un error al registrar el indicador.');
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
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_actividad('9',$session_data['user'],$today,'','','','','','',$ano);
				break;
			case 'compararanos':
				$bd = $this->database->guardar_indicador_actividad('10',$session_data['user'],$today,'','','','','','','',$ano1,$ano2);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
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
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_indicadores('7',$session_data['user'],$today,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_indicadores('8',$session_data['user'],$today,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
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
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_categoria('7',$session_data['user'],$today,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_categoria('8',$session_data['user'],$today,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
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
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/crecimiento');

	}

	//guardar en la bd el nuevo indicador crecimiento
	public function registrar_actividad_usuario(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtro = $this->input->post("filtro");
		$filtrotipo = $this->input->post("filtrotipo");
		$tipousuario1 = $this->input->post("tipousuario1");
		$usuario1 = $this->input->post("usuario1");
		$tipousuario2 = $this->input->post("tipousuario2");
		$usuario2 = $this->input->post("usuario2");
		$dia = $this->input->post("dia");
		$mesespecifico1 = $this->input->post("mesespecifico1");
		$mesespecifico2 = $this->input->post("mesespecifico2");
		$anoespecifico = $this->input->post("anoespecifico");
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
		switch ($filtro) {
			case 'hoy':
				$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'1'),$session_data['user'],$today,$usuario1,'',$tipousuario1);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'2'),$session_data['user'],$today,$usuario1,'',$tipousuario1);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'3'),$session_data['user'],$today,$usuario1,'',$tipousuario1,$dia);
				break;
			case 'diacomparativo':
				$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'4'),$session_data['user'],$today,$usuario1,$usuario2,'',$dia);
				break;
			case 'diatipousuario':
				if ($tipousuario1!='all')
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'5'),$session_data['user'],$today,'','',$tipousuario1,$dia);	
				else
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'6'),$session_data['user'],$today,'','','',$dia);	
				break;
			case 'mesactual':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'7'),$session_data['user'],$today,$usuario1,'',$tipousuario1);
				break;
			case 'mesespecifico':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'8'),$session_data['user'],$today,$usuario1,'',$tipousuario1,'',$mes);
				break;
			case 'mesespecificocomparativo':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'9'),$session_data['user'],$today,$usuario1,$usuario2,'','',$mes);
				break;
			case 'mesespecificotipousuario':
				if ($tipousuario1!='all')
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'10'),$session_data['user'],$today,'','',$tipousuario1,'',$mes);	
				else
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'11'),$session_data['user'],$today,'','','','',$mes);	
				break;
			case 'anoactual':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'12'),$session_data['user'],$today,$usuario1,'',$tipousuario1);
				break;
			case 'anoespecifico':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'13'),$session_data['user'],$today,$usuario1,'',$tipousuario1,'','',$ano);
				break;
			case 'anoespecificocomparativo':
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'14'),$session_data['user'],$today,$usuario1,$usuario2,'','','',$ano);
				break;
			case 'anoespecificotipousuario':
				if ($tipousuario1!='all')
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'15'),$session_data['user'],$today,'','',$tipousuario1,'','',$ano);	
				else
					$bd = $this->database->guardar_indicador_actividad_usuario(($filtrotipo.'16'),$session_data['user'],$today,'','','','','',$ano);	
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/actividad_usuario');

	}


	//guardar en la bd el nuevo indicador indicadores
	public function registrar_tiempo_promedio(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$filtrotipo = $this->input->post("filtrotipo");
		$filtro = $this->input->post("filtro");
		$mesespecifico1 = $this->input->post("mesespecifico1");
		$mesespecifico2 = $this->input->post("mesespecifico2");
		$anoespecifico = $this->input->post("anoespecifico");
		$periodo_inicio = $this->input->post("periodo_inicio");
		$periodo_fin = $this->input->post("periodo_fin");
		
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
			case 'mesactual':
				$bd = $this->database->guardar_indicador_tiempo_promedio(($filtrotipo.'1'),$session_data['user'],$today);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_tiempo_promedio(($filtrotipo.'2'),$session_data['user'],$today,$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_tiempo_promedio(($filtrotipo.'3'),$session_data['user'],$today);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_tiempo_promedio(($filtrotipo.'4'),$session_data['user'],$today,'',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_tiempo_promedio(($filtrotipo.'5'),$session_data['user'],$today,'','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/tiempo_promedio');

	}

	//guardar en la bd el nuevo indicador resumen
	public function registrar_resumen(){
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
				$bd = $this->database->guardar_indicador_resumen('1',$session_data['user'],$today);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_resumen('2',$session_data['user'],$today);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_resumen('3',$session_data['user'],$today,$dia);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_resumen('4',$session_data['user'],$today);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_resumen('5',$session_data['user'],$today,'',$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_resumen('6',$session_data['user'],$today);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_resumen('7',$session_data['user'],$today,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_resumen('8',$session_data['user'],$today,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/resumen');

	}

	//guardar en la bd el nuevo indicador resumen
	public function registrar_ultimas(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$rangoft = $this->input->post("rangoft");
		$rangotran = $this->input->post("rangotran");
		$bd = $this->database->guardar_indicador_ultimas($session_data['user'],$today,$rangoft,$rangotran);
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/ultimas');
	}


	//guardar en la bd el nuevo indicador duracion flujos
	public function registrar_duracion_flujos(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$tipousuario = $this->input->post("tipousuario");
		$usuario = $this->input->post("usuario");
		$workflow = $this->input->post("workflow");
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
		if (((isset($compararmeses1))&&($compararmeses1!=''))&&((isset($compararmeses2))&&($compararmeses2!=''))){
			$mes1 = $compararmeses2.'/'.$compararmeses1.'/01';
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
				$bd = $this->database->guardar_indicador_duracion_workflow('1',$session_data['user'],$today,$tipousuario,$usuario,$workflow);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_duracion_workflow('2',$session_data['user'],$today,$tipousuario,$usuario,$workflow);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_duracion_workflow('3',$session_data['user'],$today,$tipousuario,$usuario,$workflow,$dia);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_duracion_workflow('4',$session_data['user'],$today,$tipousuario,$usuario,$workflow);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_duracion_workflow('5',$session_data['user'],$today,$tipousuario,$usuario,$workflow,'',$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_duracion_workflow('6',$session_data['user'],$today,$tipousuario,$usuario,$workflow);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_duracion_workflow('7',$session_data['user'],$today,$tipousuario,$usuario,$workflow,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_duracion_workflow('8',$session_data['user'],$today,$tipousuario,$usuario,$workflow,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/duracion_flujos');

	}


	//guardar en la bd el nuevo indicador duracion transicion
	public function registrar_duracion_transicion(){
		$this->load->model('database', '', true);
		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$tipousuario = $this->input->post("tipousuario");
		$usuario = $this->input->post("usuario");
		$transicion = $this->input->post("transicion");
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
		if (((isset($compararmeses1))&&($compararmeses1!=''))&&((isset($compararmeses2))&&($compararmeses2!=''))){
			$mes1 = $compararmeses2.'/'.$compararmeses1.'/01';
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
				$bd = $this->database->guardar_indicador_duracion_transicion('1',$session_data['user'],$today,$tipousuario,$usuario,$transicion);
				break;
			case 'ayer':
				$bd = $this->database->guardar_indicador_duracion_transicion('2',$session_data['user'],$today,$tipousuario,$usuario,$transicion);
				break;
			case 'dia':
				$bd = $this->database->guardar_indicador_duracion_transicion('3',$session_data['user'],$today,$tipousuario,$usuario,$transicion,$dia);
				break;
			case 'mesactual':
				$bd = $this->database->guardar_indicador_duracion_transicion('4',$session_data['user'],$today,$tipousuario,$usuario,$transicion);
				break;
			case 'mesespecifico':
				$bd = $this->database->guardar_indicador_duracion_transicion('5',$session_data['user'],$today,$tipousuario,$usuario,$transicion,'',$mes);
				break;
			case 'anoactual':
				$bd = $this->database->guardar_indicador_duracion_transicion('6',$session_data['user'],$today,$tipousuario,$usuario,$transicion);
				break;
			case 'anoespecifico':
				$bd = $this->database->guardar_indicador_duracion_transicion('7',$session_data['user'],$today,$tipousuario,$usuario,$transicion,'','',$ano);
				break;
			case 'periodo':
				$bd = $this->database->guardar_indicador_duracion_transicion('8',$session_data['user'],$today,$tipousuario,$usuario,$transicion,'','','',$periodo_inicio,$periodo_fin);
				break;
		}
		if ($bd == true){
			$this->_guardadoExitosamente();
		}
		else{
			$this->_guardadonoExitosamente();
		}	
		redirect('indicadores/duracion_transicion');

	}



}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */