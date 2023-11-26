  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url().'Admin/Dashboard'; ?>" class="brand-link">
      <img src="<?php echo base_url(); ?>/assets/dist/img/LambangPolri.png" alt="LambangPOLRI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SIMANKA - POCIK</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Navigasi Ke Halaman Dashboard -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Dashboard'; ?>" class="nav-link" data-page="Dashboard">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Data Pegawai -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Datapegawai'; ?>" class="nav-link" data-page="Datapegawai">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pegawai
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Kehadiran -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Kehadiran'; ?>" class="nav-link" data-page="Kehadiran">
              <i class="nav-icon fas fa-stopwatch"></i>
              <p>
                Kehadiran
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Izin -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Izin'; ?>" class="nav-link" data-page="Izin">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Izin
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Cuti -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Cuti'; ?>" class="nav-link" data-page="Cuti">
              <i class="nav-icon fas fa-umbrella-beach"></i>
              <p>
                Cuti
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Penggajian -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Penggajian'; ?>" class="nav-link" data-page="Penggajian">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Penggajian
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Evaluasi Kinerja  -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/EvaluasiKerja'; ?>" class="nav-link" data-page="EvaluasiKerja">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Evaluasi Kinerja
              </p>
            </a>
          </li>

          <!-- Navigasi Ke Halaman Promosi Pegawai -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/LihatPerubahan'; ?>" class="nav-link">
              <i class="nav-icon fas fa-arrow-up"></i>
              <p>
                Promosi Pegawai
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <!-- Navigasi Ke Halaman Lihat Perubahan -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'Admin/LihatPerubahan'; ?>" class="nav-link" data-page="LihatPerubahan">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Perubahan</p>
                </a>
              </li>

              <!-- Navigasi Ke Halaman Rekam Promosi -->
              <li class="nav-item">
                <a href="<?php echo base_url().'Admin/RekamPromosi'; ?>" class="nav-link" data-page="RekamPromosi">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekam Promosi</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Navigasi Ke Halaman Laporan -->
          <li class="nav-item">
            <a href="<?php echo base_url().'Admin/Dashboard'; ?>" class="nav-link" data-page="Laporan">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Dapatkan nama halaman aktif dari URL
    var currentPage = window.location.href.split('/').pop();

    // Loop melalui setiap modul navigasi
    $('.nav-link').each(function() {
      var pageName = $(this).data('page');

      // Periksa jika atribut data-page cocok dengan halaman aktif
      if (pageName === currentPage) {
        // Tambahkan class "active" atau efek penanda latar belakang
        $(this).addClass('active');
      }
    });
  });
</script>


