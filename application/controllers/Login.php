<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

//fungsi-fungsi untuk user admin
	public function admin(){
		$this->session->sess_destroy(); //untuk menghapus session
		$this->load->view('admin/LoginAdmin');
	}
	
	public function Cek_admin_stts()
	{
		if (!$this->session->has_userdata('username')) {
			// Pengguna belum login, arahkan ke halaman login
			redirect(base_url("Login/admin"));
		}
	}

	public function validasi_admin()
	{
		//validasi login
		if ($this->session->has_userdata('username')) {
			$this->session->set_flashdata('alert', 'admin_sudah_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Admin/Dashboard"));
		}
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');

	    // Retrieve the hashed password from the database for the provided username
	    $select = 'id, password';
	    $where = array('username' => $username);
	    $admin_data = $this->M_login->cek_login($select, "tb_user_admin", $where)->row();

	    if ($admin_data) {
	        // Verify the entered password with the hashed password from the database
	        if (password_verify($password, $admin_data->password)) {
	            // Password cocok, izinkan akses
	            // Buat variable session
	            $data_session = array('username' => $username, 'status' => "login_admin");
	            $this->session->set_userdata($data_session);
				
				$this->session->set_flashdata('alert', 'admin_login_sukses');
	            redirect(base_url("Admin/Dashboard"));
	        } else {
				// Password tidak cocok, tolak akses
				$this->session->set_flashdata('alert', 'admin_login_gagal');
				redirect(base_url("Login/admin"));
	        }
	    } else {
	        // Username tidak ditemukan, tolak akses
			$this->session->set_flashdata('alert', 'admin_login_gagal');
	        redirect(base_url("Login/admin"));
	    }
	}

	//fungsi-fungsi untuk user anggota kepolisian
	public function pegawai(){
		$this->session->sess_destroy();
		$this->load->view('pegawai/LoginPegawai');
	}
	public function cek_login_status()
	{
		if (!$this->session->has_userdata('user_pg')) {
			// Pengguna belum login, arahkan ke halaman login
			redirect(base_url("Login/pegawai"));
		}
	}
	public function validasi_pegawai(){ 
		//validasi login
		if ($this->session->has_userdata('user_pg')) {
			$this->session->set_flashdata('alert', 'sudah_login');
			// Pengguna sudah login, arahkan ke halaman beranda
			redirect(base_url("Pegawai/Beranda"));
		}

		$user_pegawai = $this->input->post('user_pg'); 
		$pw_pegawai = $this->input->post('pw_pg'); 
		$select='id_user, pw_pg';
		$where = array( 'user_pg' => $user_pegawai); 
		$user_data = $this->M_login->cek_login($select,"tb_users",$where)->row(); 

		if($user_data){
			// Verify the entered password with the hashed password from the database
			if (password_verify($pw_pegawai, $user_data->pw_pg)) {
				// Password cocok, izinkan akses
				// Buat variable session
				$data_session = array( 'user_pg' => $user_pegawai, 'status' => "login_user" );
				$this->session->set_userdata($data_session);

				$this->session->set_flashdata('alert', 'login_sukses');
				redirect(base_url("Pegawai/Beranda"));
			} else {
				// Password tidak cocok, tolak akses
				$this->session->set_flashdata('alert', 'login_gagal');
				redirect(base_url("Login/pegawai"));
			}

		}else{ 
			$this->session->set_flashdata('alert', 'login_gagal');
			redirect(base_url("Login/pegawai"));
		}
	}
}

//end of file Login.php