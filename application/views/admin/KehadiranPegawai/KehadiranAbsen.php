<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Absen</title>

    <?php // Memuat head.php
      $this->load->view('admin/UI_elements/head');
   ?>

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
                    <h1 class="m-0">Absen</h1>
                </div><!-- /.row -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if ($this->session->flashdata('alert') == 'update_absen'):
                      ?>
                    <div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Berhasil Validasi Absen
                    </div>
                    <?php
                      endif;
                      ?>
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 align="center"><b>Data Hadir, Izin, dan Cuti Pegawai</b></h4>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="alert alert-info alert-dismissible"
                                        style=" color: #3498db; background-color: #dae8f2; border-color: #b8d2e5; border-top-width:0; border-right-width: 2px; border-bottom-width: 0; border-left-width: 2px;">
                                        <h5><i class="icon fa fa-info"></i> <strong>Informasi:</strong></h5>
                                        <h6 align="justify">
                                            <ul>
                                                <li>
                                                    <strong>
                                                        Klik tombol ( <p class="badge badge-primary"><i
                                                                class="fa fa-eye ft-check-circle"></i>
                                                            BUKTI HADIR </p> ) untuk melihat detail absen.
                                                    </strong>
                                                </li>
                                                <li>
                                                    <strong> Klik tombol ( <p class="badge badge-secondary"><i
                                                                class="ft-check-circle"></i>
                                                            Validasi </p> ) untuk memvalidasi absen.
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
                                                    <th>TANGGAL MASUK/ AJUAN</th>
                                                    <th>NAMA LENGKAP</th>
                                                    <th>JAM MASUK</th>
                                                    <th>STATUS KEHADIRAN</th>
                                                    <th>BUKTI KEHADIRAN</th>
                                                    <th>VALIDASI</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach($absen as $absn) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $absn->NRP ?></td>
                                                    <td align="center">
                                                        <?php echo date('d', strtotime($absn->tanggal_kehadiran)) . ' ' . getIndonesianMonth(date('m', strtotime($absn->tanggal_kehadiran))) . ' ' . date('Y', strtotime($absn->tanggal_kehadiran)); ?>
                                                    </td>
                                                    <td><?php echo $absn->Nama_lengkap ?></td>
                                                    <td align="center"><?php echo $absn->jam_masuk?> WIB</td>
                                                    <td align="center">
                                                        <?php
                                                      if ($absn->Status_hadir == 'HADIR'):
                                                          ?>
                                                        <div class="badge badge-success"><i class="ft-check-circle"></i>
                                                            HADIR </div>
                                                        <?php
                                                      elseif ($absn->Status_hadir == 'IZIN') :
                                                          ?>
                                                        <div class="badge badge-primary"><i class="ft-x-circle"></i>
                                                            IZIN
                                                        </div>
                                                        <?php
                                                    elseif ($absn->Status_hadir == 'CUTI') :
                                                        ?>
                                                        <div class="badge bg-indigo"><i class="ft-x-circle"></i> CUTI
                                                        </div>
                                                        <?php
                                                      endif;
                                                      ?>
                                                    </td>
                                                    <td align="center">
                                                        <button class="badge badge-primary" style="border: none;"
                                                            title="Lihat Selengkapnya" data-toggle="modal"
                                                            data-target="#detailModal<?php echo $absn->id_absen; ?>">
                                                            <i class="fa fa-eye"></i> BUKTI HADIR
                                                        </button>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                    if ($absn->validasi == 'SUDAH'):
                                                      ?>
                                                        <a class="badge badge-success" title="Telah Di validasi"
                                                            disabled><i class="fa fa-check"></i>
                                                        </a>
                                                        <?php
                                                      elseif ($absn->validasi == '' || $absn->validasi == 'BELUM'):
                                                        ?>
                                                        <button class="btn btn-secondary btn-sm validasi"
                                                            title="Validasi Kehadiran ? ">
                                                            <a
                                                                href="<?php echo base_url('Admin/validasi/'.$absn->id_absen) ?>">
                                                                <i class="ft-x-circle"></i><span
                                                                    style="color: white;">Validasi</span>
                                                            </a>
                                                        </button>
                                                        <?php
                                                      endif;
                                                      ?>
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
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php foreach($absen as $absn) : ?>
        <!-- Modal -->
        <div class="modal fade" id="detailModal<?php echo $absn->id_absen; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Absen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php foreach ($pegawai as $pg) : ?>
                        <?php if ($pg->id_pegawai == $absn->id_absenpegawai) : ?>

                        <!-- Display absen details for the current pegawai -->
                        <p>Nama&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?php echo $pg->Pangkat_current ?>
                            <?php echo $pg->Nama_depan ?>
                            <?php echo $pg->Nama_belakang ?></p>

                        <p>NRP &emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $pg->NRP ?></p>

                        <?php endif; ?>
                        <?php endforeach; ?>

                        <p>Status Hadir&emsp;&nbsp;&nbsp;&nbsp;: <b>
                                <?php echo $absn->Status_hadir ?> </b>
                        </p>

                        <?php if ($absn->Status_hadir != 'IZIN' && $absn->Status_hadir != 'CUTI') : ?>
                        <!-- Show Jam Masuk only if the status is not Izin or Cuti -->
                        <p>Jam Masuk&emsp;&emsp;&nbsp;: <?php echo $absn->jam_masuk ?> WIB</p>
                        <?php endif; ?>


                        <?php if ($absn->Status_hadir != 'IZIN' && $absn->Status_hadir != 'CUTI') : ?>

                        <p>Tanggal Hadir&nbsp;&nbsp;&nbsp;&nbsp;:
                            <?php echo date('d', strtotime($absn->tanggal_kehadiran)) . ' ' . getIndonesianMonth(date('m', strtotime($absn->tanggal_kehadiran))) . ' ' . date('Y', strtotime($absn->tanggal_kehadiran)); ?>
                        </p>

                        <?php else : ?>

                        <p>Tanggal Mulai&emsp;:
                            <?php echo date('d', strtotime($absn->tanggal_kehadiran)) . ' ' . getIndonesianMonth(date('m', strtotime($absn->tanggal_kehadiran))) . ' ' . date('Y', strtotime($absn->tanggal_kehadiran)); ?>
                        </p>

                        <p>Tanggal Selesai&nbsp;&nbsp;:
                            <?php echo date('d', strtotime($absn->tanggal_selesai)) . ' ' . getIndonesianMonth(date('m', strtotime($absn->tanggal_selesai))) . ' ' . date('Y', strtotime($absn->tanggal_selesai)); ?>

                            <?php endif; ?>

                        <p>Bukti Absen&emsp;&emsp;: </p>
                        <br>
                        <img src="<?php echo empty($absn->bukti_hadir) ? base_url() . 'upload/user/default-img.jpg' : base_url() . 'upload/bukti/' . $absn->bukti_hadir; ?>"
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
                    "targets": 5,
                    "orderable": false, // Menonaktifkan penyortiran untuk kolom ini
                }],
                "language": {
                    "zeroRecords": "Data tidak ditemukan",
                    "infoEmpty": "Data tidak tersedia"
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        </script>
</body>

</html>