<?php 
class Admin extends CI_Controller{


	/*------------------------------------------------------------------
	 *----------------- Methode Navigasi Halaman -----------------------
	 *------------------------------------------------------------------
	*/

	// Mendefinisikan fungsi publik bernama 'Dashboard'
	public function Dashboard()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	   	/*---------- Menampilkan Data Jumlah Pegawai --------------------------------------*/

		// Memanggil fungsi tampil_data_jumlah_pegawai() 
		// dari model M_pegawai untuk mengambil jumlah pegawai dari database
		$JumlahPegawai = $this->M_pegawai->tampil_data_jumlah_pegawai();

		// Menyimpan jumlah pegawai yang diambil 
		// dari database ke dalam array $data dengan kunci 'JumlahPegawai'
		$data['JumlahPegawai'] = $JumlahPegawai;

		/* =============================================================================== */

		/*---------- Menampilkan Data Jumlah Pegawai Laki-laki ---------------------------*/

		// Memanggil fungsi HitungTotalPegawai_LK() 
		// dari model M_pegawai untuk mengambil jumlah pegawai Laki-laki dari database
		$TotalPegawai_LK = $this->M_pegawai->HitungTotalPegawai_LK();

		// Menyimpan jumlah pegawai Laki-laki yang diambil 
		// dari database ke dalam array $data dengan kunci 'TotalPegawai_LK'
		$data['TotalPegawai_LK'] = $TotalPegawai_LK;

		/* =============================================================================== */

		/*---------- Menampilkan Data Jumlah Pegawai Perempuan ---------------------------*/

		// Memanggil fungsi hitungTotalPegawai_PR() 
		// dari model M_pegawai untuk mengambil jumlah pegawai perempuan dari database
		$TotalPegawai_PR = $this->M_pegawai->hitungTotalPegawai_PR();

		// Menyimpan jumlah pegawai perempaun yang diambil 
		// dari database ke dalam array $data dengan kunci 'TotalPegawai_PR'
		$data['TotalPegawai_PR'] = $TotalPegawai_PR;

		/* =============================================================================== */

	    /*---------- Informasi total pegawai aktif ---------------------------------------*/

	   	// Menghitung total pegawai aktif
	    $totalPegawaiAktif = $this->M_pegawai->hitungTotalPegawaiAktif();

	    // Menambahkan total pegawai aktif ke array data
	    $data['totalPegawaiAktif'] = $totalPegawaiAktif;

	   	/*!---------- /.Informasi total pegawai aktif ------------------------------------*/

		/* =============================================================================== */

	   	/*---------- Informasi total pegawai cuti ----------------------------------------*/

	    // Menghitung total pegawai cuti
	    $totalPegawaiCuti = $this->M_pegawai->hitungTotalPegawaiCuti();

	    // Menambahkan total pegawai cuti ke array data
	    $data['totalPegawaiCuti'] = $totalPegawaiCuti;

	   	/*!---------- /.Informasi total pegawai cuti -------------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total pegawai yang dinilai kinerjanya ------------------------*/

	    // Menghitung total pegawai yang dinilai kinerjanya
	    $totalPegawaiDinilaiKinerja = $this->M_pegawai->hitungTotalPegawaiDinilai();

	    // Menambahkan total pegawai yang dinilai kinerjanya ke array data
	    $data['totalPegawaiDinilaiKinerja'] = $totalPegawaiDinilaiKinerja;

	   	/*!------- /.Informasi total pegawai yang dinilai kinerjanya ---------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total pegawai yang datang tepat waktu ------------------------*/

	    // Menghitung total pegawai yang datang tepat waktu
	    $totalPegawaiTepatWaktu = $this->M_pegawai->hitungTotalPegawaiDatangTepatWaktu();

	    // Menambahkan total pegawai yang datang tepat waktu ke array data
	    $data['totalPegawaiTepatWaktu'] = $totalPegawaiTepatWaktu;

	   	/*!------- /.Informasi total pegawai yang datang tepat waktu ---------------------*/

		/* =============================================================================== */

		/*---------- Informasi total kehadiran pegawai per bulan  ------------------------*/

