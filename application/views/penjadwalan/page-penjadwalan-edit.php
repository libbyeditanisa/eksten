<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");
 ?>

 	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Penjadwalan</h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Penjadwalan</h6>
            </div>
            <div class="card-body">
              <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <input type="text" name="id" class="form-control form-control-user" placeholder="id">
                  </div>
              <div class="form-group">
               <!-- <label>Tanggal</label> -->
                    <input type="text" name="noJadwal" class="form-control form-control-user" placeholder="noJadwal">
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <input type="text" name="tanggal" class="form-control form-control-user" placeholder="tanggal">
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <input type="text" name="namaPerusahaan" class="form-control form-control-user" placeholder="namaPerusahaan">
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <input type="text" name="idKaryawan" class="form-control form-control-user" placeholder="idKaryawan">
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <textarea class="form-control form-control-user" name="waktu" placeholder="waktu"></textarea>
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <textarea class="form-control form-control-user" name="jumlahPeserta" placeholder="jumlahPeserta"></textarea>
                  </div>
                  <div class="form-group">
                    <!-- <label>Tanggal</label> -->
                    <textarea class="form-control form-control-user" name="keterangan" placeholder="keterangan"></textarea>
                  </div>
              <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary ">
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>