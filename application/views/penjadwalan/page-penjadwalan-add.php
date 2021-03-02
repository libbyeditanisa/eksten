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
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penjadwalan</h6>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url("PenjadwalanController/add") ?>" method="post"> 
                  <div class="form-group">
                    <label>No Penjadwalan</label>
                    <input type="text" name="noJadwal" class="form-control form-control-user" placeholder="" value="<?php echo $penjadwalanno; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" name="tanggal" class="form-control form-control-user datepicker" placeholder="" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Perusahaan</label>
                    <input type="text" name="namaPerusahaan" class="form-control form-control-user" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Karyawan / Petugas Sosialisasi</label>
                    <select class="form-control form-control-user" id="select" name="idKaryawan" multiple>
                      <option>Pilih</option>
                      <?php foreach ($dataKaryawan as $kary): ?>
                        <option value="<?php echo $kary->nik ?>"><?php echo $kary->nik."  (".$kary->nama.")" ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Pukul</label>
                    <input type="text" name="waktu" class="form-control form-control-user" placeholder=" ">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Peserta Sosialisasi</label>
                    <input type="text" name="jumlahPeserta" class="form-control form-control-user" placeholder=" ">
                    <!-- <textarea class="form-control form-control-user" name="jumlahPeserta" placeholder="jumlahPeserta"></textarea> -->
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control form-control-user" name="keterangan" placeholder=""></textarea>
                  </div>
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary ">
              </form>
            </div>
          </div>

        </div>

 <?php 
	$this->load->view("templates/footer");
 ?>