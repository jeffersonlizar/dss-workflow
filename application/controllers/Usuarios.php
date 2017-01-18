<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$session_data = $this->session->userdata('logged_in');	
		if($session_data['tipo']!='1'){
			redirect('home');
		}
		$search = null;
		$username = $this->input->post('username');		
		if (isset($username)){
			$search = $this->Database->search_user($username);			
			$search = $search[0];
		}
		$titulo = $this->session->flashdata('titulo');
		$contenido = $this->session->flashdata('contenido');
		$modal = array(
			'titulo'		=>$titulo,
			'contenido'		=>$contenido
		);
		$usuarios = $data=$this->Database->usuariosList();
		$data = array(
			'usuarios'	=>$usuarios,
			'usuario'	=>$search,
			'session'=>$session_data
			);	
		$header = array(
			'session'=>$session_data
		);
		$this->load->view('header',$header, FALSE);
		$this->load->view('usuarios',$data, FALSE);
		$this->load->view('footerbegin',$modal, FALSE);
		$this->load->view('footerend','', FALSE);	
	}

	public function login()
	{
		$error_login = $this->session->flashdata('error_login');
		$primera_vez = $this->session->flashdata('primera_vez');
		$usuario_login = $this->session->flashdata('usuario_login');
		if (($primera_vez=='')||(!isset($primera_vez))){
			$primera_vez= 0;
		}
		$data = array(
			'error_login'=>$error_login,
			'usuario_login'=>$usuario_login,
			'primera_vez'=>$primera_vez
			);	
		$this->load->view('login',$data, FALSE);
	}

	public function iniciar(){
		$log = false;
		$primeravez = false;
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$primera = $this->input->post('primera_vez');		
		if (($pass=='')&&($primera == '0'))		
			$primeravez = true;
		if (($pass!='')&&($primera == '1')){	
			$log = $this->Database->primerLogin($user,$pass);
			$search = $data=$this->Database->search_user($user);
			$data_user = array(
	    		'user' => $log['usuario'],
	    		'tipo' => $search[0]['tipo'],
	    		'superadmin' => false
	        	);
	        $this->session->set_userdata('logged_in',$data_user);
	        redirect('home');
	    }
		else{
			$log =$this->Database->login($user,$pass);
			if (isset($log)){
				if ($primeravez){
					$this->session->set_flashdata('error_login','Primer Inicio de sesión en el sistema, debe ingresar su nueva contraseña');
					$this->session->set_flashdata('usuario_login',$user);
					$this->session->set_flashdata('primera_vez','1');
					redirect('Usuarios/login');	
				}
				$data_user = array(
	    		'user' => $log['usuario'],
	    		'tipo' => $log['tipo'],
	    		'superadmin' => $log['superadmin']
	        	);
	        	$this->session->set_userdata('logged_in',$data_user);
	        	redirect('home');
			}
			else{
				$this->session->set_flashdata('error_login','Usuario o Contraseña Incorrectos');
				redirect('usuarios/login');
			}
		}		
	}

	public function registro(){
		$log = false;
		$user = trim($this->input->post('user'));
		$pass = trim($this->input->post('pass'));		
		$log = $data=$this->Database->login($user,$pass);
		if ($log){
			$data_user = array(
    		'user' => $user,
        	);
        	$this->session->set_userdata('logged_in',$data_user);
        	redirect('home');
		}
		else{
			$this->session->set_flashdata('error_login','Usuario o Contraseña Incorrectos');
			redirect('usuarios/login');
		}
	}

	public function signin(){

		$singin = false;
		$search = false;
		$username = trim($this->input->post('username'));
		$pass = trim($this->input->post('pass'));
		$name = trim($this->input->post('name'));
		$lastname = trim($this->input->post('lastname'));
		$email = trim($this->input->post('email'));
		$tipo = $this->input->post('tipo');
		$search = $data=$this->Database->search_user($username);
			if (!$search){
				$singin = $data=$this->Database->singin($username,$name,$lastname,$email,$tipo);
			if ($singin){
				$this->session->set_flashdata('titulo', 'Registrado Exitosamente');
				$this->session->set_flashdata('contenido', 'Se ha registrado el usuario exitosamente.');
				redirect('usuarios');				
			}
			else{
				$this->session->set_flashdata('titulo', 'Error registrando');
				$this->session->set_flashdata('contenido', 'Se ha producido un error al registrar.');
			}
		}
		else{
			$this->session->set_flashdata('titulo', 'Error registrando');
			$this->session->set_flashdata('contenido', 'Ya existe un usuario con el username.');
			redirect('usuarios');
		}	

	}

	public function eliminar(){
		$username = $this->input->post('username');
		$delete = $data=$this->Database->delete($username);
		if ($delete){
			$this->session->set_flashdata('titulo', 'Eliminado Exitosamente');
			$this->session->set_flashdata('contenido', 'Se ha eliminado el usuario exitosamente.');
			redirect('usuarios');				
		}
		else{
			$this->session->set_flashdata('titulo', 'Error eliminando');
			$this->session->set_flashdata('contenido', 'Se ha producido un error al eliminar.');
		}	
		redirect('usuarios');

	}

	public function reiniciarcontrasena(){
		$username = $this->input->post('username');
		$delete = $data=$this->Database->reiniciarContrasena($username);
		if ($delete){
			$this->session->set_flashdata('titulo', 'Reinicio Exitoso');
			$this->session->set_flashdata('contenido', 'Se ha reiniciado la contraseña exitosamente.');
			redirect('usuarios');				
		}
		else{
			$this->session->set_flashdata('titulo', 'Error reiniciando');
			$this->session->set_flashdata('contenido', 'Se ha producido un error al reiniciar.');
		}	
		redirect('usuarios');

	}

	public function modificar(){
		$singin = false;
		$search = false;
		$username = trim($this->input->post('username'));
		$pass = trim($this->input->post('pass'));	
		$name = trim($this->input->post('name'));	
		$lastname = trim($this->input->post('lastname'));	
		$email = $this->input->post('email');
		$tipo = $this->input->post('tipo');
		$singin = $data=$this->Database->modificar($username,$name,$lastname,$email,$tipo);
		if ($singin){
			$this->session->set_flashdata('titulo', 'Modificado Exitosamente');
			$this->session->set_flashdata('contenido', 'Se ha modificado el usuario exitosamente.');
			redirect('usuarios');				
		}
		else{
			$this->session->set_flashdata('titulo', 'Error modificando');
			$this->session->set_flashdata('contenido', 'Se ha producido un error al modificar.');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('usuarios/login');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */