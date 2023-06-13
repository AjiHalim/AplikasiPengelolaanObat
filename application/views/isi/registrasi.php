<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun baru</title>
  <style type="text/css">
  	.card {
  		padding: 10px;
  	}
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Aplikasi Pengelolaan Obat</a>
  </div>
 	<style type="text/css">
 		.ucapan {
	  		padding: 10px;
	  		border-radius: 5px;
	  		
	  	}
	  	.card{ margin-top: 10px; }
 	</style>
  <div class="card">
  	<?php  echo @$_SESSION['berhasil']; ?>
    <div class="card-body register-card-body">
      <p class="login-box-msg">Buat Akun Baru Mu</p>

      <form action="<?=base_url('Proses/prosesRegistrasi')?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Password" name="sandi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="<?=base_url('Proses')?>" class="text-center">Sudah Punya Akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</body>
</html>
