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
		$this->load->view('templates/auth_header'); 
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer'); 
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