<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model
{
	private $_table = "tbkaryawan";

	public function getAll()
	{
		// $this->db->where("username !=", "admin");
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function getByIdKaryawan($id)
    {
        return $this->db->get_where($this->_table, ["nik" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nik = $post["nik"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->notelp = $post["notelp"];
        $this->alamat = $post["alamat"];
        $this->create_date = date('Y-m-d H:i:s');
        $this->update_date = '0000-00-00 00:00:00';
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->notelp = $post["notelp"];
        $this->alamat = $post["alamat"];
        $this->create_date = $post["create_date"];
        $this->update_date = date('Y-m-d H:i:s');
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

  //   public function createId()
  //   {
		// $this->db->select('RIGHT(id,4) as kode', FALSE);
		// $this->db->order_by('id','DESC');    
		// $this->db->limit(1);    
		// $query = $this->db->get($this->_table);      //cek dulu apakah ada sudah ada kode di tabel.    
		// if($query->num_rows() <> 0){      
		// 	//jika kode ternyata sudah ada.      
		// 	$data = $query->row();      
		// 	$kode = intval($data->kode) + 1;    
		// } else {      
		// 	//jika kode belum ada      
		// 	$kode = 1;    
		// }

		// $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		// $kodejadi = "STN-".$kodemax; // USR-0001
		// return $kodejadi;  
  //   }

}