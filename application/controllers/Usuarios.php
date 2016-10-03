<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$search = null;
		$username = $this->input->post('username');		
		if (isset($username)){
			$search = $data=$this->Database->search_user($username);			
			$search = $search[0];
		}
		$signin = $this->session->flashdata('signin');
		$usuarios = $data=$this->Database->usuariosList();
		$data = array(
			'signin'	=>$signin,
			'usuarios'	=>$usuarios,
			'usuario'	=>$search
			);	
		$this->load->view('header','', FALSE);
		$this->load->view('usuarios',$data, FALSE);
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	public function login()
	{
		$error_login = $this->session->flashdata('error_login');
		$data = array('error_login'=>$error_login);	
		$this->load->view('login',$data, FALSE);
	}

	public function iniciar(){
		$log = false;
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');		
		$log = $data=$this->Database->login($user,$pass);
		if (isset($log)){
			$data_user = array(
    		'user' => $user,
    		'tipo' => $log['tipo']
        	);
        	$this->session->set_userdata('logged_in',$data_user);
        	redirect('Home');
		}
		else{
			$this->session->set_flashdata('error_login','Usuario o Contraseña Incorrectos');
			redirect('Usuarios/login');
		}
	}

	public function registro(){
		$log = false;
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');		
		$log = $data=$this->Database->login($user,$pass);
		if ($log){
			$data_user = array(
    		'user' => $user,
        	);
        	$this->session->set_userdata('logged_in',$data_user);
        	redirect('Home');
		}
		else{
			$this->session->set_flashdata('error_login','Usuario o Contraseña Incorrectos');
			redirect('Usuarios/login');
		}
	}

	public function signin(){
		$singin = false;
		$search = false;
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');	
		$name = $this->input->post('name');	
		$lastname = $this->input->post('lastname');	
		$email = $this->input->post('email');
		$tipo = $this->input->post('tipo');
		$search = $data=$this->Database->search_user($username);
			if (!$search){
				$singin = $data=$this->Database->singin($username,$name,$lastname,$email,$tipo);
			if ($singin){
				$this->session->set_flashdata('signin','Se ha registrado el usuario correctamente');
				redirect('Usuarios');				
			}
			else{
				$this->session->set_flashdata('singin','Se ha producido un error al registrar');	
			}
		}
		else{
			$this->session->set_flashdata('signin','Ya existe un usuario con ese username');	
			redirect('Usuarios');
		}	

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('Usuarios/login');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */