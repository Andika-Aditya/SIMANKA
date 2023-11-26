<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Kehadiran</title>

  <?php // Memuat head.php
      $this->load->view('admin/UI_elements/head');
   ?>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
          <h1 class="m-0">Kehadiran</h1>
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
          Data berhasil diupdate
        </div>
      <?php
      endif;
      ?>

        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h4 align="center"><b>Data Kehadiran Pegawai</b></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>HARI & TANGGAL</th>
                      <th>NRP</th>
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
                        <td align="center"><?php echo $absn->tanggal_kehadiran ?></td>
                        <td align="center"><?php echo $absn->NRP ?></td>
                        <td><?php echo $absn->Nama_lengkap ?></td>
                        <td align="center"><?php echo $absn->jam_masuk?></td> 
                        <td align="center">
                          <?php
                          if ($absn->Status_hadir == 'HADIR'):
                              ?>
                              <div class="badge badge-success"><i class="ft-check-circle"></i> HADIR </div>
                              <?php
                          elseif ($absn->Status_hadir == 'SAKIT') :
                              ?>
                              <div class="badge badge-warning"><i class="ft-x-circle"></i> SAKIT </div>
                              <?php
                          elseif ($absn->Status_hadir == 'IZIN') :
                              ?>
                              <div class="badge badge-primary"><i class="ft-x-circle"></i> IZIN </div>
                              <?php
                          elseif ($absn->Status_hadir == 'CUTI') :
                              ?>
                              <div class="badge bg-indigo"><i class="ft-x-circle"></i> CUTI </div>
                              <?php
                          endif;
                          ?>
                        </td>
                        <td align="center"><?php echo $absn->bukti_hadir?>
                          <a class="badge badge-primary" href="<?php echo base_url('Admin/bukti_absen/'.$absn->id_absen)?> ?>"><i class="fa fa-eye"></i>
                            BUKTI HADIR
                          </a>
                        </td> 
                        <td align="center">
                          <?php
                          if ($absn->validasi == 'SUDAH'):
                            ?>
                            <a
                              class="badge badge-success"
                              title="Telah Di validasi" disabled><i class="fa fa-check"></i>
                            </a>
                          <?php
                          elseif ($absn->validasi == '' || $absn->validasi == 'BELUM'):
                            ?>
                            <button class="btn btn-secondary btn-sm validasi" title="Validasi Kehadiran ? ">
                                <a href="<?php echo base_url('Admin/validasi/'.$absn->id_absen) ?>">
                                    <i class="ft-x-circle"></i><span style="color: white;">Validasi</span>
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
<!-- Modal -->
<?php 
    $this->load->view('admin/UI_elements/footer');
 ?>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": false,
        "responsive": true, 
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
  $(document).ready(function() {


    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan ('slow')
    $('#feedback').delay(3000).fadeOut('slow');
});


</script>
</body>
</html>
