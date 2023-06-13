<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APLIKASI PENGELOLAAN OBAT </title>
  <style type="text/css">
    .row .btn, .row span{
      margin: 10px auto;
    }
    .row span{
      border-radius: 10px;
      text-align: center;
      padding-top: 10px;
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
              <h1 class="m-0">User</h1>
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
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h2><a href="#">Info Obat</a></h2>
                  <div class="row">
                    <span class="bg-primary col-3">Total User: <?=$jumlah[0]['jumlah_user'];?></span>
                    <a href="#" class="btn btn-primary col-3">Total User Aktif: <?=$aktif[0]['jumlah_user_aktif'];?></a>
                    <a href="#" class="btn btn-primary col-3">Total User Belum Aktif: <?=$nonaktif[0]['jumlah_user_nonaktif'];?></a>
                    <a href="#" class="btn btn-primary col-10" data-toggle="modal" data-target="#example">Tambah User Baru</a>
                  </div>
                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
               <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data user</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>USERNAME(s)</th>
                        <th>STATUS</th>
                        <th>KEPUTUSAN</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                       foreach ($list as $nilai) {
                          ?>
                            <tr>
                              <td><?=$nilai['id_user'];?></td>
                              <td><?=$nilai['fullname'];?></td>
                              <td><?=$nilai['username'];?></td>
                              <td>
                                <?php 
                                  if ($nilai['is_active'] == 0) {
                                    echo "User Tidak Aktif";
                                  }else {
                                     echo "User Aktif";
                                  }
                                ?> 
                              </td>
                              <td>
                                <?php 
                                  if ($nilai['is_active'] == 0) {
                                ?>
                                  <a href="<?=base_url('Main/aktif/').$nilai['id_user']?>" class="btn btn-primary">Aktifkan Akun</a>
                                <?php
                                  }else {
                                ?>
                                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?=$nilai['id_user']?>">Hapus Akun</a>
                                <?php
                                  }
                                ?> 
                              </td>
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
<!-- Modal -->
          <?php  
            foreach ($list as $key) {
           ?>
            <div class="modal fade" id="exampleModal_<?=$key['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin Ingin Mengapus Akun ini</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <a href="<?=base_url('Main/hapusUser/').$key['id_user']?>" class="btn btn-danger">Hapus</a>
                         <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                      </div>
                    </div>
                  </div>
                </div>
           <?php
            }
          ?>
          <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url('Proses/prosesRegistrasi')?>" method="post">
                          <label for="nama">Masukan Nama :</label>
                          <input type="text" name="nama" class="form-control"><br>
                          <label for="nama">Masukan Username :</label>
                          <input type="text" name="user" class="form-control"><br>
                          <label for="nama">Masukan Password :</label>
                          <input type="text" name="sandi" class="form-control"><br>
                        
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Tambah">
                      </form>
                         <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                      </div>
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
