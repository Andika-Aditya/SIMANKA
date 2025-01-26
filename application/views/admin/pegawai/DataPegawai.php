<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Pegawai</title>

    <!-- Memuat head.php -->
    <?php 
        $this->load->view('admin/UI_elements/head');
    ?>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <!-- Font Awesome CSS (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Pegawai</h1>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if ($this->session->flashdata('alert') == 'hapus_pegawai'):
                        ?>
                    <div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Data berhasil dihapus
                    </div>
                    <?php
                    endif;
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <!-- card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="alert alert-info alert-dismissible"
                                        style=" color: #3498db; background-color: #dae8f2; border-color: #b8d2e5; border-top-width:0; border-right-width: 2px; border-bottom-width: 0; border-left-width: 2px;">
                                        <h5><i class="icon fa fa-info"></i> <strong>Informasi:</strong></h5>
                                        <h6 align="justify">
                                            <ul>
                                                <li>
                                                    <strong>
                                                        Klik tombol/ikon ( <p class="badge badge-success"><i
                                                                class="fa fa-search-plus"></i></p> ) untuk melihat
                                                        detail data.
                                                    </strong>
                                                </li>
                                                <li>
                                                    <strong> Klik tombol/ikon ( <p class="badge badge-danger"><i
                                                                class="fa fa-trash"></i></p> ) untuk menghapus data.
                                                    </strong>
                                                </li>
                                            </ul>
                                        </h6>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example1"
                                            class="table table-bordered table-striped table-hover responsive nowrap"
                                            width="100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>NRP</th>
                                                    <th>NAMA LENGKAP</th>
                                                    <th>PANGKAT</th>
                                                    <th>JABATAN</th>
                                                    <th>UNIT KERJA</th>
                                                    <th>GAJI</th>
                                                    <th>JENIS KELAMIN</th>
                                                    <th>TOMBOL AKSI</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                            $no = 1;
                                            foreach($pegawai as $pg) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $pg->NRP ?></td>
                                                    <td><?php echo $pg->Nama_lengkap ?></td>
                                                    <td align="center"><?php echo $pg->Pangkat_current ?></td>
                                                    <td align="center"><?php echo $pg->Jabatan_current ?></td>
                                                    <td align="center"><?php echo $pg->Unit_kerja ?></td>
                                                    <td align="center">
                                                        <?php
                                                        // Menggunakan number_format untuk memformat nilai uang
                                                        $formatted_gaji = number_format($pg->Gaji_current, 0, ',', '.');
                                                    ?>
                                                        Rp. <?php echo $formatted_gaji; ?></td>
                                                    <td align="center"><?php echo $pg->Jenis_kelamin ?></td>
                                                    <td align="center">
                                                        <button class="btn btn-success btn-sm"
                                                            title="Lihat Selengkapnya" data-toggle="modal"
                                                            data-target="#detailModal<?php echo $pg->id_pegawai; ?>">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                        <a class="btn btn-danger btn-sm"
                                                            onclick="javascript: return confirm('Anda yakin hapus?')"
                                                            href="<?php echo base_url('Admin/hapus_pegawai/'.$pg->id_pegawai)?>"
                                                            title="Hapus Data">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

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


    <?php foreach($pegawai as $pg) : ?>
    <!-- Modal -->
    <div class="modal fade" id="detailModal<?php echo $pg->id_pegawai; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="info-box-content text-center">
                            <img src="<?php echo empty($pg->Foto_pegawai) ? base_url() . 'upload/user/default-img.jpg' : base_url() . 'upload/user/' . $pg->Foto_pegawai; ?>"
                                class="img-account-profile rounded-circle mb-2"
                                style="height: 10rem; border-radius: 50% !important;" alt="User Image"><br>
                            <input type="hidden" name="old_Foto_pegawai" class="form-control"
                                value="<?php echo $pg->Foto_pegawai; ?>">
                            <div class="small font-italic text-muted mb-4"><b>
                                    <?php echo $pg->Pangkat_current ?>
                                    <?php echo $pg->Nama_depan ?>
                                    <?php echo $pg->Nama_belakang ?> - <?php echo $pg->NRP ?>
                                </b>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" class="form-control"
                            value="<?php echo $pg->id_pegawai ?>" readonly>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-md-6">
                            <label>Nama Depan </label>
                            <input type="text" name="Nama_depan" id="namadepan" class="form-control"
                                value="<?php echo $pg->Nama_depan ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Belakang </label>
                            <input type="text" name="Nama_belakang" id="namabelakang" class="form-control"
                                value="<?php echo $pg->Nama_belakang ?>" readonly>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-md-3">
                            <label>NRP </label>
                            <input type="text" name="NRP" id="nrp" class="form-control" value="<?php echo $pg->NRP ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pangkat Saat Ini </label>
                            <input type="text" name="Pangkat_current" id="pangkat_curr" class="form-control"
                                value="<?php echo $pg->Pangkat_current ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Jabatan Saat Ini </label>
                            <input type="text" name="Jabatan_current" id="jabatan_curr" class="form-control"
                                value="<?php echo $pg->Jabatan_current ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Unit Kerja </label>
                            <input type="text" name="Unit_kerja" id="uk" class="form-control"
                                value="<?php echo $pg->Unit_kerja ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <?php
                            // Menggunakan number_format untuk memformat nilai uang
                            $formatted_gaji = number_format($pg->Gaji_current, 0, ',', '.');
                        ?>
                        <input type="text" name="Gaji_current" id="gaji" class="form-control"
                            value="Rp. <?php echo $formatted_gaji; ?>" readonly>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-md-6">
                            <label>Tanggal Bergabung </label>
                            <input type="text" name="Tanggal_bergabung" id="tglgabung"
                                value="<?php echo date('d', strtotime($pg->Tanggal_bergabung)) . ' ' . getIndonesianMonth(date('m', strtotime($pg->Tanggal_bergabung))) . ' ' . date('Y', strtotime($pg->Tanggal_bergabung)); ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Kenaikan Pangkat Terakhir
                            </label>
                            <input type="text" name="Tgl_kenaikan_pangkat_terakhir" id="tglkenpangakhir"
                                value="<?php echo date('d', strtotime($pg->Tgl_kenaikan_pangkat_terakhir)) . ' ' . getIndonesianMonth(date('m', strtotime($pg->Tgl_kenaikan_pangkat_terakhir))) . ' ' . date('Y', strtotime($pg->Tgl_kenaikan_pangkat_terakhir)); ?>"
                                class="form-control" readonly>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tempat Tanggal Lahir </label>
                        <input type="text" name="tempattgllhr" id="ttl"
                            value="<?php echo $pg->Tempat_lahir; ?>, <?php echo date('d', strtotime($pg->Tanggal_lahir)) . ' ' . getIndonesianMonth(date('m', strtotime($pg->Tanggal_lahir))) . ' ' . date('Y', strtotime($pg->Tanggal_lahir)); ?>"
                            class="form-control" readonly>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin </label>
                            <input type="text" name="Jenis_kelamin" id="jk" class="form-control"
                                value="<?php echo $pg->Jenis_kelamin; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status Pernikahan </label>
                            <input type="text" name="Status_pernikahan" id="statuskwn" class="form-control"
                                value="<?php echo $pg->Status_pernikahan; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <input type="text" name="Riwayat_pendidikan" id="pendAkhir" class="form-control"
                            value="<?php echo $pg->Riwayat_pendidikan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pengalaman Kerja</label>
                        <textarea type="text" name="Pengalaman_kerja" rows="3" id="pengalamankrj" class="form-control"
                            readonly><?php echo $pg->Pengalaman_kerja; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat </label>
                        <textarea class="form-control" id="Alamat" rows="3" name="Alamat"
                            readonly><?php echo $pg->Alamat; ?></textarea>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-md-6">
                            <label>Nomor Handphone </label>
                            <input type="text" name="Nomor_hp" id="noHP" class="form-control"
                                value="<?php echo $pg->Nomor_hp; ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat Email </label>
                            <input type="text" name="Alamat_email" id="email" class="form-control"
                                value="<?php echo $pg->Alamat_email; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php 
    $this->load->view('admin/UI_elements/footer');
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
    <!-- /.DataTables  & Plugins -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script>
    $(function() {
        // Inisialisasi DataTable dengan pengaturan tertentu
        $("#example1").DataTable({
            "paging": true, // Aktifkan paging (tampilkan halaman)
            "lengthChange": true, // Aktifkan pilihan jumlah entri per halaman
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan penyortiran
            "autoWidth": false, // Matikan penyesuaian lebar otomatis
            "responsive": false, // Aktifkan desain responsif
            "scrollX": true,
            "columnDefs": [{
                "targets": -
                    1, // Menghilangkan penyortiran kolom pada kolom terakhir (TOMBOL AKSI)
                "orderable": false, // Menonaktifkan penyortiran untuk kolom ini
            }],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak tersedia"
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>

    <script>
    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan ('slow')
    $('#feedback').delay(3000).fadeOut('slow');
    </script>

</body>

</html>