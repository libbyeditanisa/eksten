<?php defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    private $_table = "tbuser";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $sessUser = $user->userLevel;
            // $isMgr = $user->userLevel == "mgr";
            // $isPersonil = $user->userLevel == "personil";

            // jika password benar dan dia admin
            if($post["password"]==$user->password){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                return true;
            }else{
                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Salah</div>');
            }
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Salah</div>');
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function isLogin()
    {
        // if ($this->session) {
            
        // }
    }

    private function _updateLastLogin($user_id){
        // $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        // $this->db->query($sql);
    }

}