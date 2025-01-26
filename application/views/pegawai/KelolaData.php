<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="uts-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK - Kelola Data Pribadi</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/dist/img/landing_icon.svg" type="image/svg" />

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

    <style>
    @media (max-width: 1024px) {
        .custom-file {
            width: 100% !important;
        }
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header" style="background-color: #f4f6f9;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Kelola Data</h1>
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
                                <h4 class="card-header" style="font-weight: bold;">Data Pribadi</h4>
                                <div class="card-body">
                                    <?php echo form_open_multipart('Pegawai/Update_data'); ?>
                                    <div class="form-group">
                                        <div class="info-box-content text-center">
                                            <img src="<?php echo empty($data_pg->Foto_pegawai) ? base_url() . 'upload/user/default-img.jpg' : base_url() . 'upload/user/' . $data_pg->Foto_pegawai; ?>"
                                                class="img-account-profile rounded-circle mb-2"
                                                style="height: 10rem; border-radius: 50% !important;"
                                                alt="User Image"><br>
                                            <input type="hidden" name="old_Foto_pegawai" class="form-control"
                                                value="<?php echo $data_pg->Foto_pegawai; ?>">
                                            <div class="small font-italic text-muted mb-4">JPG atau JPEG atau PNG, tidak
                                                lebih besar dari 5 MB</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="custom-file" style="width: 30%; margin: 0 auto;">
                                                <input type="file" name="Foto_pegawai" id="foto"
                                                    class="custom-file-input" onchange="displayFileName()">
                                                <label class="custom-file-label" for="foto"
                                                    style="text-align: left;">Pilih File</label>
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
                                                value="<?php echo $data_pg->Nama_depan ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nama Belakang </label>
                                            <input type="text" name="Nama_belakang" id="namabelakang"
                                                class="form-control" value="<?php echo $data_pg->Nama_belakang ?>">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>NRP </label>
                                            <input type="text" name="NRP" id="nrp" class="form-control"
                                                onkeypress="return hanyaAngka(event)"
                                                value="<?php echo $data_pg->NRP ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pangkat Saat Ini </label>
                                            <select name="Pangkat_current" id="pangkat_curr"
                                                class="custom-select rounded-3">
                                                <option value="" disabled selected>Pilih Salah Satu</option>
                                                <optgroup label="PERWIRA TINGGI (PATI)">
                                                    <option value="JENDERAL POLISI"
                                                        <?php if ($data_pg->Pangkat_current == 'JENDERAL POLISI') echo 'selected'; ?>>
                                                        JENDERAL POLISI</option>
                                                    <option value="KOMJEN POL"
                                                        <?php if ($data_pg->Pangkat_current == 'KOMJEN POL') echo 'selected'; ?>>
                                                        KOMJEN POL</option>
                                                    <option value="IRJEN POL"
                                                        <?php if ($data_pg->Pangkat_current == 'IRJEN POL') echo 'selected'; ?>>
                                                        IRJEN POL</option>
                                                    <option value="BRIGJEN POL"
                                                        <?php if ($data_pg->Pangkat_current == 'BRIGJEN POL') echo 'selected'; ?>>
                                                        BRIGJEN POL</option>
                                                </optgroup>
                                                <optgroup label="PERWIRA MENENGAH (PAMEN)">
                                                    <option value="KOMBES POL"
                                                        <?php if ($data_pg->Pangkat_current == 'KOMBES POL') echo 'selected'; ?>>
                                                        KOMBES POL</option>
                                                    <option value="AKBP"
                                                        <?php if ($data_pg->Pangkat_current == 'AKBP') echo 'selected'; ?>>
                                                        AKBP</option>
                                                    <option value="KOMPOL"
                                                        <?php if ($data_pg->Pangkat_current == 'KOMPOL') echo 'selected'; ?>>
                                                        KOMPOL</option>
                                                </optgroup>
                                                <optgroup label="PERWIRA PERTAMA (PAMA)">
                                                    <option value="AKP"
                                                        <?php if ($data_pg->Pangkat_current == 'AKP') echo 'selected'; ?>>
                                                        AKP</option>
                                                    <option value="IPTU"
                                                        <?php if ($data_pg->Pangkat_current == 'IPTU') echo 'selected'; ?>>
                                                        IPTU</option>
                                                    <option value="IPDA"
                                                        <?php if ($data_pg->Pangkat_current == 'IPDA') echo 'selected'; ?>>
                                                        IPDA</option>
                                                </optgroup>
                                                <optgroup label="BINTARA TINGGI">
                                                    <option value="AIPTU"
                                                        <?php if ($data_pg->Pangkat_current == 'AIPTU') echo 'selected'; ?>>
                                                        AIPTU</option>
                                                    <option value="AIPDA"
                                                        <?php if ($data_pg->Pangkat_current == 'AIPDA') echo 'selected'; ?>>
                                                        AIPDA</option>
                                                </optgroup>
                                                <optgroup label="BINTARA">
                                                    <option value="BRIPKA"
                                                        <?php if ($data_pg->Pangkat_current == 'BRIPKA') echo 'selected'; ?>>
                                                        BRIPKA</option>
                                                    <option value="BRIGPOL"
                                                        <?php if ($data_pg->Pangkat_current == 'BRIGPOL') echo 'selected'; ?>>
                                                        BRIGPOL</option>
                                                    <option value="BRIPTU"
                                                        <?php if ($data_pg->Pangkat_current == 'BRIPTU') echo 'selected'; ?>>
                                                        BRIPTU</option>
                                                    <option value="BRIPDA"
                                                        <?php if ($data_pg->Pangkat_current == 'BRIPDA') echo 'selected'; ?>>
                                                        BRIPDA</option>
                                                </optgroup>
                                                <optgroup label="TAMTAMA">
                                                    <option value="ABRIP"
                                                        <?php if ($data_pg->Pangkat_current == 'ABRIP') echo 'selected'; ?>>
                                                        ABRIP</option>
                                                    <option value="ABRIPTU"
                                                        <?php if ($data_pg->Pangkat_current == 'ABRIPTU') echo 'selected'; ?>>
                                                        ABRIPTU</option>
                                                    <option value="ABRIPDA"
                                                        <?php if ($data_pg->Pangkat_current == 'ABRIPDA') echo 'selected'; ?>>
                                                        ABRIPDA</option>
                                                    <option value="BHARAKA"
                                                        <?php if ($data_pg->Pangkat_current == 'BHARAKA') echo 'selected'; ?>>
                                                        BHARAKA</option>
                                                    <option value="BHARATU"
                                                        <?php if ($data_pg->Pangkat_current == 'BHARATU') echo 'selected'; ?>>
                                                        BHARATU</option>
                                                    <option value="BHARADA"
                                                        <?php if ($data_pg->Pangkat_current == 'BHARADA') echo 'selected'; ?>>
                                                        BHARADA</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Jabatan Saat Ini </label>
                                            <select name="Jabatan_current" id="jabatan_curr"
                                                class="custom-select rounded-3">
                                                <option value=""
                                                    <?php if ($data_pg->Jabatan_current == '') echo 'selected'; ?>>
                                                    Pilih Salah Satu</option>
                                                <option value="KAPOLRI"
                                                    <?php if ($data_pg->Jabatan_current == 'KAPOLRI') echo 'selected'; ?>>
                                                    KAPOLRI</option>
                                                <option value="WAKAPOLRI"
                                                    <?php if ($data_pg->Jabatan_current == 'WAKAPOLRI') echo 'selected'; ?>>
                                                    WAKAPOLRI</option>
                                                <option value="ITWASUM"
                                                    <?php if ($data_pg->Jabatan_current == 'ITWASUM') echo 'selected'; ?>>
                                                    ITWASUM</option>
                                                <option value="ASOPS"
                                                    <?php if ($data_pg->Jabatan_current == 'ASOPS') echo 'selected'; ?>>
                                                    ASOPS</option>
                                                <option value="AS SDM"
                                                    <?php if ($data_pg->Jabatan_current == 'AS SDM') echo 'selected'; ?>>
                                                    AS
                                                    SDM</option>
                                                <option value="ASRENA"
                                                    <?php if ($data_pg->Jabatan_current == 'ASRENA') echo 'selected'; ?>>
                                                    ASRENA</option>
                                                <option value="ASLOG"
                                                    <?php if ($data_pg->Jabatan_current == 'ASLOG') echo 'selected'; ?>>
                                                    ASLOG</option>
                                                <option value="DIV PROPAM"
                                                    <?php if ($data_pg->Jabatan_current == 'DIV PROPAM') echo 'selected'; ?>>
                                                    DIV PROPAM</option>
                                                <option value="DIV KUM"
                                                    <?php if ($data_pg->Jabatan_current == 'DIV KUM') echo 'selected'; ?>>
                                                    DIV KUM</option>
                                                <option value="DIV HUMAS"
                                                    <?php if ($data_pg->Jabatan_current == 'DIV HUMAS') echo 'selected'; ?>>
                                                    DIV HUMAS</option>
                                                <option value="DIV HUBINTER"
                                                    <?php if ($data_pg->Jabatan_current == 'DIV HUBINTER') echo 'selected'; ?>>
                                                    DIV HUBINTER</option>
                                                <option value="DIV TIK"
                                                    <?php if ($data_pg->Jabatan_current == 'DIV TIK') echo 'selected'; ?>>
                                                    DIV TIK</option>
                                                <option value="YANMA"
                                                    <?php if ($data_pg->Jabatan_current == 'YANMA') echo 'selected'; ?>>
                                                    YANMA</option>
                                                <option value="SETUM"
                                                    <?php if ($data_pg->Jabatan_current == 'SETUM') echo 'selected'; ?>>
                                                    SETUM</option>
                                                <option value="SPRIPIM"
                                                    <?php if ($data_pg->Jabatan_current == 'SPRIPIM') echo 'selected'; ?>>
                                                    SPRIPIM</option>
                                                <option value="Lainnya"
                                                    <?php if (!empty($data_pg->Jabatan_current) && $data_pg->Jabatan_current != 'KAPOLRI' && $data_pg->Jabatan_current != 'WAKAPOLRI' && $data_pg->Jabatan_current != 'ITWASUM' && $data_pg->Jabatan_current != 'ASOPS' && $data_pg->Jabatan_current != 'AS SDM' && $data_pg->Jabatan_current != 'ASRENA' && $data_pg->Jabatan_current != 'ASLOG' && $data_pg->Jabatan_current != 'DIV PROPAM' && $data_pg->Jabatan_current != 'DIV KUM' && $data_pg->Jabatan_current != 'DIV HUMAS' && $data_pg->Jabatan_current != 'DIV HUBINTER' && $data_pg->Jabatan_current != 'DIV TIK' && $data_pg->Jabatan_current != 'YANMA' && $data_pg->Jabatan_current != 'SETUM' && $data_pg->Jabatan_current != 'SPRIPIM') echo 'selected'; ?>>
                                                    Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Unit Kerja </label>
                                            <input type="text" name="Unit_kerja" id="uk" class="form-control"
                                                value="<?php echo $data_pg->Unit_kerja ?>">
                                        </div>
                                    </div>
                                    <!-- Tambahkan elemen input untuk opsi "Lainnya" -->
                                    <div class="form-group" id="jabatan_curr_lainnya"
                                        style="<?php echo (!empty($data_pg->Jabatan_current) && $data_pg->Jabatan_current != 'KAPOLRI' && $data_pg->Jabatan_current != 'WAKAPOLRI' && $data_pg->Jabatan_current != 'ITWASUM' && $data_pg->Jabatan_current != 'ASOPS' && $data_pg->Jabatan_current != 'AS SDM' && $data_pg->Jabatan_current != 'ASRENA' && $data_pg->Jabatan_current != 'ASLOG' && $data_pg->Jabatan_current != 'DIV PROPAM' && $data_pg->Jabatan_current != 'DIV KUM' && $data_pg->Jabatan_current != 'DIV HUMAS' && $data_pg->Jabatan_current != 'DIV HUBINTER' && $data_pg->Jabatan_current != 'DIV TIK' && $data_pg->Jabatan_current != 'YANMA' && $data_pg->Jabatan_current != 'SETUM' && $data_pg->Jabatan_current != 'SPRIPIM') ? '' : 'display: none;'; ?>">
                                        <label>Masukkan Jabatan Saat Ini </label>
                                        <input type="text" name="Jabatan_current_lainnya" class="form-control"
                                            value="<?php echo $data_pg->Jabatan_current; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji Saat Ini </label>
                                        <input type="text" name="Gaji_current" id="gaji" class="form-control"
                                            onkeypress="return hanyaAngka(event)"
                                            value="<?php echo $data_pg->Gaji_current; ?>">
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Bergabung </label>
                                            <input type="date" name="Tanggal_bergabung" id="tglgabung"
                                                class="form-control" value="<?php echo $data_pg->Tanggal_bergabung; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Kenaikan Pangkat Terakhir
                                            </label>
                                            <input type="date" name="Tgl_kenaikan_pangkat_terakhir" id="tglkenpangakhir"
                                                class="form-control"
                                                value="<?php echo $data_pg->Tgl_kenaikan_pangkat_terakhir; ?>">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Tempat Lahir </label>
                                            <input type="text" name="Tempat_lahir" id="tempatlhr" class="form-control"
                                                value="<?php echo $data_pg->Tempat_lahir; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Lahir </label>
                                            <input type="date" name="Tanggal_lahir" id="tgl_lahir" class="form-control"
                                                value="<?php echo $data_pg->Tanggal_lahir; ?>">
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Jenis Kelamin </label>
                                            <div class="form-check">
                                                <input type="radio" name="Jenis_kelamin" id="laki-laki"
                                                    value="Laki-laki" class="form-check-input"
                                                    <?php if ($data_pg->Jenis_kelamin == 'Laki-laki') echo 'checked'; ?>>
                                                <label for="laki-laki" class="form-check-label">Laki-laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="Jenis_kelamin" id="perempuan"
                                                    value="Perempuan" class="form-check-input"
                                                    <?php if ($data_pg->Jenis_kelamin == 'Perempuan') echo 'checked'; ?>>
                                                <label for="perempuan" class="form-check-label">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status Pernikahan </label>
                                            <div class="custom-radio-group">
                                                <input type="radio" name="Status_pernikahan" id="menikah"
                                                    value="Menikah"
                                                    <?php if ($data_pg->Status_pernikahan == 'Menikah') echo 'checked'; ?>>
                                                <label for="menikah" style="margin-right: 2%;">Menikah</label>
                                                <input type="radio" name="Status_pernikahan" id="belum_menikah"
                                                    value="Belum Menikah"
                                                    <?php if ($data_pg->Status_pernikahan == 'Belum Menikah') echo 'checked'; ?>>
                                                <label for="belum_menikah">Belum Menikah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir </label>
                                        <input type="text" name="Riwayat_pendidikan" id="pendAkhir" class="form-control"
                                            value="<?php echo $data_pg->Riwayat_pendidikan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengalaman Kerja </label>
                                        <textarea type="text" name="Pengalaman_kerja" rows="3" id="pengalamankrj"
                                            class="form-control"><?php echo $data_pg->Pengalaman_kerja; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <textarea class="form-control" id="Alamat" rows="3"
                                            name="Alamat"><?php echo $data_pg->Alamat; ?></textarea>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Nomor Handphone </label>
                                            <input type="text" name="Nomor_hp" id="noHP" class="form-control"
                                                onkeypress="return hanyaAngka(event)"
                                                value="<?php echo $data_pg->Nomor_hp; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Alamat Email </label>
                                            <input type="text" name="Alamat_email" id="email" class="form-control"
                                                value="<?php echo $data_pg->Alamat_email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="<?php echo base_url('Pegawai/Beranda'); ?>" class=" btn btn-primary"
                                            style="width: 150px; margin: 1%;"><b>Kembali</b></a>
                                        <button type="submit" class="btn btn-success" style="width: 150px; margin: 1%;">
                                            <b>Simpan</b>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.ontainer-fluid -->
            </section>
            <!-- Footer with Custom CSS -->
            <footer style="background-color: #ffff; color: #7c8695; text-align: center; padding: 10px;">
                <strong>&copy; <?php echo date('Y'); ?> SIKAMPEK - Sistem Informasi Anggota Kepolisian
                    Cikampek.</strong>
            </footer>
            <!-- /.footer -->
        </div>
        <!-- /.content -->
    </div>
    <?php 
  $this->load->view('pegawai/UI_elements/footer');
  ?>

    <script>
    // Menunggu hingga halaman sepenuhnya dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var nrpInput = document.querySelector('input[name="NRP"]');

        // Mendengarkan perubahan input pada elemen dengan nama "NRP"
        nrpInput.addEventListener('input', function() {
            // Validasi panjang NRP
            if (this.value.length > 8) {
                // Jika lebih dari 8 digit, hapus karakter berlebih
                this.value = this.value.slice(0, 8);
            }
        });
    });

    function hanyaAngka(event) {
        var charCode = (event.which) ? event.which : event.keyCode;

        // Memastikan karakter yang dimasukkan adalah angka 
        if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
            return false;
        }
        return true;
    }

    // Script JavaScript untuk menampilkan/menyembunyikan input "Lainnya" saat opsi dipilih
    const jabatanCurrSelect = document.getElementById('jabatan_curr');
    const jabatanCurrLainnya = document.getElementById('jabatan_curr_lainnya');

    jabatanCurrSelect.addEventListener('change', function() {
        if (jabatanCurrSelect.value === 'Lainnya') {
            // Tampilkan input "Lainnya" jika opsi "Lainnya" dipilih
            jabatanCurrLainnya.style.display = 'block';
        } else {
            // Sembunyikan input "Lainnya" jika opsi lainnya dipilih
            jabatanCurrLainnya.style.display = 'none';
        }
    });

    function displayFileName() {
        // Mendapatkan elemen input file
        var input = document.getElementById('foto');

        // Mendapatkan label yang akan menampilkan nama file
        var label = document.querySelector('.custom-file-label');

        // Menetapkan nilai label dengan nama file yang diunggah
        label.textContent = input.files[0].name;
    }
    </script>
</body>

</html>