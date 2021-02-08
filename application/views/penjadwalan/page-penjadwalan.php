<?php 
  $this->load->view("templates/header");
  $this->load->view("templates/navbar");

  foreach ($dataKaryawan as $kary) {
    $nama[$kary->nik]=$kary->nama;
  }

  $logSession = $this->session->userdata("user_logged")->userLevel;

 ?>

  <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Penjadwalan</h1>
          
          <?php if ($logSession == "Admin"): ?>
          <p class="mb-4"><a href="<?php echo site_url("PenjadwalanController/add") ?>" class="btn btn-info btn-sm">Tambah Data</a></p>
          <?php endif ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjadwalan</h6>
              <?php if ($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } elseif ($this->session->flashdata('danger')) { ?>
                <div class="alert alert-danger alert-dismissible mt-2" role="alert">
                    <?php echo $this->session->flashdata('danger'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th nowrap>No Penjadwalan</th>
                      <th>Tanggal</th>
                      <th nowrap>Perusahaan</th>
                      <th nowrap>Karyawan / Petugas Sosialisasi</th>
                      <th>Waktu</th>
                      <th nowrap>Jumlah Peserta Sosialisasi</th>
                      <th>Keterangan</th>
                      <th nowrap>Bukti Sosialisasi</th>
                      <th>Status</th>
                      <?php if ($logSession == "Admin"): ?>
                        
                      <th>Aksi</th>

                      <?php endif ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 1; 
                        foreach ($datapenjadwalan as $penjadwalan): 
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $penjadwalan->noJadwal; ?></td>
                      <td><?php echo $penjadwalan->tanggal; ?></td>
                      <td><?php echo $penjadwalan->namaPerusahaan; ?></td>
                      <td>
                        <?php 
                        $prs = explode(",",$penjadwalan->idKaryawan);
                        if (count($prs) == 1) {
                          echo $nama[$penjadwalan->idKaryawan];
                        } else {
                          for ($i = 0; $i < count($prs) ; $i++) {
                            $nm[] = $nama[$prs[$i]];
                          }
                            echo implode(",",$nm);
                        }
                        ?>
                      </td>
                      <td><?php echo $penjadwalan->waktu; ?></td>
                      <td><?php echo $penjadwalan->jumlahPeserta; ?></td>
                      <td><?php echo $penjadwalan->keterangan; ?></td>
                      <td>
                        <?php 
                          if (empty($penjadwalan->buktiUpload)) {
                          ?>
                          <?php if ($this->session->userdata("user_logged")->userLevel == 'Admin'): ?>
                            
                            <?php else: ?>
                          <a href="<?php echo base_url("PenjadwalanController/upload/".$penjadwalan->id) ?>" class="btn btn-primary btn-xs">Upload Bukti</a>

                          <?php endif ?>
                        <?php
                          } else {
                        ?>
                          <img src="<?php echo base_url("upload/$penjadwalan->buktiUpload") ?>" class="img-responsive" style="height: 200px; width: 200px">
                        <?php
                          }
                         ?>
                      </td>
                      <td>
                        <?php if ($penjadwalan->status=="BELUM") { ?>
                          <span class="badge badge-danger">Belum Sosialisasi</span>
                        <?php } else if($penjadwalan->status=="PROSES") { ?>
                          <span class="badge badge-warning">Sedang Verifikasi</span>
                        <?php } else { ?>
                          <span class="badge badge-success">Sudah Sosialisasi</span>
                        <?php } ?>
                      </td>
                      
                      <?php if ($logSession == "Admin"): ?>
                      <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?php echo site_url('PenjadwalanController/edit/'.$penjadwalan->id) ?>" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="left" title="Edit Data"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo site_url('PenjadwalanController/delete/'.$penjadwalan->id) ?>" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus Data" id="hapusK<?php echo $penjadwalan->id ?>"><i class="fas fa-trash"></i></a>
                            <?php $fileNo = str_replace("/","_",$penjadwalan->noJadwal); ?>
                            <a href="<?php echo site_url('PenjadwalanController/kirim/'.$fileNo) ?>" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="right" title="Kirim Data"><i class="fas fa-paper-plane"></i></a>
                          </div>
                      </td>
                      <?php endif ?>
                    </tr>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $('#hapusK<?php echo $penjadwalan->id ?>').click(function(){
                            var href = $(this).attr('href');
                            $.confirm({
                              title: 'Hapus Data!',
                              content: 'Apakah anda yakin ingin menghapus data ini?',
                              type: 'red',
                              typeAnimated: true,
                              buttons: {
                                  Ok: function(){
                                    location.href = href;
                                  },
                                  Batal: function () {
                                    location.href = '<?php echo site_url('PenjadwalanController') ?>';
                                  }
                              }
                            });
                            return false;

                          });
                      });
                    </script>
                    <?php
                        $no++; 
                        endforeach 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

 <?php 
  $this->load->view("templates/footer");
 ?>