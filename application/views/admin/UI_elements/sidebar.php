  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo base_url(); ?>/assets/dist/img/admin.png" class="img-circle elevation-2"
                      alt="Admin Image">
              </div>
              <div class="info">
                  <a href="<?php echo base_url().'Admin/Dashboard'; ?>" class="d-block">Admin</a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

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
                              Absen
                          </p>
                      </a>
                  </li>

                  <!-- Navigasi Ke Halaman Laporan -->
                  <li class="nav-item">
                      <a href="<?php echo base_url().'Admin/Laporan'; ?>" class="nav-link" data-page="Laporan">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                              Laporan
                          </p>
                      </a>
                  </li>
                  <!-- Navigasi Ke Halaman Laporan -->
                  <li class="nav-item">
                      <a href="<?php echo base_url().'Admin/Perubahan_pangkat'; ?>" class="nav-link"
                          data-page="Perubahan_pangkat">
                          <i class="nav-icon fas fa-star"></i>
                          <p>
                              Perubahan Pangkat
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