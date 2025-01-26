<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Dashboard</title>

    <?php // Memuat head.php
  $this->load->view('admin/UI_elements/head');
  ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style type="text/css">
    .kotak {
        padding: 5px;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .kotak,
        .kotak * {
            visibility: visible;
        }

        .kotak {
            z-index: 2;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
        }
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h2 class="m-0">Laporan</h2>
                </div><!-- /.row -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info Box_1 -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card box-shadow-2">
                                <div class="card-header">
                                    <h1 style="text-align: center">Laporan</h1>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="jenis_laporan">Jenis Laporan</label>
                                                <select class="form-control" name="jenis_laporan" id="jenis-laporan">
                                                    <option value="" disabled selected>Pilih Salah Satu</option>
                                                    <option value="pegawai">Laporan Pegawai</option>
                                                    <option value="absen">Laporan Absen</option>
                                                    <option value="perubahanpangkat">Laporan Perubahan Pangkat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-around">
                                            <div class="form-group col-md-5">
                                                <label for="laporan-tahun">Tahun</label>
                                                <input type="text" name="tahun" id="laporan-tahun" class="form-control">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="laporan-bulan">Bulan</label>
                                                <select name="bulan" id="laporan-bulan" class="form-control">
                                                    <option value="" disabled selected>Pilih Bulan</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="laporan-btn-lihat" style="color: white">asdasd</label>
                                                <button class="btn btn-primary btn-block" id="laporan-btn-lihat"
                                                    disabled>Lihat</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="laporan" class="kotak">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php 
  $this->load->view('admin/UI_elements/footer');
  ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.knob/1.2.13/jquery.knob.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.knob/1.2.13/jquery.knob.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


        <script>
        $(document).ready(function() {
            // Initial check for button state
            checkButtonState();
            // Add an event listener for changes in input fields
            $('#jenis-laporan, #laporan-tahun, #laporan-bulan').change(function() {
                // Check if all required fields have values
                var jenisLaporan = $('#jenis-laporan').val();
                var tahun = $('#laporan-tahun').val();
                var bulan = $('#laporan-bulan').val();

                // Enable or disable the button based on the condition
                $('#laporan-btn-lihat').prop('disabled', !(jenisLaporan && tahun && bulan));
            });


            // Handle the button click event to generate the report
            $('#laporan-btn-lihat').click(function() {
                var tahun = $('#laporan-tahun').val();
                var bulan = $('#laporan-bulan').val();
                var jenisLaporan = $('#jenis-laporan').val();


                // Make an AJAX request to the server to generate the report
                $.ajax({
                    url: '<?php echo base_url("Admin/Laporan"); ?>',
                    method: 'POST',
                    data: {
                        tahun: tahun,
                        bulan: bulan,
                        jenis_laporan: jenisLaporan
                    },
                    success: function(response) {
                        // Update the content of the "laporan" div with the generated report
                        $('#laporan').html(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // Add an event listener for changes in jenis laporan radio buttons
            $('input[name="jenis_laporan"]').change(function() {
                // Reset form if switching from pegawai to absen
                if ($(this).val() === 'absen' || $(this).val() === 'pegawai') {
                    $('#laporan-tahun').val('');
                    $('#laporan-bulan').val('');
                }

                // Check button state after the change
                checkButtonState();
            });

            // Function to check and update the button state
            function checkButtonState() {
                var jenisLaporan = $('input[name="jenis_laporan"]:checked').val();
                var tahun = $('#laporan-tahun').val();
                var bulan = $('#laporan-bulan').val();

                // Enable or disable the button based on the condition
                $('#laporan-btn-lihat').prop('disabled', !(jenisLaporan && tahun && bulan));
            }
        });
        </script>

</body>

</html>