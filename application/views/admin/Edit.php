<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Edit Data Pegawai</title>

<?php // Memuat head.php
$this->load->view('admin/UI_elements/head');
?>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
  /* CSS untuk styling floating box notifikasi */
.notification {
    display: none;
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #4CAF50; /* Warna hijau */
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.notification.show {
    display: block;
}


</style>

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
            <div class="notification" id="notificationBox">
                <span class="fas fa-check text-white">&#10003;</span> <!-- Ikon ceklis -->
                Data Berhasil Diupdate.
            </div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h1 class="m-0" align="center">Edit Data Pegawai</h1>
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
                                <div class="card-body">
                                    <?php echo form_open_multipart('Admin/update_pegawai'); ?>
                                    <div class="form-group">
                                        <label>Nama Pegawai <font color="red">(*)</font></label>
                                        <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $pg->id_pegawai ?>">
                                        <input type="text" name="Nama_lengkap" id="namalengkap" class="form-control" value="<?php echo $pg->Nama_lengkap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NRP <font color="red">(*)</font></label>
                                        <input type="text" name="NRP" id="nrp" class="form-control" onkeypress="return hanyaAngka(event)" value="<?php echo $pg->NRP ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan Saat Ini <font color="red">(*)</font></label><br>
                                        <select name="Jabatan_current" id="jabatan_curr">
                                            <option value="" disabled >Pilih Salah Satu</option>
                                            <option value="Lainnya1" <?php if ($pg->Jabatan_current == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                                            <option value="KAPOLRI" <?php if ($pg->Jabatan_current == 'KAPOLRI') echo 'selected'; ?>>KAPOLRI</option>
                                            <option value="WAKAPOLRI" <?php if ($pg->Jabatan_current == 'WAKAPOLRI') echo 'selected'; ?>>WAKAPOLRI</option>
                                            <option value="ITWASUM" <?php if ($pg->Jabatan_current == 'ITWASUM') echo 'selected'; ?>>ITWASUM</option>
                                            <option value="ASOPS" <?php if ($pg->Jabatan_current == 'ASOPS') echo 'selected'; ?>>ASOPS</option>
                                            <option value="AS SDM" <?php if ($pg->Jabatan_current == 'AS SDM') echo 'selected'; ?>>AS SDM</option>
                                            <option value="ASRENA" <?php if ($pg->Jabatan_current == 'ASRENA') echo 'selected'; ?>>ASRENA</option>
                                            <option value="ASLOG" <?php if ($pg->Jabatan_current == 'ASLOG') echo 'selected'; ?>>ASLOG</option>
                                            <option value="DIV PROPAM" <?php if ($pg->Jabatan_current == 'DIV PROPAM') echo 'selected'; ?>>DIV PROPAM</option>
                                            <option value="DIV KUM" <?php if ($pg->Jabatan_current == 'DIV KUM') echo 'selected'; ?>>DIV KUM</option>
                                            <option value="DIV HUMAS" <?php if ($pg->Jabatan_current == 'DIV HUMAS') echo 'selected'; ?>>DIV HUMAS</option>
                                            <option value="DIV HUBINTER" <?php if ($pg->Jabatan_current == 'DIV HUBINTER') echo 'selected'; ?>>DIV HUBINTER</option>
                                            <option value="DIV TIK" <?php if ($pg->Jabatan_current == 'DIV TIK') echo 'selected'; ?>>DIV TIK</option>
                                            <option value="YANMA" <?php if ($pg->Jabatan_current == 'YANMA') echo 'selected'; ?>>YANMA</option>
                                            <option value="SETUM" <?php if ($pg->Jabatan_current == 'SETUM') echo 'selected'; ?>>SETUM</option>
                                            <option value="SPRIPIM" <?php if ($pg->Jabatan_current == 'SPRIPIM') echo 'selected'; ?>>SPRIPIM</option>
                                            <option value="Lainnya" ?>Lainnya</option>
                                        </select>
                                    </div>
                                    <!-- Tambahkan elemen input untuk opsi "Lainnya" -->
                                    <div class="form-group" id="jabatan_curr_lainnya" style="display: none;">
                                        <label>Masukkan Jabatan Saat Ini</label><br>
                                        <input type="text" name="Jabatan_current_lainnya">
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat Saat Ini <font color="red">(*)</font></label><br>
                                        <select name="Pangkat_current" id="pangkat_curr">
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <optgroup label="PERWIRA TINGGI (PATI)">
                                                <option value="JENDERAL POLISI" <?php if ($pg->Pangkat_current == 'JENDERAL POLISI') echo 'selected'; ?>>JENDERAL POLISI</option>
                                                <option value="KOMJEN POL" <?php if ($pg->Pangkat_current == 'KOMJEN POL') echo 'selected'; ?>>KOMJEN POL</option>
                                                <option value="IRJEN POL" <?php if ($pg->Pangkat_current == 'IRJEN POL') echo 'selected'; ?>>IRJEN POL</option>
                                                <option value="BRIGJEN POL" <?php if ($pg->Pangkat_current == 'BRIGJEN POL') echo 'selected'; ?>>BRIGJEN POL</option>
                                            </optgroup>
                                            <optgroup label="PERWIRA MENENGAH (PAMEN)">
                                                <option value="KOMBES POL" <?php if ($pg->Pangkat_current == 'KOMBES POL') echo 'selected'; ?>>KOMBES POL</option>
                                                <option value="AKBP" <?php if ($pg->Pangkat_current == 'AKBP') echo 'selected'; ?>>AKBP</option>
                                                <option value="KOMPOL" <?php if ($pg->Pangkat_current == 'KOMPOL') echo 'selected'; ?>>KOMPOL</option>
                                            </optgroup>
                                            <optgroup label="PERWIRA PERTAMA (PAMA)">
                                                <option value="AKP" <?php if ($pg->Pangkat_current == 'AKP') echo 'selected'; ?>>AKP</option>
                                                <option value="IPTU" <?php if ($pg->Pangkat_current == 'IPTU') echo 'selected'; ?>>IPTU</option>
                                                <option value="IPDA" <?php if ($pg->Pangkat_current == 'IPDA') echo 'selected'; ?>>IPDA</option>
                                            </optgroup>
                                            <optgroup label="BINTARA TINGGI">
                                                <option value="AIPTU" <?php if ($pg->Pangkat_current == 'AIPTU') echo 'selected'; ?>>AIPTU</option>
                                                <option value="AIPDA" <?php if ($pg->Pangkat_current == 'AIPDA') echo 'selected'; ?>>AIPDA</option>
                                            </optgroup>
                                            <optgroup label="BINTARA">
                                                <option value="BRIPKA" <?php if ($pg->Pangkat_current == 'BRIPKA') echo 'selected'; ?>>BRIPKA</option>
                                                <option value="BRIGPOL" <?php if ($pg->Pangkat_current == 'BRIGPOL') echo 'selected'; ?>>BRIGPOL</option>
                                                <option value="BRIPTU" <?php if ($pg->Pangkat_current == 'BRIPTU') echo 'selected'; ?>>BRIPTU</option>
                                                <option value="BRIPDA" <?php if ($pg->Pangkat_current == 'BRIPDA') echo 'selected'; ?>>BRIPDA</option>
                                            </optgroup>
                                            <optgroup label="TAMTAMA">
                                                <option value="ABRIP" <?php if ($pg->Pangkat_current == 'ABRIP') echo 'selected'; ?>>ABRIP</option>
                                                <option value="ABRIPTU" <?php if ($pg->Pangkat_current == 'ABRIPTU') echo 'selected'; ?>>ABRIPTU</option>
                                                <option value="ABRIPDA" <?php if ($pg->Pangkat_current == 'ABRIPDA') echo 'selected'; ?>>ABRIPDA</option>
                                                <option value="BHARAKA" <?php if ($pg->Pangkat_current == 'BHARAKA') echo 'selected'; ?>>BHARAKA</option>
                                                <option value="BHARATU" <?php if ($pg->Pangkat_current == 'BHARATU') echo 'selected'; ?>>BHARATU</option>
                                                <option value="BHARADA" <?php if ($pg->Pangkat_current == 'BHARADA') echo 'selected'; ?>>BHARADA</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir <font color="red">(*)</font></label>
                                        <input type="text" name="Tempat_lahir" id="tempatlhr" class="form-control" value="<?php echo $pg->Tempat_lahir;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir <font color="red">(*)</font></label>
                                        <input type="date" name="Tanggal_lahir" id="tgl_lahir" class="form-control" value="<?php echo $pg->Tanggal_lahir;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin <font color="red">(*)</font></label><br>
                                        <select name="Jenis_kelamin" id="jk">
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <option value="Laki-laki" <?php if ($pg->Jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                            <option value="Perempuan" <?php if ($pg->Jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                        </select >
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pernikahan <font color="red">(*)</font></label><br>
                                        <select name="Status_pernikahan" id="statuskwn" >
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <option value="Menikah" <?php if ($pg->Status_pernikahan == 'Menikah') echo 'selected'; ?>>Menikah</option>
                                            <option value="Belum Menikah" <?php if ($pg->Status_pernikahan == 'Belum Menikah') echo 'selected'; ?>>Belum Menikah</option>
                                        </select >
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <input type="text" name="Riwayat_pendidikan" id="pendAkhir" class="form-control" value="<?php echo $pg->Riwayat_pendidikan;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengalaman Kerja</label>
                                        <input type="text" name="Pengalaman_kerja" id="pengalamankrj" class="form-control" value="<?php echo $pg->Pengalaman_kerja;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Kerja <font color="red">(*)</font></label><br>
                                        <select name="Unit_kerja" id="uk">
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <option value="BINMAS" <?php if ($pg->Unit_kerja == 'BINMAS') echo 'selected'; ?>>BINMAS</option>
                                            <option value="INTEL" <?php if ($pg->Unit_kerja == 'INTEL') echo 'selected'; ?>>INTEL</option>
                                            <option value="LANTAS" <?php if ($pg->Unit_kerja == 'LANTAS') echo 'selected'; ?>>LANTAS</option>
                                            <option value="SAMAPTA" <?php if ($pg->Unit_kerja == 'SAMAPTA') echo 'selected'; ?>>SAMAPTA</option>
                                            <option value="SERSE" <?php if ($pg->Unit_kerja == 'SERSE') echo 'selected'; ?>>SERSE</option>
                                            <option value="SIUM" <?php if ($pg->Unit_kerja == 'SIUM') echo 'selected'; ?>>SIUM</option>
                                            <option value="SPKT" <?php if ($pg->Unit_kerja == 'SPKT') echo 'selected'; ?>>SPKT</option>
                                        </select >
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji Saat Ini <font color="red">(*)</font></label>
                                        <input type="text" name="Gaji_current" id="gaji_curr" class="form-control" onkeypress="return hanyaAngka(event)" value="<?php echo $pg->Gaji_current; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Status Pegawai <font color="red">(*)</font></label><br>
                                        <select name="status_pegawai" id="statuspg">
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <option value="Aktif" <?php if ($pg->status_pegawai == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                            <option value="Tidak Aktif" <?php if ($pg->status_pegawai == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kenaikan Pangkat Terakhir <font color="red">(*)</font></label>
                                        <input type="date" name="Tgl_kenaikan_pangkat_terakhir" id="tglkenpangakhir" class="form-control" value="<?php echo $pg->Tgl_kenaikan_pangkat_terakhir;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Bergabung <font color="red">(*)</font></label>
                                        <input type="date" name="Tanggal_bergabung" id="tglgabung" class="form-control" value="<?php echo $pg->Tanggal_bergabung;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat <font color="red">(*)</font></label>
                                        <textarea class="form-control" id="Alamat" rows="3" name="Alamat"><?php echo $pg->Alamat;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Handphone <font color="red">(*)</font></label>
                                        <input type="text" name="Nomor_hp" id="noHP" class="form-control" onkeypress="return hanyaAngka(event)" value="<?php echo $pg->Nomor_hp;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Email <font color="red">(*)</font></label>
                                        <input type="text" name="Alamat_email" id="email" class="form-control" value="<?php echo $pg->Alamat_email;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Cuti <font color="red">(*)</font></label>
                                        <input type="text" name="Informasi_cuti" id="jumcuti" class="form-control" value="<?php echo $pg->Informasi_cuti;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Pegawai</label>
                                        <div class="info-box-content">
                                            <img src="<?php echo base_url();?>upload/user/<?php echo $pg->Foto_pegawai;?>" width="90" height="110"><br>
                                            <label><?php echo $pg->Foto_pegawai;?></label> 
                                            <input type="hidden" name="old_Foto_pegawai" class="form-control" value="<?php echo $pg->Foto_pegawai;?>">
                                            <p class="text-danger">
                                                * Max File 10 MB.
                                                <br>
                                                * Jenis File yang di izinkan (jpg|png|jpeg)
                                                <br>
                                                * Jika ada kesalahan, tekan tombol "Reset" untuk menginputkan ulang data.
                                            </p>
                                        </div>
                                        <input type="file" name="Foto_pegawai" id="foto" class="form-control">
                                    </div>
                                    <a href="<?php echo base_url('Admin/Datapegawai'); ?>" class=" btn btn-primary btn-block"><b>Kembali</b></a>
                                    <button type="reset" class="btn btn-danger btn-block" id="resetButton">
                                        <b>Reset</b>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-block" onclick="alert('Data Berhasil Di Perbaharui')">
                                        <b>Simpan</b>
                                    </button>
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
            </div>
            <!-- /.content -->
        </section>
        <!-- /.content-wrapper -->
    </div>
    <?php 
    $this->load->view('admin/UI_elements/footer');
    ?>

    <script>
        // Menunggu hingga halaman sepenuhnya dimuat
        document.addEventListener('DOMContentLoaded', function () {
            var resetButton = document.getElementById('resetButton');
            var nrpInput = document.querySelector('input[name="NRP"]');

            // Mendengarkan perubahan input pada elemen dengan nama "NRP"
            nrpInput.addEventListener('input', function () {
                // Validasi panjang NRP
                if (this.value.length > 8) {
                    // Jika lebih dari 8 digit, hapus karakter berlebih
                    this.value = this.value.slice(0, 8);
                }
            });

            // Mendengarkan klik tombol reset
            resetButton.addEventListener('click', function () {
                // Menghapus isi dari semua elemen input
                var inputElements = document.getElementsByTagName('input');
                for (var i = 0; i < inputElements.length; i++) {
                    inputElements[i].value = '';
                }
            });
        });

        // Fungsi untuk mengirim formulir
        function submitForm() {
            // Mengambil semua elemen input yang diberi atribut "required"
            var requiredInputs = document.querySelectorAll('input[required]');
            var allInputsFilled = true;

            // Memeriksa apakah semua input yang diberi atribut "required" telah diisi
            for (var i = 0; i < requiredInputs.length; i++) {
                if (requiredInputs[i].value === "") {
                    allInputsFilled = false;
                    break;
                }
            }

            // Jika semua input telah diisi, tampilkan pesan sukses
            if (allInputsFilled) {
                showSuccessMessage();
            } else {
                // Jika ada input yang belum diisi, tampilkan pesan peringatan
                alert("Harap isi semua form input yang tersedia!");
            }
        }

        // Fungsi untuk menampilkan pesan sukses
        function showSuccessMessage() {
            alert("Form input telah terisi semua. Melanjutkan ...");
        }

        // Fungsi untuk memastikan bahwa karakter yang dimasukkan adalah angka
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            return charCode >= 48 && charCode <= 57;
        }

        // Script JavaScript untuk menampilkan/menyembunyikan input "Lainnya" saat opsi dipilih
        const jabatanCurrSelect = document.getElementById('jabatan_curr');
        const jabatanCurrLainnya = document.getElementById('jabatan_curr_lainnya');

        jabatanCurrSelect.addEventListener('change', function () {
            if (jabatanCurrSelect.value === 'Lainnya') {
                // Tampilkan input "Lainnya" jika opsi "Lainnya" dipilih
                jabatanCurrLainnya.style.display = 'block';
            } else {
                // Sembunyikan input "Lainnya" jika opsi lainnya dipilih
                jabatanCurrLainnya.style.display = 'none';
            }
        });

    </script>
</body>
</html>
