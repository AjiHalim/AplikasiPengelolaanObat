<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APLIKASI PENGELOLAAN OBAT</title>
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
              <h1 class="m-0">Jenis Obat</h1>
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
          <?php  echo @$_SESSION['pesan'];?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
               <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Jenis Obat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <a href="#" class="btn btn-primary col-12" data-toggle="modal" data-target="#tambah">Tambah Jenis Obat Baru</a>
                  <table id="example2" class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>ID</th>
                        <th>JENIS OBAT</th>
                        <th>KEPUTUSAN</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                       foreach ($jenis as $nilai) {
                          ?>
                            <tr>
                              <td><?=$nilai['id_jenis_obat'];?></td>
                              <td><?=$nilai['nama_jenis_obat'];?></td>
                              <td>
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#example_<?=$nilai['id_jenis_obat']?>">Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleM_<?=$nilai['id_jenis_obat']?>">Hapus</a>
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
            foreach ($jenis as $key) {
           ?>
            <div class="modal fade" id="exampleM_<?=$key['id_jenis_obat']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin Ingin Mengapus Jenis Obat ini <?=$key['nama_jenis_obat']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <a href="<?=base_url('Proses/prosesHapusJenisObat/').$key['id_jenis_obat']?>" class="btn btn-danger">Hapus</a>
                         <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                      </div>
                    </div>
                  </div>
                </div>
           <?php
            }
          ?>
          <div class="modal fade" id="example_<?=$key['id_jenis_obat']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data jenis obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?=base_url('Proses/prosesEditJenisObat')?>" method="post">
                      <label for="nama">edit Nama Jenis Obat:</label>
                      <input type="text" name="nama" class="form-control" value="<?=$key['nama_jenis_obat']?>">
                      <input type="text" name="id" value="<?=$key['id_jenis_obat']?>" hidden="" >    
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ubah">
                  </form>
                     <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                  </div>
                </div>
              </div>
          </div>

          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url('Proses/prosesTambahJenisObat')?>" method="post">
                            <label for="nama"> Nama Jenis Obat:</label>
                            <input type="text" name="nama" class="form-control" ><br>    
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
</html>
