<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller {

	public function index()
	{
		$this->load->view('header','', FALSE);
		$this->load->view('ayuda','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);
	}

}

/* End of file Ayuda.php */
/* Location: ./application/controllers/Ayuda.php */