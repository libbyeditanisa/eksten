<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PenjadwalanModel extends CI_Model
{
	private $_table = "tbjadwal";

	public function getAll()
	{
        $uname = $this->session->userdata("user_logged")->username;
        if ($this->session->userdata("user_logged")->userLevel=="Admin") {
            $query = $this->db->get($this->_table)->result();
        } else {
            $query = $this->db->query("select * from ".$this->_table." where idKaryawan like '%".$uname."%'")->result();
        }
        // $this->db->where("username !=", "admin");
        return $query;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getByNoJadwal($id){
        return $this->db->query("select idKaryawan from ".$this->_table." where noJadwal='".$id."'")->row(); 
    }

    public function save()
    {
        $post = $this->input->post();

        $c = count($post["idKaryawan"]);
        for ($i = 0; $i < $c ; $i++) {
            $po[] = $post["idKaryawan"][$i];
        }
        $idKary = implode(",",$po);
        

      
        $this->noJadwal = $post["noJadwal"];
        $this->tanggal = $post["tanggal"];
        $this->namaPerusahaan = $post["namaPerusahaan"];
        $this->idKaryawan = $idKary;
        $this->waktu = $post["waktu"];
        $this->jumlahPeserta = $post["jumlahPeserta"];
        $this->keterangan = $post["keterangan"];
        $this->status = 'BELUM';
        $this->create_date = date('Y-m-d H:i:s');
        $this->update_date = '0000-00-00 00:00:00';
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $c = count($post["idKaryawan"]);
        for ($i = 0; $i < $c ; $i++) {
            $po[] = $post["idKaryawan"][$i];
        }
        $idKary = implode(",",$po);

        $this->id = $post["id"];
        $this->noJadwal = $post["noJadwal"];
        $this->tanggal = $post["tanggal"];
        $this->namaPerusahaan = $post["namaPerusahaan"];
        $this->idKaryawan = $idKary;
        $this->waktu = $post["waktu"];
        $this->jumlahPeserta = $post["jumlahPeserta"];
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];
        $this->update_date = date('Y-m-d H:i:s');
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function upload($filename)
    {
        $post = $this->input->post();

        $this->status = "PROSES";
        $this->buktiUpload = $filename;
        $this->update_date = date('Y-m-d H:i:s');
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    public function createId()
    {
        list($y,$m,$d)=explode("-", date("Y-m-d"));
		$this->db->select('id as kode', FALSE);
		$this->db->order_by('id','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get($this->_table);      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		} else {      
			//jika kode belum ada      
			$kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = $kodemax."-JDWL/".$y; // USR-0001
		return $kodejadi;  
    }

}