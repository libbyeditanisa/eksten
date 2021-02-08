<?php 
	$this->load->view("templates/header");
	$this->load->view("templates/navbar");

 ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Selamat Datang Di Sistem Input Penjadwalan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Periode : <?php echo date("d-m-Y H:i") ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <img src="<?php echo base_url() ?>/assets/img/4584.jpg" class="img-responsive" style="height: 800px; width: 1600px;">
            <i class="pull-right"><a href="https://www.freepik.com/vectors/calendar">Calendar vector created by pch.vector - www.freepik.com</a></i>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php 
	$this->load->view("templates/footer");

 ?>
