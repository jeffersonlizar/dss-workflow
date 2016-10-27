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
/*
		switch ($indicador_actividad['opcion']){
			case '1': //dia actual				
				$actividad = $this->_actividadDelDia($today);
				break;
			case '2': //dia anterior				
				$actividad = $this->_actividadDelDia($yesterday);
				break;
			case '3': //dia
				$dia = $indicador_actividad['dia'];
				$actividad = $this->_actividadDelDia($dia);
				break;	
			case '4': //dia comparativo
				$dia1 = $indicador_actividad['dia_comparativo1'];
				$dia2 = $indicador_actividad['dia_comparativo2'];
				$actividad = $this->_actividadComparacionDias($dia1,$dia2);
				break;
			case '5': //Mes Actual
				$actividad = $this->_actividadDelMes($mes_actual);
				break;
			case '6': //Mes
				$mes = $indicador_actividad['mes'];
				$actividad = $this->_actividadDelMes($mes);
				break;
			case '7': //Mes comparativo
				$mes1 = $indicador_actividad['mes_comparativo1'];
				$mes2 = $indicador_actividad['mes_comparativo2'];
				$actividad = $this->_actividadComparacionMeses($mes1,$mes2);
				break;
			case '8': //Ano Actual
				$actividad = $this->_actividadDelAno($ano_actual);
				break;
			case '9': //Ano
				$ano = $indicador_actividad['ano'];
				$actividad = $this->_actividadDelAno($ano);
				break;
			case '10': //Ano Comparativo
				$ano1 = $indicador_actividad['ano_comparativo1'];
				$ano2 = $indicador_actividad['ano_comparativo2'];
				$actividad = $this->_actividadComparacionAnos($ano1,$ano2);
				break;
		}
*/
		$this->load->view('header',$header, FALSE);
		$this->load->view('indicadores/actividad','', FALSE);
		//$this->load->view('actividad',$actividad, FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */