  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-item menu-open" data-toggle="dropdown" href="#">
          <div class="brand-link" style="display: flex; align-items: center; margin-top: -5px; justify-content: flex-end;">
            <span class="brand-text font-weight-light" style="color:  black;"><b>Admin</b></span>
            <img src="<?php echo base_url(); ?>/assets/dist/img/user2-160x160.jpg" class="brand-image img-circle elevation-3" style="opacity: .8; " alt="Admin Image"><i class="fas fa-angle-down right" style="color:  black;"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Akun</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-id-card mr-2"></i>Profil Saya
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i>Ubah Kata Sandi
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url().'Login/admin';?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->