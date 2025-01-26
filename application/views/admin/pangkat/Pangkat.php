<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANKA - POCIK | Perubahan Pangkat</title>

    <?php // Memuat head.php
  $this->load->view('admin/UI_elements/head');
  ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <?php
            if ($this->session->flashdata('alert') == 'ubah_pangkat_success'):
            ?>
            <div class="alert alert-success alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Berhasil Ubah Pangkat
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'pegawai_not_found'):
            ?>
            <div class="alert alert-warning alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Pegawai Tidak Ditemukan
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'form_not_submitted'):
                ?>
            <div class="alert alert-danger alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data tidak terkirim
            </div>
            <?php
            elseif ($this->session->flashdata('alert') == 'upload_error'):
                ?>
            <div class="alert alert-danger alert-dismissible animated fadeInDown"
                style="position: absolute; width: 80%; z-index: 2" id="feedback" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Upload Error
            </div>
            <?php
            endif;
            ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="col-sm-12">
                    <h2 class="m-0">Perubahan Pangkat</h2>
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
                                    <h1 style="text-align: center; font-weight: bold;">Perubahan Pangkat</h1>
                                </div>
                                <div class="card-body">
                                    <?php echo form_open_multipart('Admin/simpan_data_pangkat'); ?>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-4">
                                            <label for="pegawai">Pilih Pegawai:</label>
                                            <select name="pegawai" id="pegawaiSelect" class="form-control" required>
                                                <option value="" disabled selected>Pilih Salah Satu</option>
                                                <?php foreach ($pegawai as $row): ?>
                                                <option value="<?php echo $row->id_pegawai; ?>"
                                                    data-nrp="<?php echo $row->NRP; ?>"
                                                    data-pangkat="<?php echo $row->Pangkat_current; ?>"
                                                    data-Bukti_SK="<?php echo $row->Bukti_SK; ?>">
                                                    <?php echo $row->Nama_lengkap; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="NRP">NRP :</label>
                                            <input type="text" name="NRP" id="nrp" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Pangkat_current">Pangkat Saat Ini :</label>
                                            <input type="text" name="Pangkat_current" id="pangkat_curr"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <label for="jenis_perubahan">Jenis Perubahan:</label>
                                            <select name="jenis_perubahan" id="jenis_perubahan" class="form-control"
                                                required>
                                                <option value="" disabled selected>Pilih Salah Satu</option>
                                                <option value="KENAIKAN">Kenaikan Pangkat</option>
                                                <option value="PENURUNAN">Penurunan Pangkat</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div id="tanggal_perubahan">
                                                <label for="tanggal">Tanggal Perubahan:</label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-5">
                                            <div id="Pangkat_ubah">
                                                <label for="Ubah_pangkat">Pangkat Baru:</label>
                                                <select name="Ubah_pangkat" id="Ubahpangkat"
                                                    class="custom-select rounded-3" required>
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
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Bukti SK : <font color="red">(* Max File 5 MB (jpg|png|jpeg))
                                                </font></label>
                                            <div class="custom-file">
                                                <input name="old_Bukti_SK" id="old_Bukti_SK">
                                                <input type="file" name="Bukti_SK" id="Bukti_SK"
                                                    class="custom-file-input" onchange="displayFileName()" required>
                                                <label class="custom-file-label" for="Bukti_SK"
                                                    style="text-align: left;">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="simpan" style="color: white">asdasd</label>
                                            <button class="btn btn-primary btn-block" id="simpan">Ubah</button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4 align="center"><b>Data Perubahan Pangkat</b></h4>
                                    </div>
                                    <div class="alert alert-info alert-dismissible"
                                        style=" color: #3498db; background-color: #dae8f2; border-color: #b8d2e5; border-top-width:0; border-right-width: 2px; border-bottom-width: 0; border-left-width: 2px;">
                                        <h5><i class="icon fa fa-info"></i> <strong>Informasi:</strong></h5>
                                        <h6 align="justify">
                                            <ul>
                                                <li>
                                                    <strong>
                                                        Klik tombol ( <p class="badge badge-primary"><i
                                                                class="fa fa-eye ft-check-circle"></i>
                                                            BUKTI SK </p> ) untuk melihat detail Bukti Surat Keterangan
                                                        Naik/Turun Pangkat.
                                                    </strong>
                                                </li>
                                            </ul>
                                        </h6>
                                    </div>
                                    <hr>
                                    <br>
                                    <?php
                                    function getIndonesianMonth($monthNumber) {
                                        $monthNames = array(
                                            '01' => 'Januari',
                                            '02' => 'Februari',
                                            '03' => 'Maret',
                                            '04' => 'April',
                                            '05' => 'Mei',
                                            '06' => 'Juni',
                                            '07' => 'Juli',
                                            '08' => 'Agustus',
                                            '09' => 'September',
                                            '10' => 'Oktober',
                                            '11' => 'November',
                                            '12' => 'Desember'
                                        );

                                        return $monthNames[$monthNumber];
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table id="example1"
                                            class="table table-bordered table-striped table-hover responsive nowrap"
                                            width="100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>PANGKAT</th>
                                                    <th>NRP</th>
                                                    <th>NAMA LENGKAP</th>
                                                    <th>TANGGAL PERUBAHAN PANGKAT</th>
                                                    <th>JENIS PERUBAHAN</th>
                                                    <th>BUKTI SK</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach($perubahanpangkat as $pangkat) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $pangkat->Pangkat_current ?></td>
                                                    <td align="center"><?php echo $pangkat->NRP ?></td>
                                                    <td><?php echo $pangkat->Nama_lengkap; ?></td>
                                                    <td align="center">
                                                        <?php echo date('d', strtotime($pangkat->Tgl_perubahan_pangkat	)) . ' ' . getIndonesianMonth(date('m', strtotime($pangkat->Tgl_perubahan_pangkat	))) . ' ' . date('Y', strtotime($pangkat->Tgl_perubahan_pangkat	)); ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                      if ($pangkat->Jenis_perubahan == 'KENAIKAN'):
                                                          ?>
                                                        <div class="badge badge-success"><i class="ft-check-circle"></i>
                                                            KENAIKAN </div>
                                                        <?php
                                                        elseif ($pangkat->Jenis_perubahan == 'PENURUNAN') :
                                                            ?>
                                                        <div class="badge badge-warning"><i class="ft-x-circle"></i>
                                                            PENURUNAN
                                                        </div>
                                                        <?php
                                                        endif;
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <button class="badge badge-primary" style="border: none;"
                                                            title="Lihat Selengkapnya" data-toggle="modal"
                                                            data-target="#detailModal<?php echo $pangkat->id_pegawai; ?>">
                                                            <i class="fa fa-eye"></i> BUKTI SK
                                                        </button>
                                                    </td>
                                                    <!-- Add more cells as needed -->
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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

        <?php foreach($perubahanpangkat as $pangkat) : ?>
        <!-- Modal -->
        <div class="modal fade" id="detailModal<?php echo $pangkat->id_pegawai; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti SK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Display absen details for the current pegawai -->
                        <p>Nama&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:
                            <?php echo $pangkat->Pangkat_current ?>
                            <?php echo $pangkat->Nama_depan ?>
                            <?php echo $pangkat->Nama_belakang ?></p>

                        <p>NRP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:
                            <?php echo $pangkat->NRP ?>
                        </p>

                        <p>Jenis Perubahan&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>
                                <?php echo $pangkat->Jenis_perubahan ?> </b>
                        </p>

                        <p>Pangkat Saat Ini &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:
                            <?php echo $pangkat->Pangkat_current ?></p>

                        <p>Tanggal Perubahan Pangkat&nbsp;&nbsp;&nbsp;:
                            <?php echo date('d', strtotime($pangkat->Tgl_perubahan_pangkat)) . ' ' . getIndonesianMonth(date('m', strtotime($pangkat->Tgl_perubahan_pangkat))) . ' ' . date('Y', strtotime($pangkat->Tgl_perubahan_pangkat)); ?>
                        </p>

                        <p>Bukti SK &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&nbsp;:
                        </p>
                        <br>
                        <img src="<?php echo empty($pangkat->Bukti_SK) ? base_url() . 'upload/admin/bukti_sk/default-img.jpg' : base_url() . 'upload/admin/bukti_sk/' . $pangkat->Bukti_SK; ?>"
                            class="img-fluid" alt="User Image"><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php 
  $this->load->view('admin/UI_elements/footer');
  ?>

        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
        </script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ;?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
        $(function() {
            // Inisialisasi DataTable dengan pengaturan tertentu
            $("#example1").DataTable({
                "paging": true, // Aktifkan paging (tampilkan halaman)
                "lengthChange": true, // Aktifkan pilihan jumlah entri per halaman
                "searching": true, // Aktifkan fitur pencarian
                "ordering": true, // Aktifkan penyortiran
                "autoWidth": false, // Matikan penyesuaian lebar otomatis
                "responsive": false, // Aktifkan desain responsif
                "scrollX": true,
                "columnDefs": [{
                    "targets": -
                        1, // Menghilangkan penyortiran kolom pada kolom terakhir (TOMBOL AKSI)
                    "orderable": false, // Menonaktifkan penyortiran untuk kolom ini
                }],
                "language": {
                    "zeroRecords": "Data tidak ditemukan",
                    "infoEmpty": "Data tidak tersedia"
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        </script>

        <script>
        // Menggunakan jQuery untuk mengambil elemen dengan ID 'feedback' dan melakukan animasi
        // Menggunakan metode 'delay' untuk menunda tindakan selama 3000 milidetik (3 detik)
        // Setelah penundaan, menggunakan metode 'fadeOut' untuk menghilangkan elemen 'feedback' secara perlahan('slow')
        $('#feedback').delay(3000).fadeOut('slow');

        function displayFileName() {
            // Mendapatkan elemen input file
            var input = document.getElementById('Bukti_SK');

            // Mendapatkan label yang akan menampilkan nama file
            var label = document.querySelector('.custom-file-label');

            // Menetapkan nilai label dengan nama file yang diunggah
            label.textContent = input.files[0].name;
        }
        </script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectPegawai = document.getElementById('pegawaiSelect');
            var nrpInput = document.getElementById('nrp');
            var pangkatCurrInput = document.getElementById('pangkat_curr');
            var bukti_SKCurrInput = document.getElementById('old_Bukti_SK');

            selectPegawai.addEventListener('change', function() {
                var selectedOption = selectPegawai.options[selectPegawai.selectedIndex];

                // Mengisi nilai NRP dan pangkat saat memilih pegawai
                nrpInput.value = selectedOption.getAttribute('data-nrp');
                pangkatCurrInput.value = selectedOption.getAttribute('data-pangkat');
                bukti_SKCurrInput.value = selectedOption.getAttribute('data-Bukti_SK');
            });
        });
        </script>

</body>

</html>