	    $data['stat_hadirPG'] = $this->M_pegawai->statistik_kehadiran_pegawai();

	   	/*!------- /.Informasi total kehadiran pegawai per bulan ---------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total (%) pegawai laki-laki --------------------------------------*/

	    // Menghitung total pegawai laki-laki
	    $totalPegawai_LK = $this->M_pegawai->hitungTotalPegawai_LK();

	    // Menambahkan total pegawai laki-laki ke array data
	    $data['totalPegawai_LK'] = $totalPegawai_LK;

	   	/*!------- /.Informasi total (%) pegawai laki-laki -----------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total (%) pegawai perempuan --------------------------------------*/

	    // Menghitung total pegawai perempuan
	    $totalPegawai_PR = $this->M_pegawai->hitungTotalPegawai_PR();

	    // Menambahkan total pegawai perempuan ke array data
	    $data['totalPegawai_PR'] = $totalPegawai_PR;

	   	/*!------- /.Informasi total (%) pegawai perempuan -----------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total pegawai menikah ----------------------------------------*/

	    // Menghitung total pegawai menikah
	    $totalPegawai_M = $this->M_pegawai->hitungTotalPegawai_M();

	    // Menambahkan total pegawai menikah ke array data
	    $data['totalPegawai_M'] = $totalPegawai_M;

	   	/*!------- /.Informasi total pegawai menikah -------------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total pegawai belum menikah ----------------------------------*/

	    // Menghitung total pegawai belum menikah
	    $totalPegawai_BM = $this->M_pegawai->hitungTotalPegawai_BM();

	    // Menambahkan total pegawai belum menikah ke array data
	    $data['totalPegawai_BM'] = $totalPegawai_BM;

	   	/*!------- /.Informasi total pegawai belum menikah -------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi total pegawai per unit kerja ---------------------------------*/

	    // Menghitung jumlah pegawai per unit kerja
	    $jumlah_pegawaiUK = $this->M_pegawai->hitungTotalUnitkerja();

	    // Menambahkan jumlah pegawai per unit kerja ke array data
	    $data['jumlah_pegawaiUK'] = $jumlah_pegawaiUK;

	    /*!------- /.Informasi total pegawai per unit kerja -----------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi data ajuan cuti ---------------------------------------------*/

	    // Mendapatkan data ajuan cuti
	    $ajuancuti = $this->M_pegawai->tampil_data_ajuan_cuti();

	    // Menambahkan data ajuan cuti ke array data
	    $data['ajuancuti'] = $ajuancuti;

	   	/*!------- /.Informasi data ajuan cuti ------------------------------------------*/

		/* =============================================================================== */

	   	/*------- Informasi data ajuan izin ---------------------------------------------*/

	    // Mendapatkan data ajuan izin
	    $ajuanizin = $this->M_pegawai->tampil_data_ajuan_izin();

	    // Menambahkan data ajuan izin ke array data
	    $data['ajuanizin'] = $ajuanizin;

	    /*!------- /.Informasi data ajuan izin ------------------------------------------*/

		/* =============================================================================== */


