<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Rekam Perubahan Data</title>

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
          <h1 class="m-0">Rekam Perubahan Data Pegawai</h1>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a class="btn btn-danger" href=" <?php echo base_url('#') ?>"> <i class="fa fa-print"></i> Export dan Print </a>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h4 align="center"><b>Data Rekam Promosi Pegawai</b></h4>
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
                      <th>TOMBOL AKSI</th>  
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
                        <td align="center">
                          <a class="btn btn-success btn-sm" href="<?php echo base_url('#'.$promo->id_perubahan_riwayat)?>">
                            <i class="fa fa-search-plus"></i>
                          </a>
                          <a class="btn btn-danger btn-sm" onclick="javascript: return confirm('Anda yakin hapus?')" href="<?php echo base_url('#'.$promo->id_perubahan_riwayat)?>">
                            <i class="fa fa-trash"></i>
                          </a>
                          <a class="btn btn-primary btn-sm" href="<?php echo base_url('#'.$promo->id_perubahan_riwayat)?>">
                            <i class="fa fa-edit"></i>
                          </a>
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
        "responsive": false, 
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
