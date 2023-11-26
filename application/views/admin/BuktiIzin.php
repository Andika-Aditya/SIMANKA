<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Bukti Izin Pegawai</title>

<?php // Memuat head.php
$this->load->view('admin/UI_elements/head');
?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Load jQuery and Bootstrap JavaScript libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                    <h1 class="m-0" align="center">Bukti Izin Pegawai</h1>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- card -->
                            <div class="card">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <!-- Menampilkan bukti hadir pegawai -->
                                        <img class="img-fluid" src="<?php echo base_url(); ?>/upload/bukti_izin/<?php echo $buktiIzin->bukti_izin;?>" alt="Gambar Bukti Izin Pegawai">
                                    </div>

                                    <!-- Menampilkan informasi pegawai dalam daftar -->
                                    <ul class="list-group list-group-unbordered mb-3">
                                      <li class="list-group-item">
                                        <b>HARI, TANGGAL, TAHUN HADIR</b> <a class="float-right text-muted"><?php echo $buktiIzin->tanggal_mulai_izin ?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>NAMA LENGKAP</b> <a class="float-right text-muted"><?php echo $buktiIzin->Nama_lengkap;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>NRP</b> <a class="float-right text-muted"><?php echo $buktiIzin->NRP;?></a>
                                      </li>
                                    <li class="list-group-item">
                                        <b>NRP</b> <a class="float-right text-muted"><?php echo $buktiIzin->NRP;?></a>
                                      </li>
                                    </ul>
                                    
                                    <!-- Tombol untuk kembali ke halaman daftar pegawai -->
                                    <a href="<?php echo base_url('Admin/Izin'); ?>" class=" btn btn-primary btn-block"><b>Kembali</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.ontainer-fluid -->
            </div>
            <!-- /.content -->
        </section>
        <!-- /.content-wrapper -->
    </div>
    <?php 
    $this->load->view('admin/UI_elements/footer');
    ?>
</body>
</html>
