<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in  APLIKASI PENGELOLAAN OBAT</title>
  <style type="text/css">
  	.ucapan {
  		padding: 10px;
  		border-radius: 5px;
  	}
  	.card{ margin-top: 10px; }
  </style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
	    <a href="#"><b>LOGIN</b></a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
	  	<?php  echo @$_SESSION['berhasil']; ?>
	  	<?php  echo @$_SESSION['gagal']; ?>
	    <div class="card-body login-card-body">
	      	<p class="login-box-msg">Login Untuk Mengakses Aplikasi</p>

	      	<form action="<?=base_url('Proses/prosesLogin')?>" method="post">
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Username" name='username'>
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-user"></span>
		            </div>
		          </div>
		        </div>
		        <div class="input-group mb-3">
		          <input type="password" class="form-control" placeholder="Password" name="password">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-lock"></span>
		            </div>
		          </div>
		        </div>
		        <div class="row">
		            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
		          <!-- /.col -->
		        </div>
	      	</form>
		    <p class="mb-0">
		        <a href="<?=base_url('Proses/daftar')?>" class="text-center">Belum Punya Akun, Ayo Buat Akun Mu!</a>
		    </p>
	    </div>
	    <!-- /.login-card-body -->
	  </div>
	</div>
</body>
</html>
