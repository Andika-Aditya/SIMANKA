<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK | BERANDA</title>

    <?php // Memuat head.php
    $this->load->view('pegawai/UI_elements/head');
    ?>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/dist/img/landing_icon.svg" type="image/svg" />

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
    .Containers {
        width: 100%;
        /* Set lebar wadah menjadi 100% */
        max-width: 600px;
        /* Atur lebar maksimum sesuai kebutuhan Anda */
        margin: 0 auto;
        /* Pusatkan wadah */
    }

    .Containers img {
        width: 100%;
        /* Set lebar gambar menjadi 100% dari lebar wadah */
        height: auto;
        /* Biarkan tinggi otomatis untuk mempertahankan proporsi aspek */
        display: block;
        /* Hilangkan spasi putih di sekitar gambar */
    }

    /* The dots with elongated shape */
    .dots {
        cursor: pointer;
        height: 4px;
        /* Tinggi dots */
        width: 24px;
        /* Lebar dots */
        margin: 0 3px;
        background: #fff;
        /* Ganti latar belakang dengan warna putih */
        opacity: 0.3;
        display: inline-block;
        transition: background-color 0.5s ease;
        border-radius: 2px;
        /* Sesuaikan border-radius untuk membuat dots menjadi lonjong */
        border: 2px solid #3056D3;
        /* Tambahkan border dengan warna sesuai keinginan Anda */
    }

    .enable,
    .dots:hover {
        background: #3056D3;
        /* Ganti latar belakang dengan warna putih */
        opacity: 1;
    }

    /* Faint animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.4s;
        animation-name: fade;
        animation-duration: 1.4s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .5
        }

        to {
            opacity: 2
        }
    }

    @keyframes fade {
        from {
            opacity: .5
        }

        to {
            opacity: 2
        }
    }
    </style>

    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        /* Mengisi tinggi minimum untuk body agar footer tetap di bawah */
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    .footer {
        background-color: #ffff;
        color: #7c8695;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content" style="background-color: #f4f6f9;">
                <div class="container-fluid">
                    <div class="card">
                        <?php
                            if ($this->session->flashdata('alert') == 'login_sukses'):
                            ?>
                        <div class="alert alert-success alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Berhasil Login
                        </div>
                        <?php
                                elseif ($this->session->flashdata('alert') == 'sudah_login'):
                                ?>
                        <div class="alert alert-warning alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Sudah Login
                        </div>
                        <?php
                                elseif ($this->session->flashdata('alert') == 'update_data'):
                                ?>
                        <div class="alert alert-success alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Data Berhasil Di Update
                        </div>
                        <?php
                            elseif ($this->session->flashdata('alert') == 'absen_data'):
                            ?>
                        <div class="alert alert-success alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Berhasil Absen
                        </div>
                        <?php
                            elseif ($this->session->flashdata('alert') == 'update_data_user'):
                                ?>
                        <div class="alert alert-success alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Berhasil Ganti Kata Sandi
                        </div>
                        <?php
                            elseif ($this->session->flashdata('alert') == 'failed_change_pw'):
                                ?>
                        <div class="alert alert-danger alert-dismissible animated fadeInDown"
                            style="position: absolute; width: 100%; z-index: 2" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Gagal Mengganti Kata Sandi
                        </div>
                        <?php
                                endif;
                                ?>
                        <div class="card-header" style="background-color: #3056D3; color: white;">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>
                                            <span class="description-text"><b><?php echo $data_pg->Pangkat_current ?>
                                                    <?php echo $data_pg->Nama_depan ?>
                                                    <?php echo $data_pg->Nama_belakang ?></b></span><br>
                                            <span class="description-text">
                                                NRP&emsp;&emsp;&emsp;&emsp;&emsp;:
                                                <?php echo $data_pg->NRP ?></span><br>
                                            <span class="description-text">Jabatan &emsp;&emsp;&emsp;&nbsp;:
                                                <?php echo $data_pg->Jabatan_current  ?> </span><br>
                                            <span class="description-text">Alamat
                                                Email&emsp;&nbsp;: <?php echo $data_pg->Alamat_email ?></span>
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <div class="card-footer mx-auto text-center"
                                style="background-color: #0a58ca; border-radius: 10px 10px 10px 10px;">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-4 col-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Pangkat</h5>
                                            <span
                                                class="description-text"><?php echo $data_pg->Pangkat_current ?></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 col-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Tanggal Kenaikan Pangkat Terakhir
                                            </h5>
                                            <span class="description-text" id="tglkenpangakhir"></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 col-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Unit Kerja</h5>
                                            <span class="description-text"><?php echo $data_pg->Unit_kerja ?></span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card-header -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <?php
                                  function getIndonesianMonth($monthNumber) {
                                      $monthNames = array(
                                          '01' => 'Januari',
                                          '02' => 'Februari',
                                          '03' => 'Maret',
                                          '04' => 'April',
                                          '05' => 'Mei',
                                          '06' => 'Juni',
                                          '07' => 'Juli',
                                          '08' => 'Agustus',
                                          '09' => 'September',
                                          '10' => 'Oktober',
                                          '11' => 'November',
                                          '12' => 'Desember'
                                      );

                                      return $monthNames[$monthNumber];
                                  }
                                  ?>
                    <!-- Tabel Data Hadir -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-bullhorn"></i>
                                        <b>INFO</b>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="callout callout-info">
                                        <h4 style="font-weight: bold;"> <i class="icon fas fa-info"></i> Pemberitahuan </h4>
                                        <h5>Perubahan Pangkat - <?php echo $data_pg->Nama_depan ?>
                                            <?php echo $data_pg->Nama_belakang ?></h5>
                                        <?php
                                            if ($data_pg->Jenis_perubahan == ''):
                                                ?>
                                        <p><i class="fas fa-ban"></i>
                                            Belum ada informasi perubahan pangkat.</p>
                                        <?php
                                            else :
                                                ?>
                                        <ul>
                                            <?php foreach($data_pangkat as $dp) : ?>
                                            <li>Nama
                                                Lengkap&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                <?php echo $dp->Nama_depan ?>
                                                <?php echo $dp->Nama_belakang ?></li>
                                            <li>NRP&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                <?php echo $dp->NRP ?></li>
                                            <li>Jenis Perubahan&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:
                                                <?php echo $dp->Jenis_perubahan ?></li>
                                            <li>Pangkat Setelah Perubahan&nbsp;&nbsp;:
                                                <?php echo $dp->Pangkat_current ?></li>
                                            <li>Tanggal Perubahan&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                <?php echo $dp->Tgl_perubahan_pangkat ?></li>
                                            <li>Bukti
                                                SK
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                <button class="badge badge-primary" style="border: none;"
                                                    title="Lihat Selengkapnya" data-toggle="modal"
                                                    data-target="#detailModal<?php echo $dp->id_pegawai; ?>">
                                                    <i class="fa fa-eye"></i> BUKTI SK
                                                </button>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php
                                            endif;
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Hadir</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1"
                                            class="table table-bordered table-striped table-hover responsive nowrap"
                                            width="100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>NRP</th>
                                                    <th>TANGGAL HADIR</th>
                                                    <th>JAM MASUK</th>
                                                    <th>STATUS HADIR</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $no = 1;
                                            foreach($data_hadir as $d_hdr) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $d_hdr->NRP ?></td>
                                                    <td align="center" class="tgl-hadir">
                                                        <?php echo $d_hdr->tanggal_kehadiran ?></td>
                                                    <td align="center" class="jam-masuk"><?php echo $d_hdr->jam_masuk ?>
                                                    </td>
                                                    <td align="center"><?php echo $d_hdr->Status_hadir ?></td>
                                                    <td align="center">
                                                        <?php if ($d_hdr->validasi == 'SUDAH') : ?>
                                                        <span class="badge badge-success">Disetujui</span>
                                                        <?php elseif ($d_hdr->validasi == '') : ?>
                                                        <span class="badge badge-secondary">Belum Disetujui</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- /.Tabel Data Hadir -->

                    <!-- Tabel Data Izin & Cuti -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Data Izin dan Cuti</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example2"
                                            class="table table-bordered table-striped table-hover responsive nowrap"
                                            width="100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>NRP</th>
                                                    <th>TANGGAL MULAI</th>
                                                    <th>TANGGAL SELESAI</th>
                                                    <th>STATUS HADIR</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $no = 1;
                                            foreach($data_cutiizin as $d_cuti_izin) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $d_cuti_izin->NRP ?></td>
                                                    <td align="center" class="tgl-mulai">
                                                        <?php echo $d_cuti_izin->tanggal_kehadiran ?>
                                                    </td>
                                                    <td align="center" class="tgl-selesai">
                                                        <?php echo $d_cuti_izin->tanggal_selesai ?></td>
                                                    <td align="center"><?php echo $d_cuti_izin->Status_hadir ?></td>
                                                    <td align="center">
                                                        <?php if ($d_cuti_izin->validasi == 'SUDAH') : ?>
                                                        <span class="badge badge-success">Disetujui</span>
                                                        <?php elseif ($d_cuti_izin->validasi == '') : ?>
                                                        <span class="badge badge-secondary">Belum Disetujui</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- /.Tabel Data Absen -->
                </div>
                <!-- container-fluid -->
            </section>
            <!-- /.content-wrapper -->
        </div>
    </div>
    <!-- wrapper -->
    <footer class="main-footer text-center">
        <strong>&copy; <?php echo date('Y'); ?> SIKAMPEK - Sistem Informasi Anggota Kepolisian
            Cikampek.</strong>
    </footer>

    <?php foreach($data_pangkat as $dp) : ?>
    <!-- Modal -->
    <div class="modal fade" id="detailModal<?php echo $dp->id_pegawai; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bukti SK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display absen details for the current pegawai -->
                    <p>Nama&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:
                        <?php echo $dp->Pangkat_current ?>
                        <?php echo $dp->Nama_depan ?>
                        <?php echo $dp->Nama_belakang ?></p>

                    <p>NRP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:
                        <?php echo $dp->NRP ?>
                    </p>

                    <p>Jenis Perubahan&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>
                            <?php echo $dp->Jenis_perubahan ?> </b>
                    </p>

                    <p>Pangkat Saat Ini &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:
                        <?php echo $dp->Pangkat_current ?></p>

                    <p>Tanggal Perubahan Pangkat&nbsp;&nbsp;&nbsp;:
                        <?php echo date('d', strtotime($dp->Tgl_perubahan_pangkat)) . ' ' . getIndonesianMonth(date('m', strtotime($dp->Tgl_perubahan_pangkat))) . ' ' . date('Y', strtotime($dp->Tgl_perubahan_pangkat)); ?>
                    </p>

                    <p>Bukti SK &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;:
                    </p>
                    <br>
                    <img src="<?php echo empty($dp->Bukti_SK) ? base_url() . 'upload/admin/bukti_sk/default-img.jpg' : base_url() . 'upload/admin/bukti_sk/' . $dp->Bukti_SK; ?>"
                        class="img-fluid" alt="User Image"><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php 
        $this->load->view('pegawai/UI_elements/footer');
    ?>

    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <script>
    $(function() {
        // Inisialisasi DataTable untuk tabel dengan id "example1"
        $("#example1").DataTable({
            "paging": true, // Aktifkan paging (tampilkan halaman)
            "lengthChange": true, // Aktifkan pilihan jumlah entri per halaman
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan penyortiran
            "autoWidth": false, // Matikan penyesuaian lebar otomatis
            "responsive": false, // Aktifkan desain responsif
            "scrollX": true,
            "columnDefs": [{
                "targets": -1,
                "orderable": false,
            }],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak tersedia"
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        // Inisialisasi DataTable untuk tabel dengan id "example1"
        $("#example2").DataTable({
            "paging": true, // Aktifkan paging (tampilkan halaman)
            "lengthChange": true, // Aktifkan pilihan jumlah entri per halaman
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan penyortiran
            "autoWidth": false, // Matikan penyesuaian lebar otomatis
            "responsive": false, // Aktifkan desain responsif
            "scrollX": true,
            "columnDefs": [{
                "targets": -1,
                "orderable": false,
            }],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak tersedia"
            }
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan('slow')
    $('#feedback').delay(3000).fadeOut('slow');

    function tanggalIndo(tanggal) {
        // Jika tanggal kosong, tampilkan hanya kota
        if (!tanggal) {
            return '';
        }
        // Array nama bulan dalam bahasa Indonesia
        var bulanArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ];

        // Mendapatkan nilai tanggal
        var tanggal_arr = tanggal.split('-');
        var hari = tanggal_arr[2];
        var bulan = bulanArr[parseInt(tanggal_arr[1]) - 1]; // Menggunakan array bulan
        var tahun = tanggal_arr[0];

        // Menghasilkan format "Bandung, 16 Desember 2023"
        var hasil_formatted = hari + ' ' + bulan + ' ' + tahun;

        return hasil_formatted;
    }

    var tglnaikpangkat = '<?php echo $data_pg->Tgl_kenaikan_pangkat_terakhir; ?>';

    // Menggunakan fungsi tanggalIndo
    var tanggal_tglnaikpangkat_formatted = tanggalIndo(tglnaikpangkat);

    // Menyimpan hasil format tanggal ke dalam input
    document.getElementById('tglkenpangakhir').innerHTML = tanggal_tglnaikpangkat_formatted;

    document.addEventListener("DOMContentLoaded", function() {
        // Define a function to format dates
        function formatDateElements(className) {
            var dateElements = document.getElementsByClassName(className);

            for (var i = 0; i < dateElements.length; i++) {
                var rawDate = dateElements[i].textContent;
                var formattedDate = tanggalIndo(rawDate);
                dateElements[i].textContent = formattedDate;
            }
        }

        // Call the function for each relevant class
        formatDateElements('tgl-hadir');
        formatDateElements('tgl-mulai');
        formatDateElements('tgl-selesai');
    });

    function waktuIndo(jam, menit) {


        var hasil_formatted = jam + ':' + menit + ' WIB ';
        return hasil_formatted;
    }

    // Define a function to format time
    function formatTimeElements(className) {
        var timeElements = document.getElementsByClassName(className);

        for (var i = 0; i < timeElements.length; i++) {
            var rawTime = timeElements[i].textContent;
            var timeParts = rawTime.split(':');
            var formattedTime = waktuIndo(timeParts[0], timeParts[1]);
            timeElements[i].textContent = formattedTime;
        }
    }

    formatTimeElements('jam-masuk');
    </script>
</body>

</html>