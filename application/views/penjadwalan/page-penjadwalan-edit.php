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
        <form action="<?php echo site_url("PenjadwalanController/edit") ?>" method="post"> 
          <input type="hidden" name="id" value="<?php echo $penjadwalandata->id; ?>">
          <div class="form-group">
            <label>No Penjadwalan</label>
            <input type="text" name="noJadwal" class="form-control form-control-user" placeholder="" value="<?php echo $penjadwalandata->noJadwal; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" name="tanggal" value="<?php echo $penjadwalandata->tanggal; ?>" class="form-control form-control-user datepicker" placeholder="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Perusahaan</label>
            <input type="text" name="namaPerusahaan" value="<?php echo $penjadwalandata->namaPerusahaan; ?>" class="form-control form-control-user" placeholder="">
          </div>
          <div class="form-group">
            <label>Karyawan / Petugas Sosialisasi</label>
            <select class="form-control form-control-user karyawan" id="select" name="idKaryawan[]" multiple>
              <option>Pilih</option>
              
            </select>
          </div>
          <div class="form-group">
            <label>Pukul</label>
            <input type="text" name="waktu" class="form-control form-control-user" placeholder="" value="<?php echo $penjadwalandata->waktu; ?>">
          </div>
          <div class="form-group">
            <label>Jumlah Peserta Sosialisasi</label>
            <input type="text" name="jumlahPeserta" class="form-control form-control-user" placeholder="" value="<?php echo $penjadwalandata->jumlahPeserta; ?>">
            <!-- <textarea class="form-control form-control-user" name="jumlahPeserta" placeholder="jumlahPeserta"></textarea> -->
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control form-control-user" name="keterangan" placeholder=""><?php  echo $penjadwalandata->keterangan; ?></textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control form-control-user" id="select3" name="status">
              <option>Pilih</option>
              <option value="BELUM" <?php if($penjadwalandata->status=="BELUM"){ echo "selected"; } ?> >BELUM SOSIALISASI</option>
              <option value="PROSES" <?php if($penjadwalandata->status=="PROSES"){ echo "selected"; } ?> >SEDANG VERIFIKASI</option>
              <option value="SUDAH" <?php if($penjadwalandata->status=="SUDAH"){ echo "selected"; } ?> >SUDAH SOSIALISASI</option>
            </select>
          </div>
          <input type="submit" name="edit" value="Edit Data" class="btn btn-primary ">
      </form>
      </div>
    </div>

  </div>

  <script type="text/javascript">
    $(document).ready(function(){
        var arr = "<?php echo $penjadwalandata->idKaryawan ?>";
        var array = arr.split(',');
        console.log(array);
        $.ajax({
            url : "<?php echo site_url('PenjadwalanController/getKaryawan') ?>",
            method : "POST",
            // async : false,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                if (data.length > 0) {
                    for(i=0; i < data.length; i++){
                      if (array.includes(data[i].nik)) {
                          html += '<option value="'+data[i].nik+'" selected>'+data[i].nik+' ('+data[i].nama+')</option>';
                      } else {
                          html += '<option value="'+data[i].nik+'">'+data[i].nik+' ('+data[i].nama+')</option>';
                      }
                    }
                } else {
                  html += '<option>Pilih</option>'; 
                }
                $('.karyawan').chosen().html(html);
                $('.karyawan').trigger('chosen:updated');
                console.log(data);
            }
        });

    });
</script>

 <?php 
	$this->load->view("templates/footer");
 ?>