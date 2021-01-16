<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->library('Simple_login');
		$this->CI =& get_instance();
    }

	public function index()
	{
		$this->load->view('login/index');
	}

	public function loginAdmin()
	{
		$username =  $this->input->post('username',TRUE);
		$password =  $this->input->post('password',TRUE);
		$tipelogin =  $this->input->post('tipelogin',TRUE);

		if($tipelogin == 'operator') {
			$this->simple_login->login($username, $password);
		} else if($tipelogin == 'siswa') {
			$this->simple_login->loginSiswa($username, $password);
		}


		
	}
	public function logout() {
		$this->CI->session->sess_destroy();			
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect('login');
	}
}
