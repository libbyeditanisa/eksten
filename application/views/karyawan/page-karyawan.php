<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");
 ?>

 	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
          <p class="mb-4"><a href="<?php echo site_url("KaryawanController/add") ?>" class="btn btn-info btn-sm">Tambah Data</a></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible mt-2" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 1; 
                        foreach ($datakaryawan as $karyawan): 
                    ?>
                    <tr>
                    	<td><?php echo $no; ?></td>
                      <td><?php echo $karyawan->nik; ?></td>
                      <td><?php echo $karyawan->nama; ?></td>
                      <td><?php echo $karyawan->email; ?></td>
                      <td><?php echo $karyawan->notelp; ?></td>
                    	<td><?php echo $karyawan->alamat; ?></td>
                      <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?php echo site_url('KaryawanController/edit/'.$karyawan->id) ?>" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="left" title="Edit Data"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo site_url('KaryawanController/delete/'.$karyawan->id) ?>" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus Data" id="hapusK<?php echo $karyawan->id ?>"><i class="fas fa-trash"></i></a>
                          </div>
                      </td>
                    </tr>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $('#hapusK<?php echo $karyawan->id ?>').click(function(){
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
                                    location.href = '<?php echo site_url('KaryawanController') ?>';
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