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
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data["datapenjadwalan"] = $this->penjadwalanmodel->getAll();
		$data["dataKaryawan"] = $this->karyawanmodel->getAll();
		$this->load->view('penjadwalan/page-penjadwalan', $data);

	}

	public function add()
	{	
		$post = $this->input->post();
		if ($this->input->post()) {
    

			$filet = str_replace("/", "_",$post["noJadwal"]);

			$this->penjadwalanmodel->save();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan.');
			$this->cetak($filet,$post["noJadwal"],$post["tanggal"],$post["namaPerusahaan"]);

			redirect("PenjadwalanController");
			
		}
		$data["penjadwalanno"] = $this->penjadwalanmodel->createId();
		$data["dataKaryawan"] = $this->karyawanmodel->getAll();
		$this->load->view('penjadwalan/page-penjadwalan-add', $data);
	}

	public function getKaryawan()
	{
		$id = $this->input->post("id");
		$data = $this->karyawanmodel->getAll();
		echo json_encode($data);
	}

	public function edit($id = null)
	{
		if ($this->input->post()) {
			$this->penjadwalanmodel->update();
			$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
			redirect("PenjadwalanController");
		}
		$data["dataKaryawan"] = $this->karyawanmodel->getAll();
		$data["penjadwalandata"] = $this->penjadwalanmodel->getById($id);
		$this->load->view('penjadwalan/page-penjadwalan-edit', $data);
	}

	public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->penjadwalanmodel->delete($id)) {
            redirect(site_url('PenjadwalanController'));
        }
    }

    public function upload($id = null){
        $data["penjadwalandata"] = $this->penjadwalanmodel->getById($id);
        $this->load->view('penjadwalan/page-upload', $data);
    }

    public function uploadFile(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
 
        $this->load->library('upload', $config);
 
        $data = array('image_metadata' => $this->upload->data());
        $d = $this->upload->data();

        if ($this->upload->do_upload('upload')) 
        {
            $this->session->set_flashdata('success', 'Data Berhasil Diupload.');
            $this->penjadwalanmodel->upload($this->upload->data("file_name"));
        } else {
            $this->session->set_flashdata('danger', 'Data Gagal Diupload.');
        }
        redirect("PenjadwalanController");
        
    }

    public function cetak($file,$noJadwal,$tgl,$namaPerusahaan){
    	$this->load->library('pdfgenerator');

    	$hari = array(
    				"Sun" => "Minggu",
    				"Mon" => "Senin",
    				"Tue" => "Selasa",
    				"Wed" => "Rabu",
    				"Thu" => "Kamis",
    				"Fri" => "Jum'at",
    				"Sat" => "Sabtu" 
    			);

    	$bulan = array(
    				"1" => "Januari",
    				"2" => "Februari",
    				"3" => "Maret",
    				"4" => "April",
    				"5" => "Mei",
    				"6" => "Juni",
    				"7" => "Juli",
    				"8" => "Agustus",
    				"9" => "September",
    				"10" => "Oktober",
    				"11" => "November",
    				"12" => "Desember"
    			);

    	$fileName = $file;

    	$noJadwal = str_replace("_","/", $noJadwal);
    	$data = $this->penjadwalanmodel->getByNoJadwal($noJadwal);
    	$array = explode(",",$data->idKaryawan);

    	for ($i = 0; $i < count($array); $i++) {
 			$dNotelp = $this->karyawanmodel->getByIdKaryawan($array[$i]);
 			$dataa["users"][] = array("nik" => $dNotelp->nik, "nama" => $dNotelp->nama, "notelp" => $dNotelp->notelp);
 			// echo $dNotelp->nik;
 		}

 		list($y,$m,$d) = explode("-",$tgl);
 		$dh = date("D", strtotime($tgl)); 
 		$tgl = $d." ".$bulan[(int)$m]." ".$y;
 		$dataa["nomor"] = $noJadwal;
 		$dataa["tanggal"] = $tgl;
 		$dataa["hari"] = $hari[$dh];
 		$dataa["tempat"] = $namaPerusahaan;
 		$dataa["datenow"] = date("d")." ".$bulan[(int)date("m")]." ".date("Y");

    	$html = $this->load->view('penjadwalan/page-penjadwalan-cetak', $dataa, true);
	    $this->pdfgenerator->generate($html,$fileName);

    }

    public function kirim($noJadwal){

		$s = DIRECTORY_SEPARATOR;
    	$file = dirname(__DIR__).$s.'third_party'.$s.'pdf'.$s.$noJadwal.'.pdf';

    	// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'libiafipaeditanisa@gmail.com',  // Email gmail
            'smtp_pass'   => 'lintangwirasena',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $noJadwal = str_replace("_","/", $noJadwal);
        $data = $this->penjadwalanmodel->getByNoJadwal($noJadwal);
        $array = explode(",",$data->idKaryawan);

        for ($i = 0; $i < count($array); $i++) {
            $dNotelp = $this->karyawanmodel->getByIdKaryawan($array[$i]);
            
            // Load library email dan konfigurasinya
            $this->load->library('email');
            $this->email->initialize($config);
            // Email dan nama pengirim
            $this->email->from('libiafipaeditanisa@gmail.com', 'SIP (Sistem Input Penjadwalan)');

            // Email penerima
            $this->email->to($dNotelp->email); // Ganti dengan email tujuan

            // Lampiran email, isi dengan url/path file
            $this->email->attach($file);

            // Subject email
            $this->email->subject('Jadwal');

            // Isi email
            $this->email->message("Berikut kami kirimkan jadwal kepada anda, file terlampir.");

            // $this->email->send();
            // Tampilkan pesan sukses atau error
            $this->email->send();
            

            // echo $dNotelp->nik;
        }

        $this->session->set_flashdata('success', 'Jadwal Berhasil Dikirim.');
        redirect(site_url('PenjadwalanController'));

    }

}
