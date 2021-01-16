<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Simple_login {
		
		var $CI = NULL;

		public function __construct() {
			$this->CI =& get_instance();
		}

		public function login($username, $password) {
			$query = $this->CI->db->get_where('admin', array('username' => $username, 'password' => md5($password)));

            // print_r($username);
            // die();
			if ($query->num_rows() == 1) {
				$row 	= $this->CI->db->query('SELECT id_admin, nama, username , jabatan FROM admin where username = "' . $username . '"');
				$value 	= $row->row();
				$this->CI->session->set_userdata('username', $username);
				$this->CI->session->set_userdata('id_login', uniqid(rand()));
				$this->CI->session->set_userdata('nama', $value->nama);
				$this->CI->session->set_userdata('jabatan', $value->jabatan);
				$this->CI->session->set_userdata('id_admin', $value->id_admin);
				$this->CI->session->set_userdata('level', 'admin');
				
				
				redirect('dashboard');
			} else {
				$this->CI->session->set_flashdata('sukses', 'Oops... Username/Password salah');
				redirect('login');
			}
			return false;
        }
        
        public function loginSiswa($username, $password) {
            $query = $this->CI->db->get_where('siswa', array('username' => $username, 'password' => md5($password)));

            // print_r($username);
            // die();
			if ($query->num_rows() == 1) {
				$row 	= $this->CI->db->query('SELECT id_siswa, nama, username, foto_siswa  FROM siswa where username = "' . $username . '"');
				$value 	= $row->row();
				$this->CI->session->set_userdata('username', $username);
				$this->CI->session->set_userdata('id_login', uniqid(rand()));
				$this->CI->session->set_userdata('nama', $value->nama);
				$this->CI->session->set_userdata('id_siswa', $value->id_siswa);
				$this->CI->session->set_userdata('level', 'siswa');
				$this->CI->session->set_userdata('img', $value->foto_siswa);
				
				
				redirect('siswa/profile/');
			} else {
				$this->CI->session->set_flashdata('sukses', 'Oops... Username/Password salah');
				redirect('login');
			}
			return false;
        }
		
		public function cek_login() {
			if ($this->CI->session->userdata('username') == '') {
				$this->CI->session->set_flashdata('sukses','Anda belum login');
				redirect('login');
			}
		}

		public function logout() {
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('id_login');
			$this->CI->session->unset_userdata('id_admin');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('jabatan');
			$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
			redirect('login');
		}
	}