<!-- ajax_laporan.php -->
<?php if (isset($laporan) && !empty($laporan)) : ?>
<?php
    // Function to compare rows based on the NRP column
    function comparepangkat($a, $b) {
        return strcmp($a->Pangkat_current, $b->Pangkat_current);
    }

    // Sort the $laporan array based on the NRP column
    usort($laporan, 'comparepangkat');
    ?>
<style>
@media print {
    @page {
        size: A4;
        /* Set the page size */
        margin: 1cm 1cm 1cm 1cm;
        /* Set margins: top right bottom left */
    }


    body {
        margin: 0;
        /* Reset default body margin */
    }

    table.dataTable {
        width: 100%;
        /* Ensure the DataTable takes the full width */
    }

    /* Add other print-specific styles as needed */
}
</style>

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
// Set zona waktu ke Indonesia
date_default_timezone_set('Asia/Jakarta');

// Assuming you have received the values from the AJAX request
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
$bulanIndo = getIndonesianMonth($bulan);

// Mendapatkan bulan dan tahun
$Tahunreal = date('Y');
$bulanreal = date('m');

$bulanrealIndo = getIndonesianMonth($bulanreal);
// Mendapatkan tanggal hanya hari
$tanggalHariIni = date('d');
?>



<div class="d-print-none float-right">
    <button onclick="window.print()" class="btn btn-sm btn-primary ">Cetak</button>
</div>
<br>
<br>
<hr>


<div class="row">
    <div class="form-group col-md-12">
        <!-- card -->
        <div class="card">
            <div class="card-header">
                <p style="border: none; margin-bottom: -5px;">POLRI DAERAH JAWA BARAT</p>
                <p style="border: none; margin-bottom: -5px;">RESOR KARAWANG</p>
                <p>SEKTOR CIKAMPEK</p>
                <p style="margin-bottom: -5px;">
                    <hr style="width: 20%; margin: 0;">
                </p>
                <center>
                    <h2>DAFTAR DATA ANGGOTA KEPOLISIAN DI POLSEK CIKAMPEK</h2>
                    <hr style="width: 90%; margin: 0; border: 1px solid black;">
                </center>
                <br>
                <p>Bulan : <?php echo $bulanIndo ?> </p>
                <p>Tahun : <?php echo $tahun ?> </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover responsive nowrap" width="100%">
                        <thead>
                            <tr align="center">
                                <th align="center">PANGKAT</th>
                                <th align="center">NRP</th>
                                <th align="center">NAMA LENGKAP</th>
                                <th align="center">JABATAN</th>
                                <th align="center">UNIT KERJA</th>
                                <th align="center">GAJI</th>
                                <th align="center">JENIS KELAMIN</th>
                                <!-- Add more headers as needed -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($laporan as $row) : ?>
                            <tr>
                                <td align="center"><?php echo $row->Pangkat_current ?></td>
                                <td align="center"><?php echo $row->NRP; ?></td>
                                <td><?php echo $row->Nama_lengkap; ?></td>
                                <td><?php echo $row->Jabatan_current ?></td>
                                <td align="center"><?php echo $row->Unit_kerja ?></td>
                                <td align="center">
                                    <?php
                                    // Menggunakan number_format untuk memformat nilai uang
                                    $formatted_gaji = number_format($row->Gaji_current, 0, ',', '.');
                                ?>
                                    Rp. <?php echo $formatted_gaji; ?></td>
                                <td align="center"><?php echo $row->Jenis_kelamin ?></td>
                                <!-- Add more cells as needed -->
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <br>
                    <table width="40%" align="left" style="page-break-inside: avoid; margin-top: 20px;">
                        <tr>
                            <td align="center">Mengetahui :
                            </td>
                        </tr>
                        <tr>
                            <td align="center">KEPALA KEPOLISIAN SEKTOR CIKAMPEK</td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><b>Kompol Aries Riyanto S.sos.MM.CHRA</b></td>
                        </tr>
                        <tr>
                            <td align="center">
                                <hr style="width: 70%; margin: 0; border: 1px solid black;">
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><b>KOMISARIS POLISI NRP. </b></td>
                        </tr>
                    </table>

                    <table width="40%" align="right" style="page-break-inside: avoid; margin-top: 20px;">
                        <tr>
                            <td align="center">Cikampek,
                                <?php echo $tanggalHariIni . ' ' . $bulanrealIndo . ' ' . $Tahunreal?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">SIUM</td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><b>Aiptu Hadi Suryadi</b></td>
                        </tr>
                        <tr>
                            <td align="center">
                                <hr style="width: 35%; margin: 0; border: 1px solid black;">
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><b>Aiptu NRP. </b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<p>Data tidak ditemukan pada kriteria yang ditentukan.</p>
<?php endif; ?>