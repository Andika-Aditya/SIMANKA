<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Lihat Perubahan Data</title>

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
          <h1 class="m-0">Informasi Perubahan Data Pegawai</h1>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <br>

        <div class="row">
          <div class="col-12">
            <a class="btn btn-danger" href=" <?php echo base_url('#') ?>"> <i class="fa fa-print"></i> Export dan Print </a>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h4 align="center"><b>Data Riwayat Perubahan Pegawai</b></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NRP</th>
                      <th>NAMA LENGKAP</th>
                      <th>TANGGAL PERUBAHAN</th>
                      <th>PANGKAT BARU</th>
                      <th>PANGKAT LAMA</th>
                      <th>GAJI BARU</th>
                      <th>DESKRIPSI</th>
                      <th>STATUS PERUBAHAN</th>  
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no = 1;
                    foreach($promosi as $promo) : ?>
                      <tr style="word_wrap: break-word;">
                        <td align="center"><?php echo $promo->NRP ?></td>
                        <td><?php echo $promo->Nama_lengkap ?></td>
                        <td><?php echo $promo->tgl_perubahan ?></td>
                        <td><?php echo $promo->pangkat_baru ?></td> 
                        <td><?php echo $promo->pangkat_lama ?></td>
                        <td><?php echo $promo->gaji_baru ?></td>
                        <td><?php echo $promo->deskripsi ?></td>
                        <td align="center">
                          <a class="btn btn-success btn-sm" href="<?php echo base_url('#'.$promo->id_perubahan_riwayat)?>"><b>Di Setujui</b></a>
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
        "buttons": ["copy","pdf","excel","colvis"],
        "columnDefs": [
          {
            "targets": [-1, -2], // The last column (TOMBOL AKSI)
            "orderable": false, // Disable ordering for this column
          }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
