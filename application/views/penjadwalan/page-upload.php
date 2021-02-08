<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");
 ?>

 	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Upload Bukti</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("PenjadwalanController/uploadFile") ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $penjadwalandata->id ?>"> 
                  <div class="form-group">
                    <label>Upload</label>
                    <input type="file" name="upload" class="form-control form-control-user" required>
                  </div>
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary ">
              </form>
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>