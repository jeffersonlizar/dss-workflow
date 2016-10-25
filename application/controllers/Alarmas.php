<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alarmas extends CI_Controller {

	public function index()
	{
		$this->load->view('header','', FALSE);
		$this->load->view('alarmas','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
		$this->load->view('alarma','', FALSE);	
	}

}

/* End of file Alarmas.php */
/* Location: ./application/controllers/Alarmas.php */