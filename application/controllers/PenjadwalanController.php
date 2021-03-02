<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenjadwalanController extends CI_Controller {

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
		$this->load->model('penjadwalanmodel');
		$this->load->model('karyawanmodel');
	}
	public function index()
	{
		$data["datapenjadwalan"] = $this->penjadwalanmodel->getAll();
		
		$this->load->view('penjadwalan/page-penjadwalan', $data);

	}

	public function add()
	{
		if ($this->input->post()) {
			$this->penjadwalanmodel->save();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan.');
			redirect("PenjadwalanController");
			
		}
		$data["penjadwalanno"] = $this->penjadwalanmodel->createId();
		$data["dataKaryawan"] = $this->karyawanmodel->getAll();
		$this->load->view('penjadwalan/page-penjadwalan-add', $data);
	}

	public function edit()
	{
		if ($this->input->post()) {
			$this->penjadwalanmodel->update();
			$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
			redirect("PenjadwalanController");
		}
		$data["penjadwalandata"] = $this->penjadwalanmodel->getById($id);
		$this->load->view('penjadwalan/page-penjadwalan-edit');
	}
	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->penjadwalanmodel->delete($id)) {
            redirect(site_url('PenjadwalanController'));
        }
     }

}
