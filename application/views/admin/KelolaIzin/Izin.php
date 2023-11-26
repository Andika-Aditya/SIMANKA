<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Kelola Izin</title>

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
          <h1 class="m-0">Kelola Izin</h1>
      </div><!-- /.row -->
    </div>
    <!-- /.content-header -->

    <br>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <?php
      if ($this->session->flashdata('alert') == 'update_izin'):
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
                <h4 align="center"><b>Data Izin Pegawai</b></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NRP</th>
                      <th>NAMA LENGKAP</th>
                      <th>TANGGAL IZIN</th>
                      <th>BUKTI IZIN</th>
                      <th>STATUS IZIN</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no = 1;
                    foreach($izin as $izn) : ?>
                      <!--<tr data-widget="expandable-table" aria-expanded="false">-->
                      <tr>
                        <td align="center"><?php echo $izn->NRP ?></td>
                        <td><?php echo $izn->Nama_lengkap ?></td>
                        <td align="center"><?php echo $izn->tanggal_mulai_izin ?></td>
                        <td align="center"><?php echo $izn->bukti_izin?>
                          <a class="badge badge-primary" href="<?php echo base_url('Admin/bukti_izin/'.$izn->id_izin)?> ?>"><i class="fa fa-eye"></i>
                            BUKTI IZIN
                          </a>
                        </td> 
                        <td align="center">
                          <?php
                          if ($izn->status_izin == 'DISETUJUI'):
                            ?>
                            <a
                              class="badge badge-success"
                              title="DI SETUJUI" disabled><i class="ft-x-circle"></i> DI SETUJUI 
                            </a>
                          <?php
                          elseif ($izn->status_izin == 'TIDAK DISETUJUI'):
                            ?>
                            <a
                              class="badge badge-secondary"
                              title="TIDAK DI SETUJUI" disabled><i class="ft-x-circle"></i> TIDAK DI SETUJUI
                            </a>
                            <?PHP
                          elseif ($izn->status_izin == ''):
                            ?>
                            <form method="post" action="<?php echo site_url('Admin/validasi_izin/' . $izn->id_izin); ?>" >
                                <input type="hidden" name="action" value="setujui">
                                <button type="submit" class="btn btn-success btn-sm" title="Validasi izin ? ">
                                    <i class="ft-x-circle"></i><span style="color: white;"><b>SETUJUI</b></span>
                                </button>
                            </form>

                            <form method="post" action="<?php echo site_url('Admin/validasi_izin/' . $izn->id_izin); ?>">
                                <input type="hidden" name="action" value="tolak">
                                <button type="submit" class="btn btn-danger btn-sm" title="Validasi izin ? ">
                                    <i class="ft-x-circle"></i><span style="color: white;"><b>TOLAK</b></span>
                                </button>
                            </form>
                          <?php
                          endif;
                          ?>
                        </td> 
                    </tr>
                    <!--<tr class="expandable-body">
                      <td colspan="5">
                        <p>
                          <b>ALASAN :</b>
                          <?php echo $izn->keterangan ?>
                        </p>
                      </td>
                    </tr>-->
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
        "columnDefs": [
          {
            "targets": -1, // The last column (TOMBOL AKSI)
            "orderable": false, // Disable ordering for this column
          }
        ],
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
