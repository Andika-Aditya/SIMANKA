<?php 
class Admin extends CI_Controller{


	/*------------------------------------------------------------------
	 *----------------- Methode Navigasi Halaman -----------------------
	 *------------------------------------------------------------------
	*/

	// Mendefinisikan fungsi publik bernama 'Dashboard'
	public function Dashboard()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/admin"));
		}
		
	    // Memuat model 'M_admin'
	    $this->load->model('M_admin');
  
		$data['JumlahPegawai'] = $this->M_admin->tampil_data_jumlah_pegawai();
	    $data['totalPegawaiCuti'] = $this->M_admin->hitungTotalPegawaiCuti();
	    $data['totalPegawaiIzin'] = $this->M_admin->HitungTotalPegawaiIzin();
	    $data['totalPegawaiTepatWaktu'] = $this->M_admin->hitungTotalPegawaiDatangTepatWaktu();

	    // Memuat views 'Dashboard' dan mengirimkan array data ke views tersebut
	    $this->load->view('admin/Dashboard', $data);
	}

	// Mendefinisikan fungsi publik bernama 'Datapegawai'
	public function Datapegawai()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/admin"));
		}
	    // Memuat model 'M_admin'
	    $this->load->model('M_admin');

	    // Metode yang akan digunakan di model untuk mengambil data dari database
	    $data['pegawai'] = $this->M_admin->tampil_data_pegawai()->result();

	    // Memuat views 'Datapegawai' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/pegawai/DataPegawai', $data);
	}

	// Mendefinisikan fungsi publik bernama 'Kehadiran'
	public function Kehadiran()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/admin"));
		}
	    // Memuat model 'M_admin'
	    $this->load->model('M_admin');

	    // Metode yang akan digunakan di model untuk mengambil data absen dari database
	    $data['absen'] = $this->M_admin->tampil_data_absen();
		$data['pegawai'] = $this->M_admin->tampil_data_pegawai()->result();

	    // Memuat views 'KehadiranAbsen' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/KehadiranPegawai/KehadiranAbsen', $data);
	}

	public function Laporan()
	{
		// Memuat model 'M_admin'
		$this->load->model('M_admin');

		// Check if it's an AJAX request
		if ($this->input->is_ajax_request()) {
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$tanggal = $tahun.'-'.$bulan;
			$jenisLaporan = $this->input->post('jenis_laporan');

			if ($jenisLaporan == 'pegawai') {
				// Handle logic for generating pegawai report
				$data['laporan'] = $this->M_admin->tampil_data_pegawai()->result();
				// Load a view with the generated report data
				$this->load->view('admin/laporan/ajax_laporan', $data);
			} elseif ($jenisLaporan == 'absen') {
				// Handle logic for generating absen report
				$data['laporan'] = $this->M_admin->lihat_laporan_absen($tanggal);
				// Load a view with the generated report data
				$this->load->view('admin/laporan/ajax_laporan_absen', $data);
			} elseif ($jenisLaporan == 'perubahanpangkat'){
				// Handle logic for generating absen report
				$data['laporan'] = $this->M_admin->get_pegawai_by_jenis_perubahan_realtime($tanggal);
				// Load a view with the generated report data
				$this->load->view('admin/laporan/ajax_laporan_ubah_pangkat', $data);
			}

		} else {
			// Non-AJAX request, load the regular view
			$this->load->view('admin/laporan/Laporan');
		}
	}

	public function lihat()
	{
	    // Memuat model 'M_admin'
	    $this->load->model('M_admin');

		
		$jenislaporan 				= $this->input->post('laporan-type');
		$tahun 						= $this->input->post('tahun');
		$bulan 						= $this->input->post('bulan');
		
		if ($jenislaporan == 'absen') {
			# code...
			$tanggal = $tahun.'-'.$bulan;
			//$laporanpegawai = $this->M_admin->lihat_laporan_pegawai();
			$laporanabsen = $this->M_admin->lihat_laporan_absen($tanggal);
			//echo json_encode($laporanpegawai);
			echo json_encode($laporanabsen);
		}else{
			redirect('Admin/Laporan');
		}

	}



	/*------------------------------------------------------------------
	 *---------------------- Kelola Data Pegawai -----------------------
	 *------------------------------------------------------------------
	*/


	// ---------------------------------------------------------------------------------
  	// ================ METHOD HAPUS DATA PEGAWAI ======================================
  	// ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk menghapus data pegawai berdasarkan ID
	public function hapus_pegawai($id){

		// Memuat model 'M_admin'
		$this->load->model('M_admin');
		// Mengambil data nama file foto pegawai berdasarkan ID
		$data = $this->M_admin->get_foto($id);

		// Menentukan lokasi gambar
		if ($data->Foto_pegawai != 'no_image.jpg'){
		// Jika foto bukan 'no_image.jpg', maka hapus foto dari folder
			$path='./upload/user/';

		// Menghapus data di folder
			@unlink($path.$data->Foto_pegawai);
		}

		// Menyimpan hasil dari metode 'hapus_data' pada variabel '$hapus'
		$hapus = $this->M_admin->hapus_data($id, 'tb_pegawai');

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
  	// ================ METHOD VALIDASI KEHADIRAN ======================================
  	// ---------------------------------------------------------------------------------

	public function validasi($id) {
		// Memuat model 'M_admin'
		$this->load->model('M_admin');
		$dataAbsen = array(
			'validasi' => 'SUDAH'
		);

		$updateAbsen = $this->M_admin->update_absen($id,$dataAbsen);

		if ($updateAbsen > 0) {

			$this->session->set_flashdata('alert', 'update_absen');
			redirect('Admin/Kehadiran');
		} else {
			redirect('Admin/Kehadiran');
		}
	}

	public function Hal_ubahsandi()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/admin"));
		}

		// Memuat model 'M_admin'
		$this->load->model('M_admin');
		
		// Ambil data sesi
		$username_admin = $this->session->userdata('username');

		$data['data_adm'] = $this->M_admin->get_nama_adm($username_admin, 'tb_user_admin');

		$this->load->view('admin/AdminUbahSandi', $data);
	}

	public function Ubah_sandi()
	{
		// Memuat model 'M_admin'
		$this->load->model('M_admin');
		
		// Mengambil data dari inputan form
		$id 						= $this->input->post('id');
		$currentpw 					= $this->input->post('currentpw');
		$new_pw						= $this->input->post('new_pw');
		$new_pw_hashed				= password_hash($new_pw, PASSWORD_BCRYPT);

		$pwoldhashedObject = $this->M_admin->get_old_pw($id, 'tb_user_admin');
		$pwoldhashed = $pwoldhashedObject->password;		
		
		$checkcurrentpw = password_verify($currentpw, $pwoldhashed);
		
		if ($checkcurrentpw) {
			// Data yang akan diupdate harus berbentuk array
			$data = array(
				'id'=>$id,
				'password'=>$new_pw_hashed
			);

			// Menggunakan model M_pegawai untuk memperbarui data pegawai dengan ID tertentu
			$this->M_admin->update_user($id, $data, 'tb_user_admin');
			$this->session->set_flashdata('alert', 'update_data_user');

			// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
			redirect('Admin/Dashboard');
		}else{
			
			$this->session->set_flashdata('alert', 'failed_change_pw');

			// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
			redirect('Admin/Dashboard');
		}

	}
	public function Perubahan_pangkat()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/admin"));
		}
	    // Memuat model 'M_admin'
	    $this->load->model('M_admin');
		
		// Metode yang akan digunakan di model untuk mengambil data dari database
	    $data['pegawai'] = $this->M_admin->tampil_data_pegawai()->result();
		$data['perubahanpangkat'] = $this->M_admin->get_pegawai_by_jenis_perubahan();

	    // Memuat views 'Datapegawai' dan mengirimkan variabel data ke views tersebut
	    $this->load->view('admin/pangkat/Pangkat', $data);
	}

	// Controller
	public function simpan_data_pangkat()
	{
		// Memuat model 'M_admin'
		$this->load->model('M_admin');
		
		// Periksa apakah form telah dikirim
		if ($this->input->post()) {
			$pegawai_id = $this->input->post('pegawai');
			$jenis_perubahan = $this->input->post('jenis_perubahan');
			$UbahPangkat = $this->input->post('Ubah_pangkat');
			$tanggal_perubahan = $this->input->post('tanggal');
			
			// Periksa apakah data pegawai dengan ID yang dipilih ada di database
			$pegawai = $this->M_admin->get_pegawai_by_id($pegawai_id);
			if (!$pegawai) {
				// Handle kasus ketika pegawai tidak ditemukan
				$this->session->set_flashdata('alert', 'pegawai_not_found');
				redirect('Admin/Perubahan_pangkat');
			}
						
			$old_Bukti_SK	= $this->input->post('old_Bukti_SK');
			$Bukti_SK		= $_FILES['Bukti_SK']['name'];
	
			if ($Bukti_SK == ''){ //jika $foto kosong
				$Bukti_SK=$old_Bukti_SK;
			}else{
				
				//upload foto ke folder
				$config['upload_path'] = './upload/admin/bukti_sk';
				$config['allowed_types'] = 'jpg|png|gif';
				$config['max_size'] = 5000; // max 5 MB
				
				$this->load->library('upload',$config);
				
				if($this->upload->do_upload('Bukti_SK')){ 
					// Jika upload berhasil, mendapatkan nama file yang diunggah
					$uploadedData = $this->upload->data();
					$uploadedFileName = $uploadedData['file_name'];

					// Ganti nama file dengan nama pengguna
					$newFileName = $pegawai_id . '_' . time() . '_Pangkat_SK.jpg';

					// Memindahkan file ke folder yang sesuai dengan nama pengguna
					$newFilePath = './upload/admin/bukti_sk/' . $newFileName;
					rename($uploadedData['full_path'], $newFilePath);

					// Menyimpan nama file baru ke dalam database
					$Bukti_SK = $newFileName;

				}else{ 
					$Bukti_SK='no_image.jpg';
					
					$this->session->set_flashdata('alert', 'upload_error');
					redirect('Admin/Perubahan_pangkat');	
					}
					
				//hapus foto
				if ($old_Bukti_SK != 'no_image.jpg') { //jika foto bukan 'no_image.jpg' maka hapus
					//lokasi gambar
					$path='./upload/admin/bukti_sk/';
					//hapus data di folder
					@unlink($path.$old_Bukti_SK);		
				}
			}
			
			// Tambahkan tanggal_perubahan ke $data hanya jika tidak kosong
			if ($jenis_perubahan !== 'PENURUNAN') {
				$data = array(
					'Jenis_perubahan' => $jenis_perubahan,
					'Pangkat_current'=>$UbahPangkat,
					'Tgl_kenaikan_pangkat_terakhir' => $tanggal_perubahan,
					'Tgl_perubahan_pangkat'=>$tanggal_perubahan,
					'Bukti_SK'=>$Bukti_SK
				);
		
				// Simpan data perubahan pangkat ke database
				$this->M_admin->simpan_perubahan_pangkat($data, $pegawai_id);
				$this->session->set_flashdata('alert', 'ubah_pangkat_success');
		
				// Redirect atau tampilkan pesan berhasil
				redirect('Admin/Perubahan_pangkat');
			}else{
				$data = array(
					'Pangkat_current'=>$UbahPangkat,
					'Jenis_perubahan' => $jenis_perubahan,
					'Tgl_perubahan_pangkat'=>$tanggal_perubahan,
					'Bukti_SK'=>$Bukti_SK
				);
		
				// Simpan data perubahan pangkat ke database
				$this->M_admin->simpan_perubahan_pangkat($data,$pegawai_id);
				$this->session->set_flashdata('alert', 'ubah_pangkat_success');
		
				// Redirect atau tampilkan pesan berhasil
				redirect('Admin/Perubahan_pangkat');
			}
		} else {
			
			// Handle kasus ketika form tidak dikirim
			$this->session->set_flashdata('alert', 'form_not_submitted');
			redirect('Admin/Perubahan_pangkat');
		}
	}
	
}
?>