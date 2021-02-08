<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");
 ?>

 	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("UserController/add") ?>" method="post"> 
                  <div class="form-group">
                    <label>UserID</label>
                    <input type="text" name="idUser" class="form-control form-control-user" placeholder="" value="<?php echo $userid; ?>" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan username .." required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan password .." required>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="conpass" class="form-control form-control-user" placeholder="Masukkan password .." required>
                  </div>
                  <div class="form-group">
                    <label>User Level</label>
                    <select name="level" id="select2" class="form-control form-control-user" required="">
                      <option value="Admin">Admin</option>
                      <option value="Guest">User Guest</option>
                    </select>
                  </div>
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary ">
              </form>
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>