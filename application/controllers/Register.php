<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Register extends CI_Controller{
        public function daftar_user()
        {
            # code...
            $this->session->sess_destroy(); //untuk menghapus session
            $this->load->view('pegawai/Daftar');
        }
    }
    
?>