<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Dashboard</title>

    <?php // Memuat head.php
  $this->load->view('admin/UI_elements/head');
  ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <div class="wrapper">
        <!-- Navbar -->
        <?php 
    $this->load->view('admin/UI_elements/navbar');
    ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php 
    $this->load->view('admin/UI_elements/sidebar');
    ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            if ($this->session->flashdata('alert') == 'admin_login_sukses'):
            ?>
            <div class="alert alert-success alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Berhasil Login
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'admin_sudah_login'):
            ?>
            <div class="alert alert-warning alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Sudah Login
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'update_data_user'):
                ?>
            <div class="alert alert-success alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Berhasil Ganti Kata Sandi
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'failed_change_pw'):
                ?>
            <div class="alert alert-danger alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Gagal Mengganti Kata Sandi
            </div>
            <?php
            endif;
            ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h2 class="m-0">Dashboard</h2>
                    <span class="m-0" id="currentDateTime"></span>
                </div><!-- /.row -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info Box_1 -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box Informasi Total Pegawai Aktif -->
                            <div class="small-box" style="background-color: #3498db; color: white;">
                                <div class="inner">
                                    <h3><?php echo $JumlahPegawai; ?></h3>
                                    <p style="margin: 0;">Total</p>
                                    <p style="margin: 0;">Pegawai</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo base_url('Admin/Datapegawai'); ?>" class="small-box-footer">Lebih
                                    Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box Informasi Total Pegawai Sedang Cuti-->
                            <div class="small-box" style="background-color: #e74c3c; color: white">
                                <div class="inner">
                                    <h3><?php echo $totalPegawaiCuti ?></h3>

                                    <p style="margin: 0;">Total </p>
                                    <p style="margin: 0;">Pegawai Sedang Cuti</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-umbrella-beach"></i>
                                </div>
                                <a href="<?php echo base_url('Admin/Kehadiran'); ?>" class="small-box-footer">Lebih
                                    Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box Informasi Total Pegawai Yang Sedang Dinilai-->
                            <div class="small-box" style="background-color: #27ae60; color: white">
                                <div class="inner">
                                    <h3><?php echo $totalPegawaiIzin ?></h3>

                                    <p style="margin: 0;">Total </p>
                                    <p style="margin: 0;">Pegawai Yang Sedang Izin</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <a href="<?php echo base_url('Admin/Kehadiran'); ?>" class="small-box-footer">Lebih
                                    Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box Informasi Total Pegawai Datang Tepat Waktu-->
                            <div class="small-box" style="background-color: #2ecc71; color: white">
                                <div class="inner">
                                    <h3><?php echo $totalPegawaiTepatWaktu; ?></h3>

                                    <p style="margin: 0;">Total </p>
                                    <p style="margin: 0;">Pegawai Datang Tepat Waktu</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <a href="<?php echo base_url('Admin/Kehadiran'); ?>" class="small-box-footer">Lebih
                                    Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php 
  $this->load->view('admin/UI_elements/footer');
  ?>

        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
        </script>

        <script>
        // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
        // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
        // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan('slow')
        $('#feedback').delay(3000).fadeOut('slow');

        // Fungsi untuk memperbarui tanggal dan waktu saat ini
        function updateCurrentDateTime() {
            // Membuat objek Date yang mewakili waktu saat ini
            const currentDateTime = new Date();

            // Mengatur opsi untuk memformat tanggal
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };

            // Memformat tanggal saat ini ke dalam format yang ditentukan oleh opsi di atas
            const formattedDate = currentDateTime.toLocaleDateString('id-ID', dateOptions);

            // Mengatur opsi untuk memformat waktu
            const timeOptions = {
                hour: '2-digit',
                minute: '2-digit'
            };
            // Memformat waktu saat ini ke dalam format yang ditentukan oleh opsi di atas
            const formattedTime = currentDateTime.toLocaleTimeString('id-ID', timeOptions);

            // Menggabungkan tanggal dan waktu yang diformat ke dalam satu string
            const formattedDateTime = `${formattedDate} | Pukul ${formattedTime} WIB`;

            // Memperbarui teks di elemen HTML dengan ID 'currentDateTime' dengan waktu yang sudah diformat
            document.getElementById('currentDateTime').textContent = formattedDateTime;
        }

        // Memanggil fungsi inisial untuk menampilkan tanggal dan waktu saat ini
        updateCurrentDateTime();

        // Memperbarui tanggal dan waktu setiap detik sekali
        setInterval(updateCurrentDateTime, 1000);
        </script>

        <script>
        $(function() {
            // Inisialisasi DataTable untuk tabel dengan id "example1"
            $("#example1").DataTable({
                "paging": true, // Memungkinkan penomoran halaman
                "lengthChange": true, // Memungkinkan perubahan jumlah data per halaman
                "searching": true, // Memungkinkan fitur pencarian
                "ordering": true, // Memungkinkan pengurutan kolom
                "autoWidth": false, // Menonaktifkan penyesuaian otomatis lebar kolom
                "responsive": true, // Mengaktifkan responsivitas untuk tampilan yang lebih baik
                "columnDefs": [{
                    "targets": -1, // Mengarahkan ke kolom terakhir (TOMBOL AKSI)
                    "orderable": false, // Menonaktifkan pengurutan untuk kolom ini
                }],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            // Inisialisasi DataTable untuk tabel dengan id "example2"
            $("#example2").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "autoWidth": false,
                "responsive": true,
                "columnDefs": [{
                    "targets": -1, // Mengarahkan ke kolom terakhir (TOMBOL AKSI)
                    "orderable": false, // Menonaktifkan pengurutan untuk kolom ini
                }],
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        </script>
</body>

</html>