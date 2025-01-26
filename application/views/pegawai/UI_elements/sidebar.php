  <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?php echo empty($data_pg->Foto_pegawai) ? base_url() . 'upload/user/default-img.jpg' : base_url() . 'upload/user/' . $data_pg->Foto_pegawai; ?>"
                      class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="<?php echo base_url().'Pegawai/Beranda'; ?>"
                      class="d-block"><?php echo $data_pg->Pangkat_current ?>
                      <?php echo $data_pg->Nama_depan ?></a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <!-- Navigasi Ke Halaman Dashboard -->
                  <li class="nav-item">
                      <a href="<?php echo base_url().'Pegawai/Beranda'; ?>" class="nav-link" data-page="Beranda">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Beranda
                          </p>
                      </a>
                  </li>

                  <!-- Navigasi Ke Halaman Data Pegawai -->
                  <li class="nav-item">
                      <a href="<?php echo base_url().'Pegawai/Kelola_Data'; ?>" class="nav-link"
                          data-page="Kelola_Data">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Kelola Data Pribadi
                          </p>
                      </a>
                  </li>

                  <!-- Navigasi Ke Halaman Kehadiran -->
                  <li class="nav-item">
                      <a href="<?php echo base_url().'Pegawai/Absen'; ?>" class="nav-link" data-page="Absen">
                          <i class="nav-icon fas fa-stopwatch"></i>
                          <p>
                              Absen
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