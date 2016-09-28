<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores extends CI_Controller {

	public function index()
	{
		$this->load->view('header','', FALSE);
		$this->load->view('indicadores_vista','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

}

/* End of file Indicadores.php */
/* Location: ./application/controllers/Indicadores.php */