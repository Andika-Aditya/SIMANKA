<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA | Login - Admin</title>

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
                        if ($this->session->flashdata('alert') == 'admin_login_gagal') :
                        ?>
                    <div class="alert alert-danger alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Username dan kata sandi salah!
                    </div>
                    <?php
                        elseif ($this->session->flashdata('alert') == 'admin_belum_login') :
                        ?>
                    <div class="alert alert-warning alert-dismissible animated fadeInDown round" style="" id="feedback"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Silahkan Login terlebih dahulu
                    </div>
                    <?php
                        endif;
                        ?>
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5"> <b> Login </b> | Admin
                                <p style="font-weight: normal; font-size: 16px; margin-top: 3%;">
                                    (Sistem Manajemen Kepegawaian Polsek Cikampek)
                                </p>
                            </h3>
                            <div class="warning_box" id="warning-box" style="display: none;">
                                <span id="warning-message"></span>
                            </div>
                            <form action="<?php echo base_url('Login/validasi_admin'); ?>" method="post">
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="username"
                                        class="form-control form-control-lg" placeholder="Masukkan Username" required>
                                </div>
                                <div class="input-group form-outline mb-4">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg" placeholder="Masukkan Kata Sandi"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

    <script>
    // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
    // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
    // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan('slow')
    $('#feedback').delay(3000).fadeOut('slow');

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