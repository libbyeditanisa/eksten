<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class AuthModel extends CI_Model
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	// $_table = "user";

	public function cek()
	{
		$post = $this->input->post();
		$sql = $this->db->query("select * from user where username='".$post["username"]."' and password='".$post["password"]."'");
		// $sql->row();
		if ($sql->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

 ?>