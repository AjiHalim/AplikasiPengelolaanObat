<?php  ?>
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
              <h1 class="m-0">Manajemen obat</h1>
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
                	<div class="col-lg-12">
		              <div class="card card-primary card-outline">
		                <div class="card-body">
		                  <h2><a href="#">Info Obat</a></h2>
		                  <div class="row">
		                    <span class="bg-primary col-3">Total Obat: <?=$jumlah[0]['jumlah_obat'];?></span>
		                    <a href="#" class="btn btn-primary col-3">Total Obat Expired Aktif: <?=$expired[0]['expired'];?></a>
		                    <a href="#" class="btn btn-primary col-3">Total Obat NonExpired: <?=$nonexpired[0]['nonexpired'];?></a>
		                    <a href="#" class="btn btn-primary col-" data-toggle="modal" data-target="#tambah">Tambah Data Obat Baru</a>
		                  </div>
		                </div>
		              </div><!-- /.card -->
		            </div>
                  <table id="example2" class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th>NO</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal Expired</th>
                        <th>Keputusan</th>
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
            foreach ($list as $key) {
           ?>
            <div class="modal fade" id="exampleM_<?=$key['id_jenis_obat']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin Ingin Mengapus DAta Obat ini <?=$key['nama_obat']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <a href="<?=base_url('Proses/prosesHapusObat/').$key['id_obat']?>" class="btn btn-danger">Hapus</a>
                         <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                      </div>
                    </div>
                  </div>
                </div>
           <?php
            }
          ?>
          <!-- modal edit data -->
          <div class="modal fade" id="example_<?=$key['id_jenis_obat']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?=base_url('Proses/prosesEditObat')?>" method="post">
                      <label for="nama"> Nama Jenis Obat:</label>
                      <select name="nama_jenis_obat" class="form-control">
                      	<?php foreach ($jenis as $value) {
                      	?>
                      		<option><?=$value['nama_jenis_obat']?></option>
                      	<?php
                      	} ?>
                      </select>
                      <label for="nama">Nama Obat:</label>
                      <input type="text" name="nama" class="form-control" value="<?=$key['nama_obat']?>">
                      <label for="nama">Satuan</label>
                      <input type="text" name="satuan" class="form-control" value="<?=$key['satuan']?>">
                      <label for="nama">Stock</label>
                      <input type="text" name="stok" class="form-control" value="<?=$key['stok']?>">
                      <label for="nama">Tanggal Expired</label>
                      <input type="text" name="kadarluasa" class="form-control" value="<?=$key['tanggal_expired']?>">
                      <input type="text" name="id" value="<?=$key['id_obat']?>" hidden="" >    
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ubah">
                  </form>
                     <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                  </div>
                </div>
              </div>
          </div>

          <!-- modal Tambah data -->
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
                        <form action="<?=base_url('Proses/prosesTambahObat')?>" method="post">
		                      <label for="nama">Nama Obat:</label>
		                      <input type="text" name="nama" class="form-control" >
		                      <label for="nama"> Nama Jenis Obat:</label>
		                      <select name="nama_jenis_obat" class="form-control">
		                      	<?php foreach ($jenis as $value) {
		                      	?>
		                      		<option><?=$value['nama_jenis_obat']?></option>
		                      	<?php
		                      	} ?>
		                      </select>
		                      <label for="nama">Satuan</label>
		                      <input type="number" name="satuan" class="form-control">
		                      <label for="nama">Stock</label>
		                      <input type="number" name="stok" class="form-control" >
		                      <label for="nama">Tanggal Expired</label>
		                      <input type="date" name="kadarluasa" class="form-control">
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
