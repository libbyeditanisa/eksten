<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model("loginmodel");
        $this->load->library('form_validation');
        // if($this->loginmodel->isLogin()) redirect(site_url('welcome'));
        // if ($this->loginmodel->isLogin()) {
        //     redirect(site_url('welcome'));
        // }
    }

    public function index()
    {
        if (!empty($this->session->userdata("user_logged"))) {
            redirect(site_url("welcome"));
        } else {
            if($this->input->post()){
                if($this->loginmodel->doLogin()) redirect(site_url('welcome'));
            }
                $this->load->view("Login");
         
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user_logged");
        $this->session->sess_destroy();
        redirect("LoginController");
    }

}
