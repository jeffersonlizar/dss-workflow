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

}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */