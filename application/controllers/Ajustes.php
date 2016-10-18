<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajustes extends CI_Controller {

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
		$this->load->view('ajustes','', FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);
	}

}

/* End of file Ajustes.php */
/* Location: ./application/controllers/Ajustes.php */