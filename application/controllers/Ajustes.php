<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajustes extends CI_Controller {

	public function index()
	{
		$this->load->view('header','', FALSE);
		$this->load->view('ajustes','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);
	}

}

/* End of file Ajustes.php */
/* Location: ./application/controllers/Ajustes.php */