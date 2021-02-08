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
	}

	public function index()
	{
		$data["datauser"] = $this->usermodel->getAll();
		$this->load->view('user/page-user', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$this->usermodel->save();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan.');
			redirect("UserController");
		}

		$data["userid"] = $this->usermodel->createId();
		$this->load->view('user/page-user-add',$data);
	}

	public function edit($id = null)
	{
		if ($this->input->post()) {
			$this->usermodel->update();
			$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
			redirect("UserController");
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
