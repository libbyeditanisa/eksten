<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("authmodel");
	}

public function index()
	{
		if ($this->session->userdata('username')){
			redirect('user');
		}



		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false){
		$data['title'] = 'login Page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}else{

		$this->_login();
		}
	}
		
	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$user = $this->db->get_where('tbuser', ['username' => $username])->row();
			//usernya ada
		if($user){
			//jika usernya aktif
									//cek password
				if($user->password){
				
					 $this->session->set_userdata(['user_logged' => $user]);


					redirect('welcome');
					
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah
</div>');
			redirect('auth');
				}



		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak tersedia </div>');
			redirect('auth');
		}
	}



	public function registration()
	{
		$this->load->view('templates/auth_header'); 
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer'); 
	}

	public function login()
	{
		if ($this->authmodel->cek()) {
			$this->load->view("welcome_message");
		} else {
			redirect(site_url("auth"));
		}
	}

	public function coba() 
	{
		echo "coba";
	}
}