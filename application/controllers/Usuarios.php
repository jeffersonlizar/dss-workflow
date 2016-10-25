<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$this->load->view('header','', FALSE);
		$this->load->view('usuarios','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */