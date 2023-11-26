<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Daftar Cuti</title>

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
          <h1 class="m-0">Data Cuti Pegawai</h1>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h4 align="center"><b>Data Cuti Pegawai</b></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NRP</th>
                      <th>NAMA LENGKAP</th>
                      <th>TANGGAL MULAI CUTI</th>
                      <th>TANGGAL SELESAI CUTI</th>
                      <th>JENIS CUTI</th>
                      <th>ALASAN</th>
                      <th>STATUS PERSETUJUAN</th>  
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no = 1;
                    foreach($cuti as $ct) : ?>
                      <tr style="word_wrap: break-word;">
                        <td align="center"><?php echo $ct->NRP ?></td>
                        <td><?php echo $ct->Nama_lengkap ?></td>
                        <td><?php echo $ct->tanggal_mulai_cuti ?></td>
                        <td><?php echo $ct->tanggal_selesai_cuti ?></td> 
                        <td><?php echo $ct->jenis_cuti ?></td>
                        <td align="center"><?php echo $ct->alasan_cuti ?></td>
                        <td align="center">                          
                          <a class="btn btn-success btn-sm" href="<?php echo base_url('#'.$ct->id_cuti)?>"> <b>DiSetujui</b>
                          </a>
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
<div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PEGAWAI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('#');?>
        <div class="form-group">
          <label>Nama Mahasiswa</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>NIM</label>
          <input type="text" name="nim" class="form-control">
        </div>
        <div class="form-group">
          <label>Tangga Lahir</label>
          <input type="date" name="tgl_lahir" class="form-control">
        </div>
        <div class="form-group">
          <label>Jurusan</label>
          <input type="text" name="jurusan" class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label> 
          <input type="text" name="alamat" class="form-control"> 
        </div>
        <div class="form-group"> 
          <label>Email</label> 
          <input type="text" name="email" class="form-control"> 
        </div>
        <div class="form-group">
          <label>Nomor Telepon</label> 
          <input type="text" name="no_telp" class="form-control"> 
        </div>

        <div class="form-group">
          <label>Upload Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
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
            "targets": [-1, 6], // The last column (TOMBOL AKSI)
            "orderable": false, // Disable ordering for this column
          }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
