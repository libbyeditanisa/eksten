<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanController extends CI_Controller {

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
		$this->load->model('karyawanmodel');
	}

	public function index()
	{
		$data["datakaryawan"] = $this->karyawanmodel->getAll();
		$this->load->view('karyawan/page-karyawan', $data);
	}

	public function add()
	{
		if ($this->input->post()) {

			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[tbkaryawan.nik]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tbkaryawan.email]');
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('notelp', 'No Telpon', 'trim|required');
	

			if ($this->form_validation->run() == true) {
			$this->karyawanmodel->save();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan.');
			redirect("KaryawanController");
			}else{
				$this->load->view('karyawan/page-karyawan-add');
			}
		}

		$this->load->view('karyawan/page-karyawan-add');
	}

	public function edit($id = null)
	{
		if ($this->input->post()) {
			$this->karyawanmodel->update();
			$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
			redirect("KaryawanController");
		}
		$data["karyawandata"] = $this->karyawanmodel->getById($id);
 		$this->load->view('karyawan/page-karyawan-edit', $data);
	}

	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->karyawanmodel->delete($id)) {
            redirect(site_url('KaryawanController'));
        }
    }

}