	    // Memuat views 'Dashboard' dan mengirimkan array data ke views tersebut
	    $this->load->view('admin/Dashboard', $data);
	}

	// Mendefinisikan fungsi publik bernama 'Datapegawai'
	public function Datapegawai()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	    // Metode yang akan digunakan di model untuk mengambil data dari database
	    $data['pegawai'] = $this->M_pegawai->tampil_data_pegawai()->result();

	    // Memuat views 'Datapegawai' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/pegawai/DataPegawai', $data);
	}

	// Mendefinisikan fungsi publik bernama 'Kehadiran'
	public function Kehadiran()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	    // Metode yang akan digunakan di model untuk mengambil data absen dari database
	    $data['absen'] = $this->M_pegawai->tampil_data_absen();

	    // Memuat views 'KehadiranAbsen' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/KehadiranPegawai/KehadiranAbsen', $data);
	}

	// Mendefinisikan fungsi publik bernama 'Izin'
	public function Izin()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	    // Metode yang akan digunakan di model untuk mengambil data cuti dari database
	    $data['izin'] = $this->M_pegawai->tampil_data_izin();

	    // Memuat views 'Izin' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/KelolaIzin/Izin', $data);
	}


	// Mendefinisikan fungsi publik bernama 'Cuti'
	public function Cuti()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	    // Metode yang akan digunakan di model untuk mengambil data cuti dari database
	    $data['cuti'] = $this->M_pegawai->tampil_data_cuti();

	    // Memuat views 'Cuti' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/Cuti/Cuti', $data);
	}

	// Mendefinisikan fungsi publik bernama 'ValidasiCuti'
	public function ValidasiCuti()
	{
	    // Memuat model 'M_pegawai'
	    $this->load->model('M_pegawai');

	    // Metode yang akan digunakan di model untuk mengambil data cuti dari database
	    $data['cuti'] = $this->M_pegawai->tampil_data_cuti();

	    // Memuat views 'ValidasiCuti' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/Cuti/ValidasiCuti', $data);
	}


	// Mendefinisikan fungsi publik bernama 'Penggajian'
	public function Penggajian()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_gaji()' dari model untuk mengambil data gaji pegawai.
	    $data['gaji'] = $this->M_pegawai->tampil_data_gaji();

	    // Memuat views 'Penggajian' dengan mengirimkan data pegawai gaji ke views tersebut.
	    $this->load->view('admin/gaji/Penggajian', $data);
	}

	public function EvaluasiKerja()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_evaluasi_kinerja()' dari model untuk mengambil data evaluasi kinerja pegawai.
	    $data['EvKerja'] = $this->M_pegawai->tampil_data_evaluasi_kinerja();

	    // Memuat views 'EvaluasiKerja' dengan mengirimkan data evaluasi kinerja pegawai ke views tersebut.
	    $this->load->view('admin/EvaluasiKerja/EvaluasiKerja', $data);
	}

	public function LihatPerubahan()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_promosi()' dari model untuk mengambil data perubahan jabatan pegawai.
	    $data['promosi'] = $this->M_pegawai->tampil_data_promosi();

	    // Memuat views 'LihatPerubahan' dengan mengirimkan data perubahan jabatan pegawai ke views tersebut.
	    $this->load->view('admin/promosi/LihatPerubahan', $data);
	}

	public function RekamStatus()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_promosi()' dari model untuk mengambil data perubahan jabatan pegawai.
	    $data['promosi'] = $this->M_pegawai->tampil_data_promosi();

	    // Memuat views 'RekamStatus' dengan mengirimkan data perubahan jabatan pegawai ke views tersebut.
	    $this->load->view('admin/promosi/RekamStatus', $data);
	}

	public function RekamPromosi()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_promosi()' dari model untuk mengambil data perubahan jabatan pegawai.
	    $data['promosi'] = $this->M_pegawai->tampil_data_promosi();

	    // Memuat views 'RekamPromosi' dengan mengirimkan data perubahan jabatan pegawai ke views tersebut.
	    $this->load->view('admin/promosi/RekamPromosi', $data);
	}

	public function Laporan()
	{
	    // Memuat model 'M_pegawai' untuk mengakses data pegawai dari database.
	    $this->load->model('M_pegawai');

	    // Menggunakan method 'tampil_data_laporan()' dari model untuk mengambil data laporan pegawai.
	    $data['laporan'] = $this->M_pegawai->tampil_data_laporan();

	    // Memuat views 'Laporan' dengan mengirimkan data laporan pegawai ke views tersebut.
	    $this->load->view('admin/laporan/Laporan', $data);
	}




	/*------------------------------------------------------------------
	 *---------------------- Kelola Data Pegawai -----------------------
	 *------------------------------------------------------------------
	*/


  	// ---------------------------------------------------------------------------------
  	// ================ METHOD TAMBAH DATA PEGAWAI =====================================
  	// ---------------------------------------------------------------------------------

	//fungsi untuk menambah data 
	public function tambah_data_pegawai(){

	    // Mendapatkan data dari form input dengan metode POST
	    $NamaLengkap 			= $this->input->post('Nama_lengkap');
	    $NRP 					= $this->input->post('NRP');
	    $PangkatCurrent 		= $this->input->post('Pangkat_current');
	    $TempatLahir 			= $this->input->post('Tempat_lahir'); 
	    $TanggalLahir			= $this->input->post('Tanggal_lahir'); 
	    $JenisKelamin 			= $this->input->post('Jenis_kelamin');
	    $StatusPernikahan 		= $this->input->post('Status_pernikahan');
	    $RiwayatPendidikan		= $this->input->post('Riwayat_pendidikan');
	    $PengalamanKerja 		= $this->input->post('Pengalaman_kerja');
	    $UnitKerja 				= $this->input->post('Unit_kerja');
	    $GajiCurrent 			= $this->input->post('Gaji_current'); 
	    $StatusPegawai 			= $this->input->post('status_pegawai'); 
	    $TglKenPangkatTerakhir 	= $this->input->post('Tgl_kenaikan_pangkat_terakhir');
	    $TanggalBergabung 		= $this->input->post('Tanggal_bergabung');
	    $Alamat 				= $this->input->post('Alamat');
	    $NomorHp 				= $this->input->post('Nomor_hp');
	    $AlamatEmail 			= $this->input->post('Alamat_email');
	    $InformasiCuti 			= $this->input->post('Informasi_cuti'); 

	    // Mendapatkan nama file foto pegawai
	    $Foto_pegawai = $_FILES['Foto_pegawai']['name'];

	    // Mendapatkan jabatan saat ini dari form input
	    $JabatanCurrent = $this->input->post('Jabatan_current');

	    // Jika jabatan saat ini adalah 'Lainnya', maka ambil nilai dari input 'Jabatan_current_lainnya'
	    if ($JabatanCurrent === 'Lainnya') {
	        // Menggabungkan nilai dari kedua input, yaitu Jabatan_current dan Jabatan_current_lainnya,
	        // jika Jabatan_current adalah 'Lainnya'
	        $JabatanCurrent = $this->input->post('Jabatan_current_lainnya');
	    }

	    // Konfigurasi upload foto
	    $config['upload_path'] = './upload/user';  // Lokasi folder tempat menyimpan foto
	    $config['allowed_types'] = 'jpg|png|jpeg';  // Tipe file yang diperbolehkan
	    $config['max_size'] = 5000;  // Ukuran maksimal file (dalam KB)

	    // Memuat library upload dengan konfigurasi di atas
	    $this->load->library('upload',$config);

	    if ($this->upload->do_upload('Foto_pegawai')) {
	        // Jika upload berhasil, dapatkan nama file yang diunggah
	        $uploadedData = $this->upload->data();
	        $uploadedFileName = $uploadedData['file_name'];

	        // Ganti nama file dengan nama pengguna
	        $newFileName = $NamaLengkap . '_' . $uploadedFileName;

	        // Pindahkan file ke folder yang sesuai dengan nama pengguna
	        $newFilePath = './upload/user/' . $newFileName;
	        rename($uploadedData['full_path'], $newFilePath);

	        // Simpan nama file baru ke dalam database
	        $Foto_pegawai = $newFileName;
	    } else {
	        // Jika gagal upload maka isi variabel $Foto_pegawai = 'no_image.jpg'
	        $Foto_pegawai = 'no_image.jpg';
	    }

	    // Data yang akan dikirim ke model harus dalam bentuk array
	    $data = array(
	        'Nama_lengkap'=>$NamaLengkap,
	        'NRP'=>$NRP,
	        'Jabatan_current'=>$JabatanCurrent,
	        'Pangkat_current'=>$PangkatCurrent,    
	        'Tempat_lahir'=>$TempatLahir,
	        'Tanggal_lahir'=>$TanggalLahir,
	        'Jenis_kelamin'=>$JenisKelamin,
	        'Status_pernikahan'=>$StatusPernikahan,
	        'Riwayat_pendidikan'=>$RiwayatPendidikan,
	        'Pengalaman_kerja'=>$PengalamanKerja,
	        'Unit_kerja'=>$UnitKerja,
	        'Gaji_current'=>$GajiCurrent,
	        'status_pegawai'=>$StatusPegawai,
	        'Tgl_kenaikan_pangkat_terakhir'=>$TglKenPangkatTerakhir,
	        'Tanggal_bergabung'=>$TanggalBergabung,
	        'Alamat'=>$Alamat,
	        'Nomor_hp'=>$NomorHp,
	        'Alamat_email'=>$AlamatEmail,
	        'Informasi_cuti'=>$InformasiCuti,
	        'Foto_pegawai'=>$Foto_pegawai
	    );

		// Menyimpan hasil dari metode 'input_data' pada variabel '$save'
		$save = $this->M_pegawai->input_data('tb_pegawai', $data);

		// Memeriksa apakah operasi 'input_data' berhasil (kembalikan nilai lebih besar dari 0)
		if ($save > 0) {
		    // Jika berhasil, atur pesan 'alert' dalam sesi dan arahkan pengguna kembali ke halaman 'Admin/Datapegawai'
		    $this->session->set_flashdata('alert', 'tambah_pegawai');
		    redirect('Admin/Datapegawai'); // Mengarahkan pengguna ke halaman 'Admin/Datapegawai'
		} else {
		    // Jika operasi 'input_data' gagal (nilai $save <= 0), arahkan pengguna kembali ke halaman 'Admin/Datapegawai'
		    redirect('Admin/Datapegawai'); // Mengarahkan pengguna ke halaman 'Admin/Datapegawai'
		}

	}

	// ---------------------------------------------------------------------------------
  	// ================ METHOD HAPUS DATA PEGAWAI ======================================
  	// ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk menghapus data pegawai berdasarkan ID
	public function hapus_pegawai($id){
		// Mengambil data nama file foto pegawai berdasarkan ID
		$data = $this->M_pegawai->get_foto($id);

		// Menentukan lokasi gambar
		if ($data->Foto_pegawai != 'no_image.jpg'){
		// Jika foto bukan 'no_image.jpg', maka hapus foto dari folder
			$path='./upload/user/';

		// Menghapus data di folder
			@unlink($path.$data->Foto_pegawai);
		}

		// Menyimpan hasil dari metode 'hapus_data' pada variabel '$hapus'
		$hapus = $this->M_pegawai->hapus_data($id, 'tb_pegawai');

		// Memeriksa apakah operasi 'hapus_data' berhasil (kembalikan nilai lebih besar dari 0)
		if ($hapus > 0) {
		    // Jika berhasil, atur pesan 'alert' dalam sesi dan arahkan pengguna kembali ke halaman 'Admin/Datapegawai'
		    $this->session->set_flashdata('alert', 'hapus_pegawai');
		    redirect('Admin/Datapegawai'); // Mengarahkan pengguna ke halaman 'Admin/Datapegawai'
		} else {
		    // Jika operasi 'hapus_data' gagal (nilai $hapus <= 0), arahkan pengguna kembali ke halaman 'Admin/Datapegawai'
		    redirect('Admin/Datapegawai'); // Mengarahkan pengguna ke halaman 'Admin/Datapegawai'
		}
	}

    // ---------------------------------------------------------------------------------
    // ================ METHOD EDIT DATA PEGAWAI =======================================
    // ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk menampilkan halaman pengeditan data pegawai 
	public function edit_pegawai($id){
		// Memanggil method yang akan digunakan di model
		// untuk mendapatkan data pegawai dari database berdasarkan ID
		$data['pg'] = $this->M_pegawai->get_data($id,'tb_pegawai');

		// Menampilkan halaman edit dengan data yang telah diperoleh
		$this->load->view('admin/Edit', $data);
	}


	// ---------------------------------------------------------------------------------
    // ================ METHOD UPDATE DATA PEGAWAI =====================================
    // ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk memperbarui/mengupdate data pegawai dalam database
	public function update_pegawai(){

		// Mengambil data dari inputan form
		$id_pegawai 					= $this->input->post('id_pegawai');
		$NamaLengkap					= $this->input->post('Nama_lengkap');
		$NRP							= $this->input->post('NRP');
		$PangkatCurrent					= $this->input->post('Pangkat_current');
		$TempatLahir 					= $this->input->post('Tempat_lahir'); 
		$TanggalLahir 					= $this->input->post('Tanggal_lahir'); 
		$JenisKelamin 					= $this->input->post('Jenis_kelamin');
		$StatusPernikahan				= $this->input->post('Status_pernikahan');
		$RiwayatPendidikan				= $this->input->post('Riwayat_pendidikan');
		$PengalamanKerja				= $this->input->post('Pengalaman_kerja');
		$UnitKerja						= $this->input->post('Unit_kerja');
		$GajiCurrent 					= $this->input->post('Gaji_current'); 
		$StatusPegawai 					= $this->input->post('status_pegawai'); 
		$TglKenPangkatTerakhir 			= $this->input->post('Tgl_kenaikan_pangkat_terakhir');
		$TanggalBergabung				= $this->input->post('Tanggal_bergabung');
		$Alamat							= $this->input->post('Alamat');
		$NomorHp						= $this->input->post('Nomor_hp');
		$AlamatEmail					= $this->input->post('Alamat_email');
		$InformasiCuti 					= $this->input->post('Informasi_cuti'); 
		$JabatanCurrent 				= $this->input->post('Jabatan_current');

		// Menggabungkan nilai dari inputan Jabatan_current dan Jabatan_current_lainnya
		if ($JabatanCurrent === 'Lainnya') {
			$JabatanCurrent = $this->input->post('Jabatan_current_lainnya');
		}

		// Mengambil nama file foto lama
		$old_Foto_pegawai	= $this->input->post('old_Foto_pegawai');

		// Mengambil nama file foto yang diunggah
		$Foto_pegawai 		= $_FILES['Foto_pegawai']['name'];

		// Jika tidak ada foto baru yang diunggah
		if ($Foto_pegawai == ''){
			$Foto_pegawai = $old_Foto_pegawai;
		}else{

			//upload foto ke folder
			$config['upload_path'] = './upload/user';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 5000; // max 5 MB

			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Foto_pegawai')) {

				// Jika upload berhasil, mendapatkan nama file yang diunggah
				$uploadedData = $this->upload->data();
	        	$uploadedFileName = $uploadedData['file_name'];

	        	// Ganti nama file dengan nama pengguna
	        	$newFileName = $NamaLengkap . '_' . $uploadedFileName;

				// Memindahkan file ke folder yang sesuai dengan nama pengguna
				$newFilePath = './upload/user/' . $newFileName;
				rename($uploadedData['full_path'], $newFilePath);

				// Menyimpan nama file baru ke dalam database
				$Foto_pegawai = $newFileName;
			} else {
				// Jika gagal upload, nama file tetap 'no_image.jpg'
				echo "Upload Gagal";
				$Foto_pegawai = 'no_image.jpg';
			}

			// Hapus foto lama jika bukan 'no_image.jpg'
			if ($old_Foto_pegawai!='no_image.jpg') { 

				// Menentukan lokasi gambar
				$path='./upload/user';

				// Menghapus data di folder
				@unlink($path.$old_Foto_pegawai);		
			}
		}

		// Data yang akan diupdate harus berbentuk array
		$data = array(
			'Nama_lengkap'=>$NamaLengkap,
			'NRP'=>$NRP,
			'Jabatan_current'=>$JabatanCurrent,
			'Pangkat_current'=>$PangkatCurrent,	
			'Tempat_lahir'=>$TempatLahir,
			'Tanggal_lahir'=>$TanggalLahir,
			'Jenis_kelamin'=>$JenisKelamin,
			'Status_pernikahan'=>$StatusPernikahan,
			'Riwayat_pendidikan'=>$RiwayatPendidikan,
			'Pengalaman_kerja'=>$PengalamanKerja,
			'Unit_kerja'=>$UnitKerja,
			'Gaji_current'=>$GajiCurrent,
			'status_pegawai'=>$StatusPegawai,
			'Tgl_kenaikan_pangkat_terakhir'=>$TglKenPangkatTerakhir,
			'Tanggal_bergabung'=>$TanggalBergabung,
			'Alamat'=>$Alamat,
			'Nomor_hp'=>$NomorHp,
			'Alamat_email'=>$AlamatEmail,
			'Informasi_cuti'=>$InformasiCuti,
			'Foto_pegawai'=>$Foto_pegawai
		);

		// Menggunakan model M_pegawai untuk memperbarui data pegawai dengan ID tertentu
		$this->M_pegawai->update_data($id_pegawai, $data, 'tb_pegawai');

		// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
		redirect('Admin/Datapegawai');
	}

	// ---------------------------------------------------------------------------------
  	// ================ METHOD DETAIL DATA PEGAWAI =====================================
  	// ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk menampilkan halaman detail data pegawai
	public function detail_pegawai($id){
		// Membuat sebuah array $where untuk mengidentifikasi pegawai berdasarkan ID
		$where = array('id_pegawai' => $id);

		// Menggunakan model M_pegawai untuk mengambil detail data pegawai berdasarkan ID
		$detail = $this->M_pegawai->detail_data($where,'tb_pegawai'); 

		// Mengirimkan data pegawai ke views
		$data['detail'] = $detail; 

	    // Memuat tampilan 'detail' dan mengirimkan data pegawai ke views tersebut
		$this->load->view('admin/Detail', $data);
	}

	// ---------------------------------------------------------------------------------
  	// ================ METHOD BUKTI ABSEN =============================================
  	// ---------------------------------------------------------------------------------

	public function bukti_absen($id) {

		// Membuat sebuah array $where untuk mengidentifikasi pegawai berdasarkan ID
		$where = array('id_pegawai' => $id);

	    // Menggunakan model M_pegawai untuk mengambil data sesuai dengan query SQL
	    $buktiabsen = $this->M_pegawai->buktiAbsen($where);

	    // Mengirimkan data pegawai ke tampilan
	    $data['buktiabsen'] = $buktiabsen;

	    // Memuat tampilan 'BuktiAbsen' dan mengirimkan data pegawai ke tampilan tersebut
	    $this->load->view('admin/BuktiAbsen', $data);
	}

	// ---------------------------------------------------------------------------------
  	// ================ METHOD VALIDASI KEHADIRAN ======================================
  	// ---------------------------------------------------------------------------------

	public function validasi($id) {
		$dataAbsen = array(
			'validasi' => 'SUDAH'
		);

		$updateAbsen = $this->M_pegawai->update_absen($id,$dataAbsen);

		if ($updateAbsen > 0) {

			$this->session->set_flashdata('alert', 'update_absen');
			redirect('Admin/Kehadiran');
		} else {
			redirect('Admin/Kehadiran');
		}
	}

	// ---------------------------------------------------------------------------------
  	// ======================== METHOD BUKTI IZIN ======================================
  	// ---------------------------------------------------------------------------------

	public function bukti_izin($id) {

		// Membuat sebuah array $where untuk mengidentifikasi pegawai berdasarkan ID
		$where = array('id_izin' => $id);

	    // Menggunakan model M_pegawai untuk mengambil data sesuai dengan query SQL
	    $buktiIzin = $this->M_pegawai->buktiIzin($where);

	    // Mengirimkan data pegawai ke tampilan
	    $data['buktiIzin'] = $buktiIzin;

	    // Memuat tampilan 'BuktiAbsen' dan mengirimkan data pegawai ke tampilan tersebut
	    $this->load->view('admin/BuktiIzin', $data);
	}

	// ---------------------------------------------------------------------------------
  	// ================ METHOD VALIDASI IZIN ======================================
  	// ---------------------------------------------------------------------------------

	public function validasi_izin($id) {
	    // Check if the request is for approval or rejection
	    $action = $this->input->post('action'); // Assuming you have a hidden input field in your view to indicate the action

	    // Define the new status based on the action
	    $newStatus = ($action == 'setujui') ? 'DISETUJUI' : 'TIDAK DISETUJUI';

	    $dataIzin = array(
	        'status_izin' => $newStatus
	    );


		$updateAbsen = $this->M_pegawai->update_izin($id,$dataIzin);

		if ($updateAbsen > 0) {

			$this->session->set_flashdata('alert', 'update_izin');
			redirect('Admin/Izin');
		} else {
			redirect('Admin/Izin');
		}
	}


}
?>