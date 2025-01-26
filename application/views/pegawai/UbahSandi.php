<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKAMPEK | Ubah Kata Sandi - Anggota Kepolisian</title>

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
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #508bfc;">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1.5rem;">
                        <div class="card-header" style="border: none; margin-top: 5%; margin-bottom: 1%;">
                            <span style="font-size: 15px;">
                                <?php echo $data_pg->Nama_depan ?> | SIKAMPEK
                            </span>
                            <h5><b>Ubah Kata Sandi</b></h5>
                            <span style="font-size: 15px; position: relative; word-wrap: break-word;">
                                Kata sandi Anda harus lebih dari enam karakter dan berisi kombinasi angka, huruf, dan
                                karakter khusus (!$@%).
                            </span>
                        </div>
                        <div class="card-body ">
                            <?php echo form_open_multipart('Pegawai/Ubah_sandi'); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_userpegawai" class="form-control"
                                    value="<?php echo $data_pg->id_pegawai?>" readonly>
                            </div>
                            <div class="input-group form-outline mb-4">
                                <input type="password" name="currentpw" id="password1"
                                    class="form-control form-control-lg" placeholder="Kata sandi saat ini"
                                    style="border-right: none; border-radius: 1rem;" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="password1"
                                        style="background: transparent;">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group form-outline mb-4">
                                <input type="password" name="new_pw" id="password2" class="form-control form-control-lg"
                                    placeholder="Kata sandi baru" style="border-right: none; border-radius: 1rem;"
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="password2"
                                        style="background: transparent;">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <div id="warning-message-pwtooshort"></div>

                            <div class="input-group form-outline mb-4">
                                <input type="password" name="reenternew_pw" id="password3"
                                    class="form-control form-control-lg" placeholder="Tulis ulang kata sandi baru"
                                    style="border-right: none; border-radius: 1rem;" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password" data-target="password3"
                                        style="background: transparent;">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- Add a container for the warning message below the "Tulis ulang kata sandi baru" input field -->
                            <div id="warning-message-container"></div>
                            <br>
                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                                style="margin-bottom: 5%;">Ubah kata sandi</button>
                            <center><a href="<?php echo base_url().'Pegawai/Beranda';?>">Kembali Ke Beranda</a>
                            </center>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function() {
        // Function to check if all input fields are filled
        function checkInputs() {
            var currentPassword = $('#password1').val();
            var newPassword = $('#password2').val();
            var reenterNewPassword = $('#password3').val();

            // Check if at least one input has a value
            var atLeastOneInputFilled = currentPassword !== '' || newPassword !== '' || reenterNewPassword !==
                '';

            // Check if passwords match and meet the length requirement
            var passwordsMatch = newPassword === reenterNewPassword;
            var passwordLengthValid = newPassword.length >= 6;

            return atLeastOneInputFilled && passwordsMatch && passwordLengthValid;
        }

        // Function to update border style based on input values
        function updateBorder() {
            const password1 = $('#password1');
            const password2 = $('#password2');
            const password3 = $('#password3');

            updateInputBorder(password1);
            updateInputBorder(password2);
            updateInputBorder(password3);
        }

        function updateInputBorder(inputElement) {
            const inputValue = inputElement.val();
            const borderStyle = inputValue !== '' ? 'border-right: none;' : '';
            inputElement.attr('style', borderStyle);
        }

        // Attach the input event listener to each input field
        $('#password1, #password2, #password3').on('input', function() {
            toggleButton();
            updateBorder();
        });

        // Function to enable/disable the button and show/hide warning text
        function toggleButton() {
            var isInputsFilled = checkInputs();
            $('button[type="submit"]').prop('disabled', !isInputsFilled);

            // Show/hide warning text based on password conditions
            if (!isInputsFilled && $('#password2').val() !== '' && $('#password3').val() !== '') {
                // Display the warning message below the "Tulis ulang kata sandi baru" input field
                $('#warning-message-container').html(
                    '<p style="color: red; font-size: 13px; ">Kata sandi baru tidak cocok. Kata sandi harus lebih dari 6 karakter. Masukkan kata sandi baru lagi di sini.</p>'
                );
            } else {
                $('#warning-message-container').empty(); // Clear the warning message
            }

            // Show/hide eye icon based on input values
            $('.toggle-password').each(function() {
                const targetId = $(this).data('target');
                const passwordInput = $('#' + targetId);
                $(this).toggle(passwordInput.val() !== '');
            });
        }

        // Attach the input event listener to each input field
        $('#password1, #password2, #password3').on('input', function() {
            toggleButton();
        });

        // Initial button state check
        toggleButton();

        // Initial border state check
        updateBorder();
    });

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