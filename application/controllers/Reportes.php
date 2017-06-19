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
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		$this->load->view('header',$header, FALSE);
		$this->load->view('reportes','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);
	}

	//vista reportes/actividad
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

		$this->load->view('header',$header, FALSE);
		$this->load->view('pdf/actividad','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		
		$this->load->view('footerend','', FALSE);	
	}


	//vista reportes/categoria
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

		$this->load->view('header',$header, FALSE);
		$this->load->view('pdf/categoria','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		
		$this->load->view('footerend','', FALSE);	
	}

	//vista reportes/detalle
	public function detalle(){
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

		$this->load->view('header',$header, FALSE);
		$this->load->view('pdf/detalle','', FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		
		$this->load->view('footerend','', FALSE);	
	}

	//calcula la actividad transicionces en el periodo
	private function _actividadTransiciones($fecha_inicial,$fecha_final,$usuario='all',$tipo_usuario = 'all'){		
		$data = $this->Database->pdfTransicionesPeriodo($fecha_inicial,$fecha_final,$usuario,$tipo_usuario);
		return $data;
	}


	//calcula la actividad flujos en el periodo
	private function _actividadFlujos($fecha_inicial,$fecha_final,$usuario='all',$tipo_usuario = 'all'){		
		$data = $this->Database->pdfFlujosPeriodo($fecha_inicial,$fecha_final,$usuario,$tipo_usuario);
		return $data;
	}
	
	//calcula el dia anterior
	private function _diaAnterior($dia){
		strtotime($dia);
		$fecha_nueva = strtotime('-24 hour',strtotime($dia));
		$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
		return $fecha_nueva;
	}
		
	//crear el pdf de actividad
	public function pdf_actividad(){
		$actividad = '';
		$this->load->model('database', '', true);
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}

		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$d = new DateTime('first day of this month');
    	$mes_actual = $d->format('Y-m-d 00:00:00');
    	$mes_actual_primer_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of this month');
    	$mes_actual_ultimo_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('first day of last month');
    	$mes_anterior_primer_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of last month');
    	$mes_anterior_ultimo_dia = $d->format('Y-m-d 00:00:00');
    	$ano_actual = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$ano_actual_primer_dia = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$ano_actual_ultimo_dia = date('Y-m-d 00:00:00',strtotime(date('Y-12-31')));
    	$ano_anterior_primer_dia = strtotime('-1 year',strtotime($ano_actual_primer_dia));
		$ano_anterior_primer_dia = date('Y-m-d H:i:s' ,$ano_anterior_primer_dia);
		$ano_anterior_ultimo_dia = strtotime('-1 year',strtotime($ano_actual_ultimo_dia));
		$ano_anterior_ultimo_dia = date('Y-m-d H:i:s' ,$ano_anterior_ultimo_dia);

		$filtro = $this->input->post("filtro");
		$filtrotipo = $this->input->post("filtrotipo");
		$tipousuario = $this->input->post("tipousuario");
		$usuario = $this->input->post("usuario");
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
				$fecha_inicial = $today;
				$fecha_final = $today;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'ayer':
				$fecha_inicial = $this->_diaAnterior($today);
				$fecha_final = $this->_diaAnterior($today);
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'dia':
				$fecha_inicial = $dia;
				$fecha_final = $dia;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'diatipousuario':
				$fecha_inicial = $dia;
				$fecha_final = $dia;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				$usuario = 'Todos';
				break;
			case 'mesactual':
				$fecha_inicial = $mes_actual_primer_dia;
				$fecha_final = $mes_actual_ultimo_dia;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'mesespecifico':
				$fecha_inicial = $mes;
				$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'mesespecificotipousuario':
				$fecha_inicial = $mes;
				$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				$usuario = 'Todos';
				break;
			case 'anoactual':
				$fecha_inicial = $ano_actual_primer_dia;
				$fecha_final = $ano_actual_ultimo_dia;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;					
			case 'anoespecifico':
				$fecha_inicial = $ano;
				$fecha_final = strtotime ('+1 year',strtotime($ano));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'anoespecificotipousuario':
				$fecha_inicial = $ano;
				$fecha_final = strtotime ('+1 year',strtotime($ano));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				$usuario = 'Todos';
				break;
			case 'periodo':
				$fecha_inicial = $periodo_inicio;
				$fecha_final = $periodo_fin;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,$usuario,$tipousuario);
				}
				break;
			case 'periodotipousuario':
				$fecha_inicial = $periodo_inicio;
				$fecha_final = $periodo_fin;
				if ($filtrotipo=='1'){
					$actividad = $this->_actividadFlujos($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				else{
					$actividad = $this->_actividadTransiciones($fecha_inicial,$fecha_final,'all',$tipousuario);
				}
				$usuario = 'Todos';
				break;
		}

		$nombre_tipo_usuario = $this->database->nombreTipoUsuario($tipousuario);	
		if ($filtrotipo=='1'){
			
			date_default_timezone_set('America/La_Paz');
			$fecha = date('d-m-Y');
			$hora = date('h:i:s A');
			$date = new DateTime($fecha_inicial);
			$fecha_inicial = date_format($date,'d-m-Y');
			$date = new DateTime($fecha_final);
			$fecha_final = date_format($date,'d-m-Y');
			$data = array(
				'fecha'					=>$fecha,
				'hora'					=>$hora,
				'usuario'				=>$session_data['user'],
				'fecha_inicial'			=>$fecha_inicial,
				'fecha_final'			=>$fecha_final,			
				'usuario_filtro'		=>$usuario,			
				'tipousuario_filtro'	=>$nombre_tipo_usuario,			
				'data'					=>$actividad
			);
			$this->load->view('pdf/reporte_actividad_flujos',$data, FALSE);		
		}
		else{
			date_default_timezone_set('America/La_Paz');
			$fecha = date('d-m-Y');
			$hora = date('h:i:s A');
			$date = new DateTime($fecha_inicial);
			$fecha_inicial = date_format($date,'d-m-Y');
			$date = new DateTime($fecha_final);
			$fecha_final = date_format($date,'d-m-Y');
			$data = array(
				'fecha'					=>$fecha,
				'hora'					=>$hora,
				'usuario'				=>$session_data['user'],
				'fecha_inicial'			=>$fecha_inicial,
				'fecha_final'			=>$fecha_final,
				'usuario_filtro'		=>$usuario,			
				'tipousuario_filtro'	=>$nombre_tipo_usuario,						
				'data'					=>$actividad
			);

			$this->load->view('pdf/reporte_actividad_transiciones',$data, FALSE);	
		}
		
	}


	//crear el pdf de categoria
	public function pdf_categoria(){
		$categoria = '';
		$this->load->model('database', '', true);
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}

		date_default_timezone_set('America/La_Paz');
		$today = date('Y-m-d H:i:s'); 
		$d = new DateTime('first day of this month');
    	$mes_actual = $d->format('Y-m-d 00:00:00');
    	$mes_actual_primer_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of this month');
    	$mes_actual_ultimo_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('first day of last month');
    	$mes_anterior_primer_dia = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of last month');
    	$mes_anterior_ultimo_dia = $d->format('Y-m-d 00:00:00');
    	$ano_actual = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$ano_actual_primer_dia = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$ano_actual_ultimo_dia = date('Y-m-d 00:00:00',strtotime(date('Y-12-31')));
    	$ano_anterior_primer_dia = strtotime('-1 year',strtotime($ano_actual_primer_dia));
		$ano_anterior_primer_dia = date('Y-m-d H:i:s' ,$ano_anterior_primer_dia);
		$ano_anterior_ultimo_dia = strtotime('-1 year',strtotime($ano_actual_ultimo_dia));
		$ano_anterior_ultimo_dia = date('Y-m-d H:i:s' ,$ano_anterior_ultimo_dia);

		$filtrotipo = $this->input->post("categoria");
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
				$fecha_inicial = $today;
				$fecha_final = $today;
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			case 'ayer':
				$fecha_inicial = $this->_diaAnterior($today);
				$fecha_final = $this->_diaAnterior($today);
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			case 'dia':
				$fecha_inicial = $dia;
				$fecha_final = $dia;
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			case 'mesactual':
				$fecha_inicial = $mes_actual_primer_dia;
				$fecha_final = $mes_actual_ultimo_dia;
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			case 'mesespecifico':
				$fecha_inicial = $mes;
				$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			
			case 'anoactual':
				$fecha_inicial = $ano_actual_primer_dia;
				$fecha_final = $ano_actual_ultimo_dia;
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;					
			case 'anoespecifico':
				$fecha_inicial = $ano;
				$fecha_final = strtotime ('+1 year',strtotime($ano));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$fecha_final = strtotime ('-1 day',strtotime($fecha_final));	
				$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			
			case 'periodo':
				$fecha_inicial = $periodo_inicio;
				$fecha_final = $periodo_fin;
				$categoria = $this->Database->pdfCategoria($fecha_inicial,$fecha_final,$filtrotipo);
				break;
			
		}
		$nombre_categoria = $this->database->nombreCategoria($filtrotipo);	
			
		$fecha = date('d-m-Y');
		$hora = date('h:i:s A');
		$date = new DateTime($fecha_inicial);
		$fecha_inicial = date_format($date,'d-m-Y');
		$date = new DateTime($fecha_final);
		$fecha_final = date_format($date,'d-m-Y');
		$data = array(
			'fecha'					=>$fecha,
			'hora'					=>$hora,
			'usuario'				=>$session_data['user'],
			'fecha_inicial'			=>$fecha_inicial,
			'fecha_final'			=>$fecha_final,			
			'categoria'				=>$nombre_categoria,			
			'data'					=>$categoria
		);
		//var_dump($data);
		$this->load->view('pdf/reporte_categoria',$data, FALSE);		
	}

	//crear el pdf de detalle
	public function pdf_detalle(){
		$categoria = '';
		date_default_timezone_set('America/La_Paz');
		$this->load->model('database', '', true);
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}

		$id_instancia = $this->input->post("id_instancia");
		$detalle = $this->Database->pdfDetalle($id_instancia);
		if($detalle == null ){
			$this->_errorPDF();
			redirect('reportes/detalle');
		}
			
		$fecha = date('d-m-Y');
		$hora = date('h:i:s A');
		$data = array(
			'fecha'					=>$fecha,
			'hora'					=>$hora,
			'usuario'				=>$session_data['user'],
			'data'					=>$detalle
		);
		//var_dump($data);
		$this->load->view('pdf/reporte_detalle',$data, FALSE);		
	}

	private function _errorPDF(){
		$this->session->set_flashdata('titulo', 'Error');
		$this->session->set_flashdata('contenido', 'Se ha producido un error al realizar su solicitud.');
	}

}



/* End of file Reportes.php */
/* Location: ./application/controllers/Reportes.php */