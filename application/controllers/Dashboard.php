<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->simple_login->cek_login();
    }

	public function index()
	{
        $data = array(
            'jmlMampu' => $this->Siswa_model->getJumlahMampu(),
            'jmlTidakMampu' => $this->Siswa_model->getJumlahTidakMampu(),
            'totalSiswa'    => $this->Siswa_model->getJumlahSiswa(),
            'jmlBea'    => $this->Siswa_model->getPenerimaBeasiswa(),
            'json'  => json_encode(array(
                'jmlMampu' => $this->Siswa_model->getJumlahMampu(),
                'jmlTidakMampu' => $this->Siswa_model->getJumlahTidakMampu()
            ))
        );
        // print_r($data);
        // die();
        $this->template->set('tittle','Dashboard');
        $this->template->load('index','contents','dashboard/dashboard', $data);
	}
}
