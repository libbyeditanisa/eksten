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
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Karyawan</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("KaryawanController/edit") ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $karyawandata->id; ?>">
                  <div class="form-group">
                    <!-- <label>Nik</label> -->
                    <input type="text" name="nik" value="<?php echo $karyawandata->nik; ?>" class="form-control form-control-user" placeholder="Nik ..">
                  </div>
                  <div class="form-group">
                    <!-- <label>Nik</label> -->
                    <input type="text" name="nama" value="<?php echo $karyawandata->nama; ?>" class="form-control form-control-user" placeholder="Nama ..">
                  </div>
                  <div class="form-group">
                    <!-- <label>Nik</label> -->
                    <input type="text" name="email" value="<?php echo $karyawandata->email; ?>" class="form-control form-control-user" placeholder="Email ..">
                  </div>
                  <div class="form-group">
                    <!-- <label>Nik</label> -->
                    <input type="text" name="notelp" value="<?php echo $karyawandata->notelp; ?>" class="form-control form-control-user" placeholder="No Telepon ..">
                  </div>
                  <div class="form-group">
                    <!-- <label>Nik</label> -->
                    <textarea class="form-control form-control-user" name="alamat" placeholder="Alamat .."><?php echo $karyawandata->alamat; ?></textarea>
                  </div>
                  <input type="submit" name="edit" value="Edit Data" class="btn btn-primary ">
              </form>
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>