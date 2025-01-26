<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK - Absen</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h1 class="m-0">Absen</h1>
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
                                    <?php echo form_open_multipart('Pegawai/InputAbsen'); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id_absenpegawai" class="form-control"
                                            value="<?php echo $data_pg->id_pegawai ?>" readonly>
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Hadir </label>
                                            <input type="text" name="tanggal_kehadiran" id="currentDateTime"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jam </label>
                                            <input type="text" name="jam" id="jam" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="Nama_depan" id="namadepan" class="form-control"
                                            value="<?php echo $data_pg->Nama_depan ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" name="Nama_lengkap" id="namalengkap" class="form-control"
                                            value="<?php echo $data_pg->Nama_depan ?> <?php echo $data_pg->Nama_belakang ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>NRP</label>
                                        <input type="text" name="NRP" id="nrp" class="form-control"
                                            value="<?php echo $data_pg->NRP ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Hadir <font color="red">(*)</font></label><br>
                                        <select name="Status_hadir" id="stts_hdr" class="custom-select rounded-3"
                                            required>
                                            <option value="" disabled selected>Pilih Salah Satu</option>
                                            <option value="HADIR">HADIR</option>
                                            <option value="IZIN">IZIN</option>
                                            <option value="CUTI">CUTI</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="stts_hdr_lainnya" style="display: none;">
                                        <label>Masukkan Tanggal Berakhirnya <font color="red">(*)</font></label>
                                        <input type="date" name="tanggal_selesai" id="stts_hdr_lainnya"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Bukti Absen <font color="red">(*)</font></label>
                                        <div class="info-box-content">
                                            <p class="text-danger">
                                                * Max File 5 MB.
                                                <br>
                                                * Jenis File yang di izinkan (jpg|png|jpeg)
                                            </p>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="bukti_hadir" id="bukti_hadir"
                                                class="custom-file-input" onchange="displayFileName()" required>
                                            <label class="custom-file-label" for="bukti_hadir"
                                                style="text-align: left;">Pilih
                                                file</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="<?php echo base_url('Pegawai/Beranda'); ?>" class="btn btn-primary"
                                            style="width: 150px; margin: 1%;"><b>Kembali</b></a>
                                        <button type="submit" id="btnSimpan" class="btn btn-success"
                                            style="width: 150px; margin: 1%;">
                                            <b>Simpan</b>
                                        </button>
                                    </div>

                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.ontainer-fluid -->
            </section>
        </div>
        <!-- /.content -->
    </div>
    <?php 
    $this->load->view('pegawai/UI_elements/footer');
    ?>

    <script>
    $(document).ready(function() {
        // Fungsi untuk memeriksa dan mengatur keadaan tombol "Simpan"
        function updateButtonState() {
            // Menyetel zona waktu ke WIB (Waktu Indonesia Barat) di JavaScript
            const options = {
                timeZone: 'Asia/Jakarta'
            };
            const formatter = new Intl.DateTimeFormat('id-ID', options);
            const currentDate = new Date();

            // Mendapatkan tanggal dalam format YYYY-MM-DD
            const year = currentDate.getFullYear();
            const month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Months are zero-based
            const day = ('0' + currentDate.getDate()).slice(-2);

            const date = `${year}-${month}-${day}`;

            // Ambil nilai status hadir
            const statusHadir = $('#stts_hdr').val();

            const tglHadir = '<?php echo $data_absen->tanggal_kehadiran ?>';

            if (tglHadir == date && tglHadir != '') {
                console.log("tanggal hadir Sama dengan tanggal sekarang");

                if (statusHadir != 'IZIN' && statusHadir != 'CUTI') {
                    if (!$('#btnSimpan').prop('disabled')) {
                        $('#btnSimpan').prop('disabled', true);
                    }
                } else {
                    if ($('#btnSimpan').prop('disabled')) {
                        $('#btnSimpan').prop('disabled', false);
                    }
                }

            } else {
                if ($('#btnSimpan').prop('disabled')) {
                    $('#btnSimpan').prop('disabled', false);
                }

            }

        }

        // Panggil fungsi saat halaman dimuat dan setiap kali status hadir berubah
        updateButtonState();
        $('#stts_hdr').on('change', updateButtonState);
    });
    </script>


    <script>
    // Script JavaScript untuk menampilkan/menyembunyikan input "Lainnya" saat opsi dipilih
    const sttshdrCurrSelect = document.getElementById('stts_hdr');
    const sttshdriCurrLainnya = document.getElementById('stts_hdr_lainnya');

    sttshdrCurrSelect.addEventListener('change', function() {
        if (sttshdrCurrSelect.value === 'IZIN' || sttshdrCurrSelect.value === 'CUTI') {
            // Tampilkan input "Lainnya" jika opsi "Lainnya" dipilih
            sttshdriCurrLainnya.style.display = 'block';
        } else {
            // Sembunyikan input "Lainnya" jika opsi lainnya dipilih
            sttshdriCurrLainnya.style.display = 'none';
        }
    });

    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan
    ('slow')
    $('#feedback').delay(3000).fadeOut('slow');

    function tanggalIndo(tanggal) {
        // Menetapkan zona waktu ke WIB (Waktu Indonesia Barat)
        const options = {
            timeZone: 'Asia/Jakarta'
        };
        const formatter = new Intl.DateTimeFormat('id-ID', options);

        var bulanArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ];

        var hariArr = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Parse the date in the correct format 'DD/MM/YYYY'
        var tanggal_arr = tanggal.split('/');
        var dateObj = new Date(`${tanggal_arr[2]}-${tanggal_arr[1]}-${tanggal_arr[0]}`);

        var hari = hariArr[dateObj.getDay()];
        var bulan = bulanArr[dateObj.getMonth()];
        var tahun = dateObj.getFullYear();

        var hasil_formatted = hari + ', ' + tanggal_arr[0] + ' ' + bulan + ' ' + tahun;
        return hasil_formatted;
    }

    function waktuIndo(jam, menit) {
        var hasil_formatted = jam + ':' + menit + ' WIB';
        return hasil_formatted;
    }

    function displayFileName() {
        // Mendapatkan elemen input file
        var input = document.getElementById('bukti_hadir');

        // Mendapatkan label yang akan menampilkan nama file
        var label = document.querySelector('.custom-file-label');

        // Menetapkan nilai label dengan nama file yang diunggah
        label.textContent = input.files[0].name;
    }

    // Menetapkan zona waktu ke WIB (Waktu Indonesia Barat)
    const options = {
        timeZone: 'Asia/Jakarta'
    };
    const formatter = new Intl.DateTimeFormat('id-ID', options);
    const currentDate = new Date();

    var date = formatter.format(currentDate); // Mendapatkan tanggal dalam format YYYY-MM-DD
    var hours = currentDate.getHours().toString().padStart(2, '0'); // Menambahkan leading zero jika perlu
    var minutes = currentDate.getMinutes().toString().padStart(2, '0'); // Menambahkan leading zero jika perlu

    var tanggal_currentDate_formatted = tanggalIndo(date);
    var jam_currentTime_formatted = waktuIndo(hours, minutes);

    document.getElementById('currentDateTime').value = tanggal_currentDate_formatted;
    document.getElementById('jam').value = jam_currentTime_formatted;
    </script>
</body>

</html>