<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");
 ?>

 	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("KaryawanController/add") ?>" method="post"> 
                  <div class="form-group">
                    <label>Nik</label>
                    <input type="text" name="nik" class="form-control form-control-user" placeholder="Masukkan nik .." value="<?= set_value('nik'); ?>" >
                     <small class="text-danger"><?php echo form_error('nik'); ?></small>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Masukkan nama karyawan .."  value="<?= set_value('nama'); ?>">
                     <small class="text-danger"><?php echo form_error('nama'); ?></small>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control form-control-user" placeholder="Masukkan email .."  value="<?= set_value('email'); ?>">
                     <small class="text-danger"><?php echo form_error('email'); ?></small>
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="notelp" class="form-control form-control-user" placeholder="Masukkan no telepon .." value="<?= set_value('notelp'); ?>">

 <small class="text-danger"><?php echo form_error('notelp'); ?></small>                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control form-control-user" name="alamat" placeholder="Masukkan alamat lengkap .."></textarea>
                  </div>
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary ">
              </form>
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>