<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

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
		$this->load->model('usermodel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["datauser"] = $this->usermodel->getAll();
		$this->load->view('user/page-user', $data);
	}

	public function add()
	{
		if ($this->input->post()) {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbuser.username]');
			$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password1]');

			if ($this->form_validation->run() == true) {
			$this->usermodel->save();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan.');
			redirect("UserController");
			}else{

		$data["userid"] = $this->usermodel->createId();
		$this->load->view('user/page-user-add',$data);
			}
		}


		$data["userid"] = $this->usermodel->createId();
		$this->load->view('user/page-user-add',$data);
	}

	public function edit($id = null)
	{
		if ($this->input->post()) {


			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		

			if ($this->form_validation->run() == true) {
			$this->usermodel->update();
			$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
			redirect("UserController");
			}else{
	$data["userdata"] = $this->usermodel->getById($id);
 		$this->load->view('user/page-user-edit', $data);
			}
			
		}
		$data["userdata"] = $this->usermodel->getById($id);
 		$this->load->view('user/page-user-edit', $data);
	}

	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->usermodel->delete($id)) {
            redirect(site_url('UserController'));
        }
    }

}
