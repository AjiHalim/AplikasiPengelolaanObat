<?php 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APLIKASI PENGELOLAAN OBAT</title>
  <style type="text/css">
  	.row .btn{
  		margin: auto;
  	}
  </style>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<?php include "top_bar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Dashboard</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	       		<div class="card">
	              <div class="card-body">
	                <h4 class="card-text">
	                  Selamat Datang <b><?= @$_SESSION['name'];?></b>
	                </h4>
	              </div>
	            </div>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <div class="content">
	      <div class="container">
	        <div class="row">
	          <div class="col-lg-6">
	          	<div class="card card-primary card-outline">
	              <div class="card-body">
	                <h2><a href="<?=base_url('Main/manajemen_obat')?>">Info Obat</a></h2>
	                <div class="row">
	                	<a href="#" class="btn btn-primary col-3">Jumlah Seluruh Obat: <?= $jumlah_obat[0]['jumlah_obat'];?></a>
	                	<a href="#" class="btn btn-primary col-3">Total Obat Expired Aktif: <?=$expired[0]['expired'];?></a>
	                	<a href="#" class="btn btn-primary col-3">Total Obat NonExpired: <?=$nonexpired[0]['nonexpired'];?></a>
	                </div>
	              </div>
	            </div><!-- /.card -->
	          </div>
	          <!-- /.col-md-6 -->
	          <div class="col-lg-6">
	            <div class="card card-secondary card-outline">
	              <div class="card-body">
	                <h2><a href="<?=base_url('Main/user')?>">Info User</a></h2>
	                <div class="row">
	                	<a href="#" class="btn btn-primary col-3">Total User: <?=$jumlah_user[0]['jumlah_user'];?></a>
	                	<a href="#" class="btn btn-primary col-3">Total User Aktif: <?=$aktif[0]['jumlah_user_aktif'];?></a>
	                	<a href="#" class="btn btn-primary col-3">Total User Belum Aktif: <?=$nonaktif[0]['jumlah_user_nonaktif'];?></a>
	                </div>
	              </div>
	            </div><!-- /.card -->
	          </div>
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	          	 <div class="card">
	              <div class="card-header">
	                <h3 class="card-title">DataTable with minimal features & hover style</h3>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body">
	                <table class="table table-bordered">
	                    <thead class="thead-dark">
	                      <tr>
	                        <th>NO</th>
	                        <th>Nama Obat</th>
	                        <th>Jenis Obat</th>
	                        <th>Satuan</th>
	                        <th>Harga</th>
	                        <th>Stok</th>
	                        <th>Tanggal Expired</th>
	                      </tr>
	                    </thead>
	                    <tbody>
	                    <?php  
	                    $no = 0;
	                       foreach ($list as $nilai) {
	                          ?>
	                            <tr>
	                              <td><?= ++$no;?></td>
	                              <td><?=$nilai['nama_obat'];?></td>
	                              <td><?=$nilai['nama_jenis_obat'];?></td>
	                              <td><?=$nilai['satuan'];?></td>
	                              <td><?=$nilai['harga'];?></td>
	                              <td><?=$nilai['stok'];?></td>
	                              <td><?=$nilai['tanggal_expired'];?></td>
	                            </tr>
	                          <?php
	                       }
	                    ?>
	                    </tbody>
                  </table>
	              </div>
	              <!-- /.card-body -->
	            </div>
	          </div>
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->
  	</div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</body>
<!-- jQuery -->
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</html>
