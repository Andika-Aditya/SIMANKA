<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIKAMPEK | Daftar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!--====== Favicon Icon ======-->
  <link
    rel="shortcut icon"
    href="<?php echo base_url(); ?>/assets/dist/img/landing_icon.svg"
    type="image/svg"
  />
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>SIKAMPEK</b><br>(Anggota Kepolisian)</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
    <?php echo form_open_multipart('Pegawai/Daftar'); ?>
      <div class="card-header text-center">
        <h1 align="center"><b>Daftar</b></h1>
      </div>
      <div class="form-group">
          <label>Nama Lengkap <font color="red">(*)</font></label>
          <input type="text" name="Nama_lengkap" id="namalengkap" class="form-control"  placeholder="Nama Lengkap" autocomplete="off" required>
      </div>
      <div class="form-group">
          <label>NRP <font color="red">(*)</font></label>
          <input type="text" name="NRP" id="nrp" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off" placeholder="Masukkan 8 Digit Angka NRP" required>
      </div>
      <div class="form-group">
        <label>Kata Sandi <font color="red">(*)</font></label>
        <div class="input-group">
          <input type="password" name="pw_pg" id="password" class="form-control" placeholder="Kata Sandi Baru" required>
          <div class="input-group-append">
            <span class="input-group-text" id="togglePassword">
              <i class="fa fa-eye" aria-hidden="true"></i>
            </span>
          </div>
        </div>
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
      <div class="social-auth-links text-center mb-3">
        <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="submitForm()"> Daftar </button>
      </div>
    </div>
    <?php echo form_close(); ?>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
<script>
    // Menunggu hingga halaman sepenuhnya dimuat
    document.addEventListener('DOMContentLoaded', function () {
      var nrpInput = document.querySelector('input[name="NRP"]');

      // Mendengarkan perubahan input pada elemen dengan nama "NRP"
      nrpInput.addEventListener('input', function () {
          // Validasi panjang NRP
          if (this.value.length > 8) {
              // Jika lebih dari 8 digit, hapus karakter berlebih
              this.value = this.value.slice(0, 8);
          }
      });
  });

  // Fungsi untuk mengirim formulir
  function submitForm() {
      // Mengambil semua elemen input yang diberi atribut "required"
      var requiredInputs = document.querySelectorAll('input[required], select[required]');
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
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Ubah ikon mata terbuka atau tertutup
    this.innerHTML = type === 'password' ? '<i class="fa fa-eye" aria-hidden="true"></i>' : '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
  });
</script>
</body>
</html>
