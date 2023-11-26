<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Pegawai</title>

    <!-- Memuat head.php -->
    <?php 
        $this->load->view('admin/UI_elements/head');
    ?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
                    <h1 class="m-0">Data Pegawai</h1>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if ($this->session->flashdata('alert') == 'tambah_pegawai'):
                        ?>
                        <div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Data berhasil ditambahkan
                        </div>
                    <?php
                    elseif ($this->session->flashdata('alert') == 'hapus_pegawai'):
                        ?>
                        <div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Data berhasil dihapus
                        </div>
                    <?php
                    endif;
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                                <i class="fa fa-plus"></i>Tambah Data Pegawai
                            </button>

                            <!-- card -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 align="center"><b>Data Pegawai</b></h4>
                                </div>
                                <!-- /.card-header -->

                                <div class="alert alert-info" role="alert" style=" margin: 10px 30px;">
                                  <p>
                                    Klik icon ( <i class="fa fa-search-plus"></i> ) untuk melihat detail data pegawai!
                                  <br>
                                    Klik icon ( <i class="fa fa-trash"></i> ) untuk menghapus data pegawai!
                                  <br>
                                    Klik icon ( <i class="fa fa-edit"></i> ) untuk melakukan edit data pegawai!
                                  </p>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr align="center">
                                                <th>NRP</th>
                                                <th>NAMA LENGKAP</th>
                                                <th>JABATAN</th>
                                                <th>UNIT KERJA</th>
                                                <th>JENIS KELAMIN</th>
                                                <th>STATUS PEGAWAI</th>
                                                <th>TOMBOL AKSI</th>  
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach($pegawai as $pg) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $pg->NRP ?></td>
                                                    <td><?php echo $pg->Nama_lengkap ?></td>
                                                    <td align="center"><?php echo $pg->Jabatan_current ?></td>
                                                    <td align="center"><?php echo $pg->Unit_kerja ?></td> 
                                                    <td align="center"><?php echo $pg->Jenis_kelamin ?></td>
                                                    <td align="center">
                                                        <?php
                                                        if ($pg->status_pegawai == 'Aktif'):
                                                            ?>
                                                            <div class="badge badge-success"><i class="ft-check-circle"></i> AKTIF </div>
                                                            <?php
                                                        else :
                                                            ?>
                                                            <div class="badge badge-secondary"><i class="ft-x-circle"></i> TIDAK AKTIF </div>
                                                            <?php
                                                        endif;
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <a class="btn btn-success btn-sm" title="Lihat Selengkapnya" href="<?php echo base_url('Admin/detail_pegawai/'.$pg->id_pegawai)?>">
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" onclick="javascript: return confirm('Anda yakin hapus?')" href="<?php echo base_url('Admin/hapus_pegawai/'.$pg->id_pegawai)?>" title="Hapus Data">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="<?php echo base_url('Admin/edit_pegawai/'.$pg->id_pegawai)?>" title="Edit Data">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table -->
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

        <!-- Modal Tambah Data Pegawai -->
        <div class="modal fade" id="tambah" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PEGAWAI</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('Admin/tambah_data_pegawai'); ?>
                        <div class="form-group">
                            <label>Nama Pegawai <font color="red">(*)</font></label>
                            <input type="text" name="Nama_lengkap" id="namalengkap" class="form-control"  placeholder="Nama Lengkap Pegawai" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>NRP <font color="red">(*)</font></label>
                            <input type="text" name="NRP" id="nrp" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off" placeholder="Masukkan 8 Digit NRP Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan Saat Ini <font color="red">(*)</font></label><br>
                            <select name="Jabatan_current" id="jabatan_curr">
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <option value="KAPOLRI">KAPOLRI</option>
                                <option value="WAKAPOLRI">WAKAPOLRI</option>
                                <option value="ITWASUM">ITWASUM</option>
                                <option value="ASOPS">ASOPS</option>
                                <option value="AS SDM">AS SDM</option>
                                <option value="ASRENA">ASRENA</option>
                                <option value="ASLOG">ASLOG</option>
                                <option value="DIV PROPAM">DIV PROPAM</option>
                                <option value="DIV KUM">DIV KUM</option>
                                <option value="DIV HUMAS">DIV HUMAS</option>
                                <option value="DIV HUBINTER">DIV HUBINTER</option>
                                <option value="DIV TIK">DIV TIK</option>
                                <option value="YANMA">YANMA</option>
                                <option value="SETUM">SETUM</option>
                                <option value="SPRIPIM">SPRIPIM</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <!-- Tambahkan elemen input untuk opsi "Lainnya" -->
                        <div class="form-group" id="jabatan_curr_lainnya" style="display: none;">
                            <label>Masukkan Jabatan Saat Ini <font color="red">(*)</font></label><br>
                            <input type="text" name="Jabatan_current_lainnya">
                        </div>
                        <div class="form-group">
                            <label>Pangkat Saat Ini <font color="red">(*)</font></label><br>
                            <select name="Pangkat_current" id="pangkat_curr">
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <optgroup label="PERWIRA TINGGI (PATI)">
                                    <option value="JENDERAL POLISI">JENDERAL POLISI</option>
                                    <option value="KOMJEN POL">KOMJEN POL</option>
                                    <option value="IRJEN POL">IRJEN POL</option>
                                    <option value="BRIGJEN POL">BRIGJEN POL</option>
                                </optgroup>
                                <optgroup label="PERWIRA MENENGAH (PAMEN)">
                                    <option value="KOMBES POL">KOMBES POL</option>
                                    <option value="AKBP">AKBP</option>
                                    <option value="KOMPOL">KOMPOL</option>
                                </optgroup>
                                <optgroup label="PERWIRA PERTAMA (PAMA)">
                                    <option value="AKP">AKP</option>
                                    <option value="IPTU">IPTU</option>
                                    <option value="IPDA">IPDA</option>
                                </optgroup>
                                <optgroup label="BINTARA TINGGI">
                                    <option value="AIPTU">AIPTU</option>
                                    <option value="AIPDA">AIPDA</option>
                                </optgroup>
                                <optgroup label="BINTARA">
                                    <option value="BRIPKA">BRIPKA</option>
                                    <option value="BRIGPOL">BRIGPOL</option>
                                    <option value="BRIPTU">BRIPTU</option>
                                    <option value="BRIPDA">BRIPDA</option>
                                </optgroup>
                                <optgroup label="TAMTAMA">
                                    <option value="ABRIP">ABRIP</option>
                                    <option value="ABRIPTU">ABRIPTU</option>
                                    <option value="ABRIPDA">ABRIPDA</option>
                                    <option value="BHARAKA">BHARAKA</option>
                                    <option value="BHARATU">BHARATU</option>
                                    <option value="BHARADA">BHARADA</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir <font color="red">(*)</font></label>
                            <input type="text" name="Tempat_lahir" id="tempatlhr" class="form-control" placeholder="Tempat Lahir" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir <font color="red">(*)</font></label>
                            <input type="date" name="Tanggal_lahir" id="tgl_lahir" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin <font color="red">(*)</font></label><br>
                            <select name="Jenis_kelamin" id="jk" required>
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select >
                        </div>
                        <div class="form-group">
                            <label>Status Pernikahan <font color="red">(*)</font></label><br>
                            <select name="Status_pernikahan" id="statuskwn" required>
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select >
                        </div>
                        <div class="form-group">
                            <label>Pendidikan Terakhir <font color="red">(*)</font></label>
                            <input type="text" name="Riwayat_pendidikan" id="pendAkhir" class="form-control" placeholder="Pendidikan Terakhir" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Pengalaman Kerja <font color="red">(*)</font></label>
                            <input type="text" name="Pengalaman_kerja" id="pengalamankrj" class="form-control" placeholder="Pengalaman Kerja" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Unit Kerja <font color="red">(*)</font></label><br>
                            <select name="Unit_kerja" id="uk" required>
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <option value="BINMAS">BINMAS</option>
                                <option value="INTEL">INTEL</option>
                                <option value="LANTAS">LANTAS</option>
                                <option value="SAMAPTA">SAMAPTA</option>
                                <option value="SERSE">SERSE</option>
                                <option value="SIUM">SIUM</option>
                                <option value="SPKT">SPKT</option>
                            </select >
                        </div>
                        <div class="form-group">
                            <label>Gaji Saat Ini <font color="red">(*)</font></label>
                            <input type="text" name="Gaji_current" id="gaji_curr" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Status Pegawai <font color="red">(*)</font></label><br>
                            <select name="status_pegawai" id="statuspg" required>
                                <option value="" disabled selected>Pilih Salah Satu</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kenaikan Pangkat Terakhir <font color="red">(*)</font></label>
                            <input type="date" name="Tgl_kenaikan_pangkat_terakhir" id="tglkenpangakhir" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bergabung <font color="red">(*)</font></label>
                            <input type="date" name="Tanggal_bergabung" id="tglgabung" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat <font color="red">(*)</font></label>
                            <textarea class="form-control" id="Alamat" rows="3" name="Alamat" placeholder="Alamat" autocomplete="off" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone <font color="red">(*)</font></label>
                            <input type="text" name="Nomor_hp" id="noHP" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Nomor Handphone" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email <font color="red">(*)</font></label>
                            <input type="text" name="Alamat_email" id="email" class="form-control" placeholder="Alamat Email" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Cuti <font color="red">(*)</font></label>
                            <input type="text" name="Informasi_cuti" id="jumcuti" class="form-control" placeholder="Jumlah Cuti" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Pegawai <font color="red">(*)</font></label>
                            <div class="info-box-content">
                                <p class="text-danger">
                                    * Max File 10 MB.
                                    <br>
                                    * Jenis File yang di izinkan (jpg|png|jpeg)
                                    <br>
                                    * Jika ada kesalahan, tekan tombol "Reset" untuk menginputkan ulang data.
                                </p>
                            </div>
                            <input type="file" name="Foto_pegawai" id="foto" class="form-control" required>
                        </div>
                        <button type="reset" class="btn btn-danger btn-block" id="resetButton">
                            <b>Reset</b>
                        </button>
                        <button type="submit" class="btn btn-primary btn-block" id="simpan" onclick="submitForm()">
                            <b>Simpan</b>
                        </button>
                    </form>
                    </div>
                </div>
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
    <!-- /.DataTables  & Plugins -->

    <script>
        $(function () {
            // Inisialisasi DataTable dengan pengaturan tertentu
            $("#example1").DataTable({
                "paging": true, // Aktifkan paging (tampilkan halaman)
                "lengthChange": true, // Aktifkan pilihan jumlah entri per halaman
                "searching": true, // Aktifkan fitur pencarian
                "ordering": true, // Aktifkan penyortiran
                "autoWidth": false, // Matikan penyesuaian lebar otomatis
                "responsive": true, // Aktifkan desain responsif
                "columnDefs": [
                    {
                        "targets": -1, // Menghilangkan penyortiran kolom pada kolom terakhir (TOMBOL AKSI)
                        "orderable": false, // Menonaktifkan penyortiran untuk kolom ini
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
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

        // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
        // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
        // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan ('slow')
        $('#feedback').delay(3000).fadeOut('slow');

    </script>
</body>
</html>
