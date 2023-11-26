<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

//fungsi-fungsi untuk user admin============================================
	public function admin(){
		$this->session->sess_destroy(); //untuk menghapus session
		$this->load->view('admin/LoginAdmin');
	}	

	public function validasi_admin()
	{
	    $username = $this->input->post('username');
	    $password = $this->input->post('password');

	    // Retrieve the hashed password from the database for the provided username
	    $select = 'id, password';
	    $where = array('username' => $username);
	    $admin_data = $this->M_login->cek_login($select, "tb_admin", $where)->row();

	    if ($admin_data) {
	        // Verify the entered password with the hashed password from the database
	        if (password_verify($password, $admin_data->password)) {
	            // Password cocok, izinkan akses
	            // Buat variable session
	            $data_session = array('nama' => $username, 'status' => "login_admin");
	            $this->session->set_userdata($data_session);
	            redirect(base_url("Admin/Dashboard"));
	        } else {
	            // Password tidak cocok, tolak akses
	            redirect(base_url("Login/admin"));
	        }
	    } else {
	        // Username tidak ditemukan, tolak akses
	        redirect(base_url("Login/admin"));
	    }
	}

//fungsi-fungsi untuk user mahasiswa ============================================
	/*public function mahasiswa(){
		$this->session->sess_destroy(); //untuk menghapus session
		$this->load->view('mhs/login_mhs');
	}

	public function validasi_mhs(){ //validasi login
		$nim = $this->input->post('nim'); 
		$password = $this->input->post('password'); 
		$select='id';
		$where = array( 'nim' => $nim, 'password' => md5($password) ); 
		$cek = $this->M_login->cek_login($select,"tb_mahasiswa",$where)->num_rows(); 
		if($cek > 0){
			$data_session = array( 'nim' => $nim, 'status' => "login_mhs" );
			$this->session->set_userdata($data_session);
			echo "login sukses"; 
			redirect(base_url("C_mahasiswa/index"));
		}else{ 
			echo "NIM dan password salah !"; 
			redirect(base_url("Login/mahasiswa"));
		}
	}*/
}

//end of file Login.php
//location : application\controllers\