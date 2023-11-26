<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Detail Data Pegawai</title>

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
                    <h1 class="m-0" align="center">Detail Data Pegawai</h1>
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
                                        <!-- Menampilkan gambar profil pegawai -->
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>/upload/user/<?php echo $detail->Foto_pegawai;?>" alt="Gambar Profil Pegawai">
                                    </div>

                                    <!-- Menampilkan nama pegawai -->
                                    <h3 class="profile-username text-center"><?php echo $detail->Nama_lengkap ?></h3>

                                    <!-- Menampilkan pangkat dan NRP pegawai -->
                                    <p class="text-muted text-center"><?php echo $detail->Pangkat_current ?> - <?php echo $detail->NRP ?></p>

                                    <!-- Menampilkan informasi pegawai dalam daftar -->
                                    <ul class="list-group list-group-unbordered mb-3">
                                      <li class="list-group-item">
                                        <b>Jabatan</b> <a class="float-right text-muted"><?php echo $detail->Jabatan_current ?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Tempat, Tanggal Lahir</b> <a class="float-right text-muted"><?php echo $detail->Tempat_lahir;?>, <?php echo $detail->Tanggal_lahir;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Jenis Kelamin</b> <a class="float-right text-muted"><?php echo $detail->Jenis_kelamin;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Status Pernikahan</b> <a class="float-right text-muted"><?php echo $detail->Status_pernikahan;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Pendidikan Terakhir</b> <a class="float-right text-muted"><?php echo $detail->Riwayat_pendidikan;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Pengalaman Kerja</b> <a class="float-right text-muted"><?php echo $detail->Pengalaman_kerja;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Unit Kerja</b> <a class="float-right text-muted"><?php echo $detail->Unit_kerja;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Gaji Saat Ini</b> <a class="float-right text-muted">Rp. <?php echo number_format($detail->Gaji_current, 0, ',', '.');?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Status Pegawai</b> <a class="float-right text-muted"><?php echo $detail->status_pegawai;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Tanggal Kenaikan Pangkat Terakhir</b> <a class="float-right text-muted"><?php echo $detail->Tgl_kenaikan_pangkat_terakhir;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Tanggal Bergabung</b> <a class="float-right text-muted"><?php echo $detail->Tanggal_bergabung;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Alamat</b> <a class="float-right text-muted"><?php echo $detail->Alamat;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Nomor Handphone</b> <a class="float-right text-muted"><?php echo $detail->Nomor_hp;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Alamat Email</b> <a class="float-right text-muted"><?php echo $detail->Alamat_email;?></a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Jumlah Cuti</b> <a class="float-right text-muted"><?php echo $detail->Informasi_cuti;?></a>
                                      </li>
                                    </ul>
                                    
                                    <!-- Tombol untuk kembali ke halaman daftar pegawai -->
                                    <a href="<?php echo base_url('Admin/Datapegawai'); ?>" class=" btn btn-primary btn-block"><b>Kembali</b></a>
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
