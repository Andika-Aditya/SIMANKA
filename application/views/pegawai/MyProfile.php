<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK - Data Pribadi</title>

    <?php // Memuat head.php
    $this->load->view('pegawai/UI_elements/head');
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header" style="background-color: #f4f6f9;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Pribadi</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content" style="background-color: #f4f6f9;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- card -->
                            <div class="card card-primary">
                                <div class="card-header" style="font-weight: 500;">Data Pribadi</div>
                                <div class="card-body">
                                    <?php echo form_open_multipart('Pegawai/Data_pribadi'); ?>
                                    <div class="form-group">
                                        <div class="info-box-content text-center">
                                            <img src="<?php echo empty($data_pg->Foto_pegawai) ? base_url() . 'upload/user/default-img.jpg' : base_url() . 'upload/user/' . $data_pg->Foto_pegawai; ?>"
                                                class="img-account-profile rounded-circle mb-2"
                                                style="height: 10rem; border-radius: 50% !important;"
                                                alt="User Image"><br>
                                            <input type="hidden" name="old_Foto_pegawai" class="form-control"
                                                value="<?php echo $data_pg->Foto_pegawai; ?>">
                                            <div class="small font-italic text-muted mb-4"><b>
                                                    <?php echo $data_pg->Pangkat_current ?>
                                                    <?php echo $data_pg->Nama_depan ?>
                                                    <?php echo $data_pg->Nama_belakang ?> - <?php echo $data_pg->NRP ?>
                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="hidden" name="id_pegawai" class="form-control"
                                            value="<?php echo $data_pg->id_pegawai ?>" readonly>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Nama Depan </label>
                                            <input type="text" name="Nama_depan" id="namadepan" class="form-control"
                                                value="<?php echo $data_pg->Nama_depan ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nama Belakang </label>
                                            <input type="text" name="Nama_belakang" id="namabelakang"
                                                class="form-control" value="<?php echo $data_pg->Nama_belakang ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-3">
                                            <label>NRP </label>
                                            <input type="text" name="NRP" id="nrp" class="form-control"
                                                value="<?php echo $data_pg->NRP ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Pangkat Saat Ini </label>
                                            <input type="text" name="Pangkat_current" id="pangkat_curr"
                                                class="form-control" value="<?php echo $data_pg->Pangkat_current ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Jabatan Saat Ini </label>
                                            <input type="text" name="Jabatan_current" id="jabatan_curr"
                                                class="form-control" value="<?php echo $data_pg->Jabatan_current ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Unit Kerja </label>
                                            <input type="text" name="Unit_kerja" id="uk" class="form-control"
                                                value="<?php echo $data_pg->Unit_kerja ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji Saat Ini</label>
                                        <?php
                                                // Menggunakan number_format untuk memformat nilai uang
                                                $formatted_gaji = number_format($data_pg->Gaji_current, 0, ',', '.');
                                            ?>
                                        <input type="text" name="Gaji_current" id="gaji" class="form-control"
                                            value="Rp. <?php echo $formatted_gaji; ?>" readonly>
                                    </div>

                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Bergabung </label>
                                            <input type="text" name="Tanggal_bergabung" id="tglgabung"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Kenaikan Pangkat Terakhir
                                            </label>
                                            <input type="text" name="Tgl_kenaikan_pangkat_terakhir" id="tglkenpangakhir"
                                                class="form-control" readonly>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Tanggal Lahir </label>
                                        <input type="text" name="tempattgllhr" id="ttl" class="form-control" readonly>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Jenis Kelamin </label>
                                            <input type="text" name="Jenis_kelamin" id="jk" class="form-control"
                                                value="<?php echo $data_pg->Jenis_kelamin; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Pernikahan </label>
                                            <input type="text" name="Status_pernikahan" id="statuskwn"
                                                class="form-control" value="<?php echo $data_pg->Status_pernikahan; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <input type="text" name="Riwayat_pendidikan" id="pendAkhir" class="form-control"
                                            value="<?php echo $data_pg->Riwayat_pendidikan; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Pengalaman Kerja</label>
                                        <textarea type="text" name="Pengalaman_kerja" rows="3" id="pengalamankrj"
                                            class="form-control"
                                            readonly><?php echo $data_pg->Pengalaman_kerja; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <textarea class="form-control" id="Alamat" rows="3" name="Alamat"
                                            readonly><?php echo $data_pg->Alamat; ?></textarea>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Nomor Handphone </label>
                                            <input type="text" name="Nomor_hp" id="noHP" class="form-control"
                                                value="<?php echo $data_pg->Nomor_hp; ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Alamat Email </label>
                                            <input type="text" name="Alamat_email" id="email" class="form-control"
                                                value="<?php echo $data_pg->Alamat_email; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="col-12 text-center">
                                    <a href="<?php echo base_url('Pegawai/Beranda'); ?>" class="btn btn-primary"
                                        style="width: 150px; margin-bottom: 4%;"><b>Kembali</b></a>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- Footer with Custom CSS -->
            <footer style="background-color: #ffff; color: #7c8695; text-align: center; padding: 10px;">
                <strong>&copy; <?php echo date('Y'); ?> SIKAMPEK - Sistem Informasi Anggota Kepolisian
                    Cikampek.</strong>
            </footer>
            <!-- /.footer -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.wrapper -->
    <?php
        $this->load->view('pegawai/UI_elements/footer');
    ?>
    <script>
    function ttlIndo(tanggal, kota) {
        // Jika tanggal kosong, tampilkan hanya kota
        if (!tanggal) {
            return kota;
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
        var hasil_formatted = kota + ', ' + hari + ' ' + bulan + ' ' + tahun;

        return hasil_formatted;
    }

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

    var kota = '<?php echo $data_pg->Tempat_lahir; ?>';
    var tanggal_lahir = '<?php echo $data_pg->Tanggal_lahir; ?>';

    var tglgbg = '<?php echo $data_pg->Tanggal_bergabung; ?>';
    var tglnaikpangkat = '<?php echo $data_pg->Tgl_kenaikan_pangkat_terakhir; ?>';

    // Menggunakan fungsi tanggalIndo
    var tanggal_lahir_formatted = ttlIndo(tanggal_lahir, kota);
    var tanggal_tglgbg_formatted = tanggalIndo(tglgbg);
    var tanggal_tglnaikpangkat_formatted = tanggalIndo(tglnaikpangkat);

    // Menyimpan hasil format tanggal ke dalam input
    document.getElementById('ttl').value = tanggal_lahir_formatted;
    document.getElementById('tglgabung').value = tanggal_tglgbg_formatted;
    document.getElementById('tglkenpangakhir').value = tanggal_tglnaikpangkat_formatted;
    </script>
</body>

</html>