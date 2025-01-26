<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK | Login - Anggota Kepolisian</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/dist/img/landing_icon.svg" type="image/svg" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
    /* Tambahkan atau modifikasi CSS sesuai kebutuhan Anda */
    .warning_box {
        border: 1px solid #dc3545;
        /* Warna border merah */
        color: #1c1e21;
        background-color: #ffebe8;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #508bfc;">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <?php
                        if ($this->session->flashdata('alert') == 'login_gagal') :
                        ?>
                    <div class="alert alert-danger alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        NRP dan Kata Sandi Salah!
                    </div>
                    <?php
                        elseif ($this->session->flashdata('alert') == 'belum_login') :
                        ?>
                    <div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Silahkan Login terlebih dahulu
                    </div>
                    <?php
                        elseif ($this->session->flashdata('alert') == 'regis_success') :
                            ?>
                    <div class="alert alert-success alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Berhasil Daftar
                    </div>
                    <?php
                        elseif ($this->session->flashdata('alert') == 'regis_fail') :
                            ?>
                    <div class="alert alert-danger alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Gagal Mendaftar! Silahkan Daftar Kembali
                    </div>
                    <?php
                        endif;
                        ?>
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5"> <b> Login </b> | Anggota Kepolisian
                                <p style="font-weight: normal; font-size: 16px; margin-top: 3%;">
                                    (Sistem Informasi Anggota Kepolisian Cikampek)
                                </p>
                            </h3>
                            <div class="warning_box" id="warning-box" style="display: none;">
                                <span id="warning-message"></span>
                            </div>
                            <form action="<?php echo base_url('Login/validasi_pegawai'); ?>" method="post">
                                <div class="form-outline mb-4">
                                    <input type="text" name="user_pg" id="user_pg" class="form-control form-control-lg"
                                        placeholder="Masukkan NRP Anda" required>
                                </div>
                                <div class="input-group form-outline mb-4">
                                    <input type="password" name="pw_pg" id="password"
                                        class="form-control form-control-lg" placeholder="Masukkan Kata Sandi Anda"
                                        style="border-right: none; " required>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" data-target="password"
                                            style="background: transparent;">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit"
                                    onclick="submitForm()">Masuk</button>
                            </form>
                            <hr class="my-4">
                            <p class="mb-0">
                                <a href="<?php echo base_url().'Register/daftar_user'; ?>" class="text-center"
                                    data-toggle="modal" data-target="#daftarModal">
                                    Belum Punya Akun ? Daftar
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Daftar -->
    <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="daftarModalLabel"><b>Daftar</b></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi modal sesuai dengan form pendaftaran Anda -->
                    <div class="card-body register-card-body">
                        <?php echo form_open_multipart('Pegawai/Daftar'); ?>
                        <div class="row d-flex justify-content-around">
                            <div class="form-group col-md-6">
                                <input type="text" name="Nama_depan" id="namadepan" class="form-control"
                                    placeholder="Nama depan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="Nama_belakang" id="namabelakang" class="form-control"
                                    placeholder="Nama belakang" required>
                            </div>
                        </div>
                        <div class=" form-group">
                            <input type="text" name="NRP" id="nrp" class="form-control"
                                onkeypress="return hanyaAngka(event)" autocomplete="off"
                                placeholder="Masukkan 8 Digit Angka NRP">
                            <div id="warning-message-container"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Alamat_email" id="email" class="form-control"
                                placeholder="Alamat Email" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="pw_pg" id="password1" class="form-control"
                                    placeholder="Kata Sandi Baru" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="password1"
                                        style="background: transparent;">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="Tanggal_lahir" id="tgl_lahir" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="border p-2 align-items-center">
                                        <label for="laki-laki" class="form-check-label mr-2">Laki-laki</label>
                                        <div class="d-flex justify-content-end">
                                            <input type="radio" name="Jenis_kelamin" id="laki-laki" value="Laki-laki"
                                                class="form-check-input" style="margin-top: -1rem;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="border p-2 align-items-center">
                                        <label for="perempuan" class="form-check-label mr-2">Perempuan</label>
                                        <div class="d-flex justify-content-end">
                                            <input type="radio" name="Jenis_kelamin" id="perempuan" value="Perempuan"
                                                class="form-check-input" style="margin-top: -1rem;" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mb-3" style="margin-top: 5%;">
                            <button type="submit" id="btnRegis" class="btn btn-primary btn-lg btn-block"><b> Daftar
                                </b></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function() {
        // Function to check if all input fields are filled
        function checkInputs() {
            var nrp = $('#nrp').val();

            if (nrp.length == 8) {
                $('#warning-message-container').empty(); // Clear the warning message
                if ($('#btnRegis').prop('disabled')) {
                    $('#btnRegis').prop('disabled', false);
                }
            } else {
                if (!$('#btnRegis').prop('disabled')) {
                    $('#btnRegis').prop('disabled', true);
                }
                $('#warning-message-container').html(
                    '<p style="color: red; font-size: 13px; "> NRP harus 8 karakter!</p>'
                );

            }
        }

        // Attach the input event listener to the password input field
        $('#nrp').on('input', function() {
            checkInputs();
        });

        // Initial button state check
        checkInputs();
    });
    </script>

    <script>
    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan('slow')
    $('#feedback').delay(3000).fadeOut('slow');

    // Fungsi untuk memastikan input NRP hanya diisi oleh angka dan memiliki panjang 8 digit
    function hanyaAngka(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        var inputNRP = event.target.value;

        // Memastikan karakter yang dimasukkan adalah angka dan panjangnya 8 digit
        if ((charCode > 31 && (charCode < 48 || charCode > 57)) || inputNRP.length >= 8) {
            return false;
        }
        return true;
    }

    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const passwordInput = document.getElementById(targetId);
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Change the eye icon to open or closed
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye" aria-hidden="true"></i>' :
                '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        });
    });
    </script>


</body>

</html>