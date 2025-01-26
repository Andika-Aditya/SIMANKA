<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class MainPage extends CI_Controller{
        
        public function landingPage(){
            $this->session->sess_destroy();
            $this->load->view('landing_P/LandingPage');
        }
    }
?>