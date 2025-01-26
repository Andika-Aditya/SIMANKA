<?php
    class Pegawai extends CI_Controller{
        public function Beranda()
        {
            // Pemeriksaan status login sebelum menampilkan halaman beranda
            if (!$this->session->has_userdata('user_pg')) {
                $this->session->set_flashdata('alert', 'belum_login');
                // Pengguna sudah login, arahkan ke halaman beranda
                redirect(base_url("Login/pegawai"));
            }
            // Ambil data sesi
            $user_name_pg = $this->session->userdata('user_pg');

            $data['data_pg'] = $this->M_pegawai->get_nama_pg($user_name_pg, 'tb_pegawai');
			$data['data_hadir'] = $this->M_pegawai->get_data_hadir($user_name_pg, 'tb_kehadiran');
			$data['data_cutiizin'] = $this->M_pegawai->get_data_cuti_izin($user_name_pg, 'tb_kehadiran');
			$data['data_pangkat'] = $this->M_pegawai->get_data_by_nrp($user_name_pg);

			// Kirim data ke sidebar
			$this->load->view('pegawai/UI_elements/sidebar', $data);

			// Kirim data ke navbar
			$this->load->view('pegawai/UI_elements/navbar', $data);
			
            // Load view dengan data
            $this->load->view('Pegawai/Beranda', $data);
        }

        public function Kelola_Data()
        {
            // Pemeriksaan status login sebelum menampilkan halaman beranda
            if (!$this->session->has_userdata('user_pg')) {
                $this->session->set_flashdata('alert', 'belum_login');
                // Pengguna sudah login, arahkan ke halaman beranda
                redirect(base_url("Login/pegawai"));
            }

            // Ambil data sesi
            $user_name_pg = $this->session->userdata('user_pg');

            $data['data_pg'] = $this->M_pegawai->get_nama_pg($user_name_pg, 'tb_pegawai');
			
			// Kirim data ke sidebar
			$this->load->view('pegawai/UI_elements/sidebar', $data);

			// Kirim data ke navbar
			$this->load->view('pegawai/UI_elements/navbar', $data);

            // Load view dengan data
            $this->load->view('pegawai/KelolaData', $data);
        }

        public function Data_pribadi()
        {
            // Pemeriksaan status login sebelum menampilkan halaman beranda
            if (!$this->session->has_userdata('user_pg')) {
                $this->session->set_flashdata('alert', 'belum_login');
                // Pengguna sudah login, arahkan ke halaman beranda
                redirect(base_url("Login/pegawai"));
            }
            
            // Ambil data sesi
            $user_name_pg = $this->session->userdata('user_pg');

            $data['data_pg'] = $this->M_pegawai->get_nama_pg($user_name_pg, 'tb_pegawai');

			// Kirim data ke sidebar
			$this->load->view('pegawai/UI_elements/sidebar', $data);

			// Kirim data ke navbar
			$this->load->view('pegawai/UI_elements/navbar', $data);
			
            // Load view dengan data
            $this->load->view('pegawai/MyProfile', $data);
        }

        // ---------------------------------------------------------------------------------
        // ================ METHOD TAMBAH DATA PEGAWAI =====================================
        // ---------------------------------------------------------------------------------

        //fungsi untuk menambah data 
		public function daftar(){

			// Mendapatkan data dari form input dengan metode POST
			$NamaDepan       = $this->input->post('Nama_depan');
			$NamaBelakang    = $this->input->post('Nama_belakang');
			$NRP             = $this->input->post('NRP');
			$AlamatEmail     = $this->input->post('Alamat_email');
			$TanggalLahir    = $this->input->post('Tanggal_lahir'); 
			$JenisKelamin    = $this->input->post('Jenis_kelamin');

			// Menggabungkan Nama Depan dan Nama Belakang menjadi Nama Lengkap
			$NamaLengkap     = $this->input->post('Nama_depan') . ' ' . $this->input->post('Nama_belakang');

			// Menggunakan NRP sebagai identifikasi pengguna
			$user_pg         = $NRP;

			// Mendapatkan password dari input form
			$pw_pg           = $this->input->post('pw_pg');

			// Meng-hash password menggunakan Bcrypt
			$pwhashed        = password_hash($pw_pg, PASSWORD_BCRYPT);

			if ($this->M_pegawai->is_pegawai_exists($NRP)) {
				
				// NRP ditemukan
				$this->session->set_flashdata('alert', 'regis_fail');
				// Mengarahkan pengguna ke halaman login pegawai setelah registrasi berhasil
				redirect('Login/pegawai');

			} else {
				// NRP tidak ditemukan
				
				// Data yang akan dikirim ke model harus dalam bentuk array
				$data = array(
					'Nama_lengkap'  => $NamaLengkap,
					'Nama_depan'    => $NamaDepan,
					'Nama_belakang' => $NamaBelakang,
					'NRP'           => $NRP,
					'Alamat_email'  => $AlamatEmail,
					'Tanggal_lahir' => $TanggalLahir,
					'Jenis_kelamin' => $JenisKelamin
				);

				// Menyimpan data pegawai ke tabel 'tb_pegawai'
				$this->M_pegawai->input_data('tb_pegawai', $data);
				
				$id_pegawai = $this->M_pegawai->get_id_pegawai($NRP);
				
				if ($id_pegawai !== null) {
					// Data untuk registrasi pengguna
					$data_regis = array(
						'id_userpegawai'=>$id_pegawai,
						'user_pg' => $user_pg,
						'pw_pg'   => $pwhashed
					);
					
					// Menyimpan data registrasi pengguna ke tabel 'tb_users'
					$this->M_pegawai->input_regis_Data('tb_users', $data_regis);

					$this->session->set_flashdata('alert', 'regis_success');
					// Mengarahkan pengguna ke halaman login pegawai setelah registrasi berhasil
					redirect('Login/pegawai');
					
				} else {
					$this->session->set_flashdata('alert', 'regis_fail');
					// Mengarahkan pengguna ke halaman login pegawai setelah registrasi berhasil
					redirect('Login/pegawai');
				}

			}

        }
    // ---------------------------------------------------------------------------------
    // ================ METHOD UPDATE DATA PEGAWAI =====================================
    // ---------------------------------------------------------------------------------

	// Fungsi ini digunakan untuk memperbarui/mengupdate data pegawai dalam database
	public function Update_data(){

		// Mengambil data dari inputan form
		$id_pegawai 					= $this->input->post('id_pegawai');
		$NamaDepan						= $this->input->post('Nama_depan');
		$NamaBelakang					= $this->input->post('Nama_belakang');
		$PangkatCurrent					= $this->input->post('Pangkat_current');
		$TempatLahir 					= $this->input->post('Tempat_lahir'); 
		$TanggalLahir 					= $this->input->post('Tanggal_lahir'); 
		$JenisKelamin 					= $this->input->post('Jenis_kelamin');
		$StatusPernikahan				= $this->input->post('Status_pernikahan');
		$RiwayatPendidikan				= $this->input->post('Riwayat_pendidikan');
		$PengalamanKerja				= $this->input->post('Pengalaman_kerja');
		$UnitKerja						= $this->input->post('Unit_kerja');
		$TglKenPangkatTerakhir 			= $this->input->post('Tgl_kenaikan_pangkat_terakhir');
		$TanggalBergabung				= $this->input->post('Tanggal_bergabung');
		$Alamat							= $this->input->post('Alamat');
		$NomorHp						= $this->input->post('Nomor_hp');
		$AlamatEmail					= $this->input->post('Alamat_email'); 
		$JabatanCurrent 				= $this->input->post('Jabatan_current');
		$Gaji 							= $this->input->post('Gaji_current');

		$NamaLengkap 					= $this->input->post('Nama_depan') . ' ' . $this->input->post('Nama_belakang');

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
	        	$newFileName = $NamaDepan . '_' . time() . '.jpg';

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

			// Hapus foto lama jika bukan 'no_image.jpg' atau 'default-img.jpg'
			if ($old_Foto_pegawai != 'no_image.jpg' && $old_Foto_pegawai != 'default-img.jpg') { 

				// Menentukan lokasi gambar
				$path = './upload/user/';

				// Menghapus data di folder
				@unlink($path . $old_Foto_pegawai);		
			}

		}

		// Data yang akan diupdate harus berbentuk array
		$data = array(
			'Nama_lengkap'=>$NamaLengkap,
			'Nama_depan'=>$NamaDepan,
			'Nama_belakang'=>$NamaBelakang,
			'Jabatan_current'=>$JabatanCurrent,
			'Pangkat_current'=>$PangkatCurrent,	
			'Tempat_lahir'=>$TempatLahir,
			'Tanggal_lahir'=>$TanggalLahir,
			'Jenis_kelamin'=>$JenisKelamin,
			'Status_pernikahan'=>$StatusPernikahan,
			'Riwayat_pendidikan'=>$RiwayatPendidikan,
			'Pengalaman_kerja'=>$PengalamanKerja,
			'Unit_kerja'=>$UnitKerja,
			'Tgl_kenaikan_pangkat_terakhir'=>$TglKenPangkatTerakhir,
			'Tanggal_bergabung'=>$TanggalBergabung,
			'Alamat'=>$Alamat,
			'Nomor_hp'=>$NomorHp,
			'Alamat_email'=>$AlamatEmail,
			'Gaji_current'=>$Gaji,
			'Foto_pegawai'=>$Foto_pegawai
		);

		// Menggunakan model M_pegawai untuk memperbarui data pegawai dengan ID tertentu
		$this->M_pegawai->update_data($id_pegawai, $data, 'tb_pegawai');
        $this->session->set_flashdata('alert', 'update_data');

		// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
		redirect('Pegawai/Beranda');
	}

	public function Absen()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('user_pg')) {
			$this->session->set_flashdata('alert', 'belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/pegawai"));
		}
		
		// Ambil data sesi
		$user_name_pg = $this->session->userdata('user_pg');

		$data['data_pg'] = $this->M_pegawai->get_nama_pg($user_name_pg, 'tb_pegawai');

		$data['data_absen'] = $this->M_pegawai->get_new_absen($user_name_pg, 'tb_kehadiran');

		// Kirim data ke sidebar
		$this->load->view('pegawai/UI_elements/sidebar', $data);

		// Kirim data ke navbar
		$this->load->view('pegawai/UI_elements/navbar', $data);
		
		// Load view dengan data
		$this->load->view('pegawai/Absen', $data);
	}

	public function InputAbsen()
	{
		// Menyetel zona waktu ke WIB (Waktu Indonesia Barat)
		date_default_timezone_set('Asia/Jakarta');
		
		// Membuat objek DateTime untuk mendapatkan tanggal dan waktu saat ini
		$currentDate = new DateTime();

		// Mendapatkan tanggal, bulan, tahun, jam, dan menit
		$date = $currentDate->format('Y-m-d');
		$hours = $currentDate->format('H');
		$minutes = $currentDate->format('i');

		// Menambahkan leading zero jika perlu
		$hours = str_pad($hours, 2, '0', STR_PAD_LEFT);
		$minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);

		
		// Mengambil data dari inputan form
		$id_absenpegawai 				= $this->input->post('id_absenpegawai');
		$NamaDepan 						= $this->input->post('Nama_depan');
		$NRP							= $this->input->post('NRP');
		$TanggalKehadiran				= $date;
		$TanggalSelesai					= $this->input->post('tanggal_selesai');
		$JamMasuk 						= $hours . ':' . $minutes;
		$StatusHadir 					= $this->input->post('Status_hadir'); 

		if ($TanggalSelesai	== '') {
			$TanggalSelesaiCuti = $TanggalKehadiran;
		}else{
			$TanggalSelesaiCuti = $TanggalSelesai;
		}
		// Mengambil nama file foto yang diunggah
		$bukti_hadir 					= $_FILES['bukti_hadir']['name'];

		//upload foto ke folder
		$config['upload_path'] 		= './upload/bukti';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size'] 		= 5000; // max 5 MB

		$this->load->library('upload',$config);

		if ($this->upload->do_upload('bukti_hadir')) {

			// Jika upload berhasil, mendapatkan nama file yang diunggah
			$uploadedData = $this->upload->data();
			$uploadedFileName = $uploadedData['file_name'];

			// Ganti nama file dengan nama pengguna
			$newFileName = $NRP . $NamaDepan . '_' . time() . 'Absen.jpg';

			// Memindahkan file ke folder yang sesuai dengan nama pengguna
			$newFilePath = './upload/bukti/' . $newFileName;
			rename($uploadedData['full_path'], $newFilePath);

			// Menyimpan nama file baru ke dalam database
			$bukti_hadir = $newFileName;
		} else {
			// Jika gagal upload, nama file tetap 'no_image.jpg'
			echo "Upload Gagal";
			$bukti_hadir = 'no_image.jpg';
		}


		// Data yang akan diupdate harus berbentuk array
		$data = array(
			'id_absenpegawai'=>$id_absenpegawai,
			'NRP'=>$NRP,
			'tanggal_kehadiran'=>$TanggalKehadiran,
			'tanggal_selesai'=>$TanggalSelesaiCuti,
			'jam_masuk'=>$JamMasuk,
			'Status_hadir'=>$StatusHadir,
			'bukti_hadir'=>$bukti_hadir
		);

		// Menggunakan model M_pegawai untuk memperbarui data pegawai dengan ID tertentu
		$this->M_pegawai->input_data_absen('tb_kehadiran', $data);
		$this->session->set_flashdata('alert', 'absen_data');

		// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
		redirect('Pegawai/Beranda');
	}
     
	public function Ubah_sandipage()
	{
		// Pemeriksaan status login sebelum menampilkan halaman beranda
		if (!$this->session->has_userdata('user_pg')) {
			$this->session->set_flashdata('alert', 'belum_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Login/pegawai"));
		}
		// Ambil data sesi
		$user_name_pg = $this->session->userdata('user_pg');

		$data['data_pg'] = $this->M_pegawai->get_nama_pg($user_name_pg, 'tb_pegawai');
		$this->load->view('pegawai/UbahSandi', $data);
	}

	public function Ubah_sandi()
	{
		// Mengambil data dari inputan form
		$id_userpegawai 			= $this->input->post('id_userpegawai');
		$currentpw 					= $this->input->post('currentpw');
		$new_pw						= $this->input->post('new_pw');
		$new_pw_hashed				= password_hash($new_pw, PASSWORD_BCRYPT);

		$pwoldhashedObject = $this->M_pegawai->get_old_pw($id_userpegawai, 'tb_users');
		$pwoldhashed = $pwoldhashedObject->pw_pg;		
		
		$checkcurrentpw = password_verify($currentpw, $pwoldhashed);
		
		if ($checkcurrentpw) {
			// Data yang akan diupdate harus berbentuk array
			$data = array(
				'id_userpegawai'=>$id_userpegawai,
				'pw_pg'=>$new_pw_hashed
			);

			// Menggunakan model M_pegawai untuk memperbarui data pegawai dengan ID tertentu
			$this->M_pegawai->update_user($id_userpegawai, $data, 'tb_users');
			$this->session->set_flashdata('alert', 'update_data_user');

			// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
			redirect('Pegawai/Beranda');
		}else{
			
			$this->session->set_flashdata('alert', 'failed_change_pw');

			// Mengarahkan pengguna kembali ke halaman 'Datapegawai' setelah proses pembaruan data selesai
			redirect('Pegawai/Beranda');
		}

	}
	
    }
?>