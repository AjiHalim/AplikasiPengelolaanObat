 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=base_url("Main/dashboard")?>" class="navbar-brand">
       <!--  <span class="brand-text font-weight-light">Pengelolaan Obat</span> -->
       <h2 style="margin-right: 20px">Aplikasi Pengelolaan Obat</h2>
      </a> <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?=base_url('Main/user')?>" class="nav-link">User</a>
          </li>
           <li class="nav-item">
            <a href="<?=base_url('Main/jenis_obat')?>" class="nav-link">Jenis Obat</a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Main/manajemen_obat')?>" class="nav-link">Manajemen Obat</a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('Main/Logout')?>" class="nav-link">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->