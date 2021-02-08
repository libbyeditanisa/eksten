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
              <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("UserController/edit/") ?><?php echo $userdata->id; ?>" method="post"> 
                  <input type="hidden" name="id" value="<?php echo $userdata->id; ?>">
                  <div class="form-group">
                    <label>UserID</label>
                    <input type="text" name="idUser" class="form-control form-control-user" placeholder="" value="<?php echo $userdata->idUser; ?>" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control form-control-user" value="<?php echo $userdata->username ?>" required>
                    <small class="text-danger"><?php echo form_error('username'); ?></small>
                  </div><div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-user" value="<?php echo $userdata->password ?>" required>
                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                  </div>
              
                  <input type="hidden" name="create_date" value="<?php echo $userdata->create_date ?>">
                  <div class="form-group">
                    <label>User Level</label>
                    <select name="level" id="select2" class="form-control form-control-user">
                      <option value="Admin" <?php if($userdata->userLevel=="Admin") { echo "selected"; } ?> >Admin</option>
                      <option value="Guest" <?php if($userdata->userLevel=="Guest") { echo "selected"; } ?> >User Guest</option>
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