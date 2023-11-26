<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMANKA - POCIK | Dashboard</title>

  <?php // Memuat head.php
  $this->load->view('admin/UI_elements/head');
  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

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
          <h2 class="m-0">Dashboard</h2>
          <span class="m-0" id="currentDateTime"></span>
        </div><!-- /.row -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Info Box_1 -->
          <div class="row">

            <div class="col-lg-3 col-6">
              <!-- small box Informasi Total Pegawai Aktif -->
              <div class="small-box" style="background-color: #3498db; color: white;">
                <div class="inner">
                  <h3><?php echo $totalPegawaiAktif; ?></h3>
                  <p style="margin: 0;">Total</p>
                  <p style="margin: 0;">Pegawai Aktif</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url('Admin/Datapegawai'); ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box Informasi Total Pegawai Sedang Cuti-->
              <div class="small-box" style="background-color: #e74c3c; color: white">
                <div class="inner">
                  <h3><?php echo $totalPegawaiCuti ?></h3>

                  <p style="margin: 0;">Total </p>
                  <p style="margin: 0;">Pegawai Sedang Cuti</p>
                </div>
                <div class="icon">
                  <i class="fas fa-umbrella-beach"></i>
                </div>
                <a href="<?php echo base_url('Admin/DaftarCuti'); ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box Informasi Total Pegawai Yang Sedang Dinilai-->
              <div class="small-box" style="background-color: #27ae60; color: white">
                <div class="inner">
                  <h3><?php echo $totalPegawaiDinilaiKinerja ?></h3>

                  <p style="margin: 0;">Total </p>
                  <p style="margin: 0;">Pegawai Yang Sedang Dinilai</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-line"></i>
                </div>
                <a href="<?php echo base_url(); ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box Informasi Total Pegawai Datang Tepat Waktu-->
              <div class="small-box" style="background-color: #2ecc71; color: white">
                <div class="inner">
                  <h3><?php echo $totalPegawaiTepatWaktu; ?></h3>

                  <p style="margin: 0;">Total </p>
                  <p style="margin: 0;">Pegawai Datang Tepat Waktu</p>
                </div>
                <div class="icon">
                  <i class="fas fa-clock"></i>
                </div>
                <a href="<?php echo base_url('Admin/Kehadiran'); ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          
          <!-- Info Boxes_2 -->
          <div class="row">
              <div class="col-12 col-sm-6 col-md-3" style="margin-left: auto; margin-right: auto ;">
                  <div class="info-box">
                      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                      <!-- info-box-content-Jumlah Pegawai -->
                      <div class="info-box-content">
                          <span class="info-box-text">Jumlah Pegawai</span>
                          <span class="info-box-number"><?php echo $JumlahPegawai ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-12 col-sm-6 col-md-3" style="margin-left: auto; margin-right: auto ;">
                  <div class="info-box mb-3">
                      <span class="info-box-icon elevation-1" style="background-color: navy;"><i class="fas fa-male" style="color: white;"></i></span>

                      <!-- info-box-content-Jumlah Pegawai Laki-laki -->
                      <div class="info-box-content">
                          <span class="info-box-text">Jumlah Pegawai L</span>
                          <span class="info-box-number"><?php echo $TotalPegawai_LK ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3" style="margin-left: auto; margin-right: auto ;">
                  <div class="info-box mb-3">
                      <span class="info-box-icon elevation-1" style="background-color: pink;"><i class="fas fa-female" style="color: white;"></i></span>
                      
                      <!-- info-box-content-Jumlah Pegawai Perempuan -->
                      <div class="info-box-content">
                          <span class="info-box-text">Jumlah Pegawai P</span>
                          <span class="info-box-number"><?php echo $TotalPegawai_PR ?></span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->

          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">

              <!-- LINE CHART - Statistik Riwayat Pegawai Hadir -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Statistik Riwayat Pegawai Hadir Tahun 2023</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 100%; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-6">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">
                    Persentase Pegawai Berdasarkan Jenis Kelamin <span>(<script type="text/javascript">document.write( new Date().getFullYear() );</script>)</span>
                  </h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="chart">
                    <!-- Bar chart - Distribusi Pegawai Berdasarkan Jenis Kelamin -->
                      <canvas id="pieChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- Right col -->
            <div class="col-md-6">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">
                     Persentase Pegawai Berdasarkan Status Pernikahan <span>(<script type="text/javascript">document.write( new Date().getFullYear() );</script>)</span>
                  </h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="chart">
                    <!-- Bar chart - Distribusi Pegawai Berdasarkan Jenis Kelamin -->
                      <canvas id="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.Main row -->

          <!-- BAR CHART - Distribusi Jumlah Pegawai Berdasarkan Unit Kerja -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">
                Distribusi Jumlah Pegawai Berdasarkan Unit Kerja Tahun <span><script type="text/javascript">document.write( new Date().getFullYear() );</script></span>

              </h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
              <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Tabel Daftar Cuti Yang Belum Disetujui -->
          <div class="row">
            <div class="col-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Daftar Cuti Yang Belum Disetujui Hari Ini</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr align="center">
                        <th >NRP</th>
                        <th >NAMA LENGKAP</th>
                        <th >TANGGAL MULAI CUTI</th>
                        <th >STATUS</th>
                        <th>ALASAN CUTI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($ajuancuti as $ajCuti) : ?>
                          <tr>
                            <td align="center"><?php echo $ajCuti->NRP ?></td>
                            <td><?php echo $ajCuti->Nama_lengkap ?></td>
                            <td align="center"><?php echo $ajCuti->tanggal_mulai_cuti ?></td>
                            <td align="center"><?php echo $ajCuti->status_persetujuan_cuti ?>
                              <a class="btn btn-success btn-sm" href="<?php echo base_url('#'.$ajCuti->id_cuti)?>">Setujui
                              </a>  
                              <a class="btn btn-danger btn-sm" href="<?php echo base_url('#'.$ajCuti->id_cuti)?>">Tolak
                              </a>  
                            </td> 
                            <td><?php echo $ajCuti->alasan_cuti ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- /.Tabel Daftar Cuti Yang Belum Disetujui -->

          <!-- Tabel Daftar Izin Yang Belum Disetujui -->
          <div class="row">
            <div class="col-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Daftar Izin Yang Belum Disetujui Hari Ini</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr align="center">
                        <th >NRP</th>
                        <th >NAMA LENGKAP</th>
                        <th >TANGGAL MULAI IZIN</th>
                        <th >STATUS</th>
                        <th >ALASAN IZIN</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($ajuanizin as $ajIzin) : ?>
                          <tr>
                            <td align="center"><?php echo $ajIzin->NRP ?></td>
                            <td><?php echo $ajIzin->Nama_lengkap ?></td>
                            <td align="center"><?php echo $ajIzin->tanggal_mulai_izin ?></td>
                            <td align="center"><?php echo $ajIzin->status_izin ?>
                              <a class="btn btn-success btn-sm" href="<?php echo base_url('#'.$ajIzin->id_izin)?>">Setujui
                              </a>  
                              <a class="btn btn-danger btn-sm" href="<?php echo base_url('#'.$ajIzin->id_izin)?>">Tolak
                              </a>  
                            </td> 
                            <td><?php echo $ajIzin->keterangan ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- /.Tabel Daftar Izin Yang Belum Disetujui -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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

  <script>
     // Fungsi untuk memperbarui tanggal dan waktu saat ini
    function updateCurrentDateTime() {
      // Membuat objek Date yang mewakili waktu saat ini
      const currentDateTime = new Date();
      
      // Mengatur opsi untuk memformat tanggal
      const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      
      // Memformat tanggal saat ini ke dalam format yang ditentukan oleh opsi di atas
      const formattedDate = currentDateTime.toLocaleDateString('id-ID', dateOptions);

      // Mengatur opsi untuk memformat waktu
      const timeOptions = { hour: '2-digit', minute: '2-digit'};
      // Memformat waktu saat ini ke dalam format yang ditentukan oleh opsi di atas
      const formattedTime = currentDateTime.toLocaleTimeString('id-ID', timeOptions);

      // Menggabungkan tanggal dan waktu yang diformat ke dalam satu string
      const formattedDateTime = `${formattedDate} | Pukul ${formattedTime} WIB`;
      
      // Memperbarui teks di elemen HTML dengan ID 'currentDateTime' dengan waktu yang sudah diformat
      document.getElementById('currentDateTime').textContent = formattedDateTime;
    }

    // Memanggil fungsi inisial untuk menampilkan tanggal dan waktu saat ini
    updateCurrentDateTime();

    // Memperbarui tanggal dan waktu setiap detik sekali
    setInterval(updateCurrentDateTime, 1000);
  </script>
  <script>
    // Memulai fungsi ketika dokumen telah dimuat
    $(function () {

      /*----------------------------------------------------------------------------------
       *------------- Pie Chart - Menampilkan persentase pegawai LK dan PR ---------------
       *----------------------------------------------------------------------------------
      */

      // Mengambil nilai total pegawai Laki-laki (LK) dari PHP
      var totPegawai_LK = <?= $totalPegawai_LK; ?>;
      // Mengambil nilai total pegawai Perempuan (PR) dari PHP
      var totPegawai_PR = <?= $totalPegawai_PR; ?>;

      // Menghitung total populasi
      var totalPopulation = totPegawai_LK + totPegawai_PR;
      // Menghitung persentase pegawai Laki-laki
      var percentage_LK = ((totPegawai_LK / totalPopulation) * 100).toFixed(2);
      // Menghitung persentase pegawai Perempuan
      var percentage_PR = ((totPegawai_PR / totalPopulation) * 100).toFixed(2);

      // Membuat grafik jenis pie (pie chart) untuk menampilkan persentase pegawai LK dan PR
      new Chart('pieChart', {
        type: 'pie',
        data: {
          labels: [
            'Laki-laki (' +  '%)',
            'Perempuan (' +  '%)',
          ],
          datasets: [
            {
              data: [percentage_LK, percentage_PR],
              backgroundColor: ['#4BC0C0', '#FF6384'],
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
        },
      });


      /*----------------------------------------------------------------------------------
       *--- Donut Chart - Menampilkan persentase pegawai Menikah dan Belum Menikah -------
       *----------------------------------------------------------------------------------
      */

      // Mengambil nilai total pegawai Menikah (M) dari PHP
      var totPegawai_M = <?= $totalPegawai_M; ?>;
      // Mengambil nilai total pegawai Belum Menikah (BM) dari PHP
      var totPegawai_BM = <?= $totalPegawai_BM; ?>;
      // Menghitung total populasi
      var totalPopulation = totPegawai_M + totPegawai_BM;
      // Menghitung persentase pegawai Menikah
      var percentage_M = ((totPegawai_M / totalPopulation) * 100).toFixed(2);
      // Menghitung persentase pegawai Belum Menikah
      var percentage_BM = ((totPegawai_BM / totalPopulation) * 100).toFixed(2);

      // Membuat grafik jenis donat (doughnut chart) untuk menampilkan persentase pegawai Menikah dan Belum Menikah
      new Chart('donutChart', {
        type: 'doughnut',
        data: {
          labels: [
            'Menikah (' + '%)',
            'Belum Menikah (' + '%)',
          ],
          datasets: [
            {
              data: [percentage_M, percentage_BM],
              backgroundColor: ['#FF0000', '#0000FF'],
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
        },
      });

      /*----------------------------------------------------------------------------------
       *-- Bar Chart - Menampilkan Distribusi Jumlah Pegawai Berdasarkan Unit Kerja ------
       *----------------------------------------------------------------------------------
      */

      // Mengambil data jumlah pegawai untuk masing-masing unit kerja (UK) dari PHP dan menyimpannya dalam variabel yValues
      var yValues = <?= json_encode(array_column($jumlah_pegawaiUK, 'Jumlah_pegawaiUK'), JSON_NUMERIC_CHECK); ?>;

      // Mengatur warna batang-batang dalam grafik batang (bar chart)
      var barColors = ["red", "green","blue","orange","brown", "yellow","cyan"];

      // Mengambil elemen kanvas untuk grafik batang
      var barChartCanvas = $('#barChart')[0].getContext('2d');

      // Konfigurasi data dan opsi untuk grafik batang
      var barChartData = {
        labels: ['BINMAS', 'INTEL', 'LANTAS', 'SAMAPTA', 'SERSE', 'SIUM', 'SPKT'],
        datasets: [{
            backgroundColor: barColors,
            borderColor: barColors,
            pointRadius: false,
            pointColor: '#fff',
            pointStrokeColor: barColors,
            pointHighlightFill: '#fff',
            pointHighlightStroke: barColors,
            data: yValues
        }]
      };

      var barChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            },
            ticks: {
              min: 0,
              stepSize: 1, // Tentukan ukuran langkah yang sesuai
            }
          }]
        }
      };

      // Membuat grafik batang
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      });


      /*----------------------------------------------------------------------------------
       *--------- Line Chart - Menampilkan Statistik Riwayat Pegawai Hadir ---------------
       *----------------------------------------------------------------------------------
      */

    // Mengambil data dari controller
    const bulanData = <?= json_encode(array_column($stat_hadirPG->result_array(), 'bulan')); ?>;
    const jumlahPegawaiData = <?= json_encode(array_column($stat_hadirPG->result_array(), 'jumlah_pegawai_hadir')); ?>;

    // Mengonversi angka bulan menjadi nama bulan
    const namaBulan = bulanData.map(angkaBulan => {
      const namaBulanArr = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      return namaBulanArr[angkaBulan - 1]; // -1 karena indeks dimulai dari 0
    });

    new Chart("lineChart", {
      type: "line",
      data: {
        labels: namaBulan,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: jumlahPegawaiData
        }]
      },
      options: {
        legend: { display: false },
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Periode Waktu (Bulan)',
              fontSize: 14 // Sesuaikan ukuran font sesuai kebutuhan
            }
          }],
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Jumlah Pegawai Hadir',
              fontSize: 14 // Sesuaikan ukuran font sesuai kebutuhan
            },
            ticks: {
              min: 0,
              max: Math.max(...jumlahPegawaiData) + 10 // Mengatur nilai maksimal sesuai dengan data
            }
          }]
        }
      }
    });

    });
  </script>
  <script>
    $(function () {
        // Inisialisasi DataTable untuk tabel dengan id "example1"
        $("#example1").DataTable({
            "paging": true,        // Memungkinkan penomoran halaman
            "lengthChange": true,  // Memungkinkan perubahan jumlah data per halaman
            "searching": true,     // Memungkinkan fitur pencarian
            "ordering": true,      // Memungkinkan pengurutan kolom
            "autoWidth": false,    // Menonaktifkan penyesuaian otomatis lebar kolom
            "responsive": true,    // Mengaktifkan responsivitas untuk tampilan yang lebih baik
            "columnDefs": [
                {
                    "targets": -1,   // Mengarahkan ke kolom terakhir (TOMBOL AKSI)
                    "orderable": false, // Menonaktifkan pengurutan untuk kolom ini
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function () {
        // Inisialisasi DataTable untuk tabel dengan id "example2"
        $("#example2").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "autoWidth": false,
            "responsive": true,
            "columnDefs": [
                {
                    "targets": -1, // Mengarahkan ke kolom terakhir (TOMBOL AKSI)
                    "orderable": false, // Menonaktifkan pengurutan untuk kolom ini
                }
            ],
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>
</html>
