<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('siswa/siswa_list', $data);
        $this->template->set('tittle','Siswa');
        $this->template->load('index','contents','siswa/siswa_list', $data);
    }

    public function test() {
        echo "<pre>";
        print_r($this->Siswa_model->getJumlahMampu());
        print_r($this->Siswa_model->getJumlahTidakMampu());
    }

    public function nilaiakhir()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/nilaiakhir.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/nilaiakhir.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/nilaiakhir.html';
            $config['first_url'] = base_url() . 'siswa/nilaiakhir.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_nilai_akhir($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        // echo "<pre>";
        // print_r($siswa);
        // echo "</pre>";

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
    //     //$this->load->view('siswa/siswa_list', $data);
        $this->template->set('tittle','Siswa');
        $this->template->load('index','contents','siswa/siswa_nilai_akhir', $data);
    }

    function updateNilaiAkhir(){
        $this->Siswa_model->update_nilai_akhir();
    }

    

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {

            if($row->penghasilan_orangtua = 1){
                $penghasilan_orangtua = '< Rp 2.000.000';
            }elseif($row->penghasilan_orangtua = 0.75){
                $penghasilan_orangtua = 'Rp 2.000.000 - Rp 2.999.999';
            }elseif($row->penghasilan_orangtua = 0.50){
                $penghasilan_orangtua = 'Rp 3.000.000 - Rp 4.000.000';
            }elseif($row->penghasilan_orangtua = 0.25){
                $penghasilan_orangtua = '> Rp 4.000.000';
            }

            if($row->jumlah_tanggungan = 1){
                $jumlah_tanggungan = '> 5';
            }elseif($row->jumlah_tanggungan = 0.75){
                $jumlah_tanggungan = '4 - 5';
            }elseif($row->jumlah_tanggungan = 0.50){
                $jumlah_tanggungan = '2 - 3';
            }elseif($row->jumlah_tanggungan = 0.25){
                $jumlah_tanggungan = '1';
            }

            if($row->nilai_rapot = 1){
                $nilai_rapot = '< 8,5';
            }elseif($row->nilai_rapot = 0.75){
                $nilai_rapot = '7,5 - 8,4';
            }elseif($row->nilai_rapot = 0.50){
                $nilai_rapot = '6,5 - 7,4';
            }elseif($row->nilai_rapot = 0.25){
                $nilai_rapot= '< 6,5';
            }

            if($row->sertifikat_prestasi = 1){
                $sertifikat_prestasi = '≥ 1 Sertifikat Internasional atau ≥ 5 Sertifikat Nasional';
            }elseif($row->sertifikat_prestasi = 0.75){
                $sertifikat_prestasi = '2 - 4 Sertifikat Nasional';
            }elseif($row->sertifikat_prestasi = 0.50){
                $sertifikat_prestasi = '1 Sertifikat Nasional atau 3 - 5 Sertifikat Regional';
            }elseif($row->sertifikat_prestasi = 0.25){
                $sertifikat_prestasi = '< 3 Sertifikat Regional';
            }


            $data = array(
		'id_siswa' => $row->id_siswa,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'nama_orangtua' => $row->nama_orangtua,
		'kip' => $row->kip,
		'kks' => $row->kks,
		'penghasilan_orangtua' => $penghasilan_orangtua,
		'jumlah_tanggungan' => $jumlah_tanggungan,
		'nilai_rapot' => $nilai_rapot,
        'sertifikat_prestasi' => $sertifikat_prestasi,
        'status' => $row->status,
        'foto_siswa' => $row->foto_siswa,
        'foto_kip' => $row->foto_kip,
        'foto_kks' => $row->foto_kks,
        'foto_strukgaji' => $row->foto_strukgaji,
        'foto_kk' => $row->foto_kk,
        'foto_rapot' => $row->foto_rapot,
        'foto_sertifikat' => $row->foto_sertifikat,
        'nilai_akhir' => $row->nilai_akhir,

        
	    );
            //$this->load->view('siswa/siswa_read', $data);
            $this->template->set('tittle','Detail Siswa');
            $this->template->load('index','contents','siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }

    public function profile()
    {
        $row = $this->Siswa_model->get_by_id($_SESSION['id_siswa']);
        if ($row) {

            if($row->penghasilan_orangtua = 1){
                $penghasilan_orangtua = '< Rp 2.000.000';
            }elseif($row->penghasilan_orangtua = 0.75){
                $penghasilan_orangtua = 'Rp 2.000.000 - Rp 2.999.999';
            }elseif($row->penghasilan_orangtua = 0.50){
                $penghasilan_orangtua = 'Rp 3.000.000 - Rp 4.000.000';
            }elseif($row->penghasilan_orangtua = 0.25){
                $penghasilan_orangtua = '> Rp 4.000.000';
            }

            if($row->jumlah_tanggungan = 1){
                $jumlah_tanggungan = '> 5';
            }elseif($row->jumlah_tanggungan = 0.75){
                $jumlah_tanggungan = '4 - 5';
            }elseif($row->jumlah_tanggungan = 0.50){
                $jumlah_tanggungan = '2 - 3';
            }elseif($row->jumlah_tanggungan = 0.25){
                $jumlah_tanggungan = '1';
            }

            if($row->nilai_rapot = 1){
                $nilai_rapot = '< 8,5';
            }elseif($row->nilai_rapot = 0.75){
                $nilai_rapot = '7,5 - 8,4';
            }elseif($row->nilai_rapot = 0.50){
                $nilai_rapot = '6,5 - 7,4';
            }elseif($row->nilai_rapot = 0.25){
                $nilai_rapot= '< 6,5';
            }

            if($row->sertifikat_prestasi = 1){
                $sertifikat_prestasi = '≥ 1 Sertifikat Internasional atau ≥ 5 Sertifikat Nasional';
            }elseif($row->sertifikat_prestasi = 0.75){
                $sertifikat_prestasi = '2 - 4 Sertifikat Nasional';
            }elseif($row->sertifikat_prestasi = 0.50){
                $sertifikat_prestasi = '1 Sertifikat Nasional atau 3 - 5 Sertifikat Regional';
            }elseif($row->sertifikat_prestasi = 0.25){
                $sertifikat_prestasi = '< 3 Sertifikat Regional';
            }


            $data = array(
		'id_siswa' => $row->id_siswa,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'nama_orangtua' => $row->nama_orangtua,
		'kip' => $row->kip,
        'kks' => $row->kks,
        'penghasilan_orangtua' => $penghasilan_orangtua,
		'jumlah_tanggungan' => $jumlah_tanggungan,
		'nilai_rapot' => $nilai_rapot,
        'sertifikat_prestasi' => $sertifikat_prestasi,
        'status' => $row->status,
        'foto_siswa' => $row->foto_siswa,
        'foto_kip' => $row->foto_kip,
        'foto_kks' => $row->foto_kks,
        'foto_strukgaji' => $row->foto_strukgaji,
        'foto_kk' => $row->foto_kk,
        'foto_rapot' => $row->foto_rapot,
        'foto_sertifikat' => $row->foto_sertifikat,
        'nilai_akhir' => $row->nilai_akhir,

        
	    );
            //$this->load->view('siswa/siswa_read', $data);
            $this->template->set('tittle','Detail Siswa');
            $this->template->load('index','contents','siswa/siswa_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'id_siswa' => set_value('id_siswa'),
	    'nama' => set_value('nama'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'nama_orangtua' => set_value('nama_orangtua'),
	    'kip' => set_value('kip'),
	    'kks' => set_value('kks'),
	    'penghasilan_orangtua' => set_value('penghasilan_orangtua'),
	    'jumlah_tanggungan' => set_value('jumlah_tanggungan'),
	    'sertifikat_prestasi' => set_value('sertifikat_prestasi'),
	    'nilai_rapot' => set_value('nilai_rapot'),
        
        'foto' => '',
	);
        //$this->load->view('siswa/siswa_form', $data);
        $this->template->set('tittle','Form Tambah Siswa');
        $this->template->load('index','contents','siswa/siswa_form', $data);
    }
    
    public function create_action() 
    {
        $username = $this->input->post('username',TRUE);
        $this->_rules();
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!is_dir('./assets/upload/'.$username)) {
                mkdir('./assets/upload/'.$username,0755,true);
            }
            $filename_siswa                 = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotosiswa_'.$filename_siswa;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB

            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_siswa')) {
                $foto_siswa = $this->upload->data("file_name");
            }else{
                $foto_siswa = '';
                // print_r($this->upload->display_errors());
            }
            $filename_kip                   = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotokip_'.$filename_kip;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_kip')) {
                $foto_kip = $this->upload->data("file_name");
            }else{
                $foto_kip = '';
            }
            $filename_kks                   = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotokks_'.$filename_kks;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_kks')) {
                $foto_kks = $this->upload->data("file_name");
            }else{
                $foto_kks = '';
            }
            $filename_strukgaji             = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotostrukgaji_'.$filename_strukgaji;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_strukgaji')) {
                $foto_strukgaji = $this->upload->data("file_name");
            }else{
                $foto_strukgaji = '';
            }
            $filename_stnk                  = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotostnk_'.$filename_stnk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_stnk')) {
                $foto_stnk = $this->upload->data("file_name");
            }else{
                $foto_stnk = '';
            }
            $filename_kk                    = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotokk_'.$filename_kk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_kk')) {
                $foto_kk = $this->upload->data("file_name");
            }else{
                $foto_kk = '';
            }

            // upload foto sertifikat
            $filename_sertifikat              = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotosertifikat'.$filename_sertifikat;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_sertifikat')) {
                $foto_sertifikat = $this->upload->data("file_name");
            }else{
                $foto_sertifikat = '';
            }

            // upload foto rapot
            $filename_raport        = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotorapot'.$filename_rapot;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_rapot')) {
                $foto_rapot = $this->upload->data("file_name");
            }else{
                $foto_rapot = '';
            }

            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'username' => $username,
                'password' => md5($this->input->post('password',TRUE)),
                'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'nama_orangtua' => $this->input->post('nama_orangtua',TRUE),
                'kip' => $this->input->post('kip',TRUE),
                'kks' => $this->input->post('kks',TRUE),
                'penghasilan_orangtua' => $this->input->post('penghasilan_orangtua',TRUE),
                'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan',TRUE),
                'nilai_rapot' => $this->input->post('nilai_rapot',TRUE),
                'sertifikat_prestasi' => $this->input->post('sertifikat_prestasi',TRUE),
                'foto_siswa'  => $foto_siswa,
                'foto_kip'  => $foto_kip,
                'foto_rapot' => $foto_rapot,
                'foto_sertifikat' => $foto_sertifikat,
                'foto_kks'  => $foto_kks,
                'foto_strukgaji'    => $foto_strukgaji,
                'foto_kk'   => $foto_kk

	    );

            $this->Siswa_model->insert($data);
            $this->Siswa_model->update_nilai_akhir();
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }
    
    public function data_update()
    {
        $row = $this->Siswa_model->get_by_id($_SESSION['id_siswa']);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/data_update_action'),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_orangtua' => set_value('nama_orangtua', $row->nama_orangtua),
		'kip' => set_value('kip', $row->kip),
		'kks' => set_value('kks', $row->kks),
		'penghasilan_orangtua' => set_value('penghasilan_orangtua', $row->penghasilan_orangtua),
		'jumlah_tanggungan' => set_value('jumlah_tanggungan', $row->jumlah_tanggungan),
		'nilai_rapot' => set_value('nilai_rapot', $row->nilai_rapot),
		'sertifikat_prestasi' => set_value('sertifikat_prestasi', $row->sertifikat_prestasi),
        
        'foto' => $row,
	    );
            //$this->load->view('siswa/siswa_form', $data);
            $this->template->set('tittle','Update Siswa');
            $this->template->load('index','contents','siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function data_update_action()
    {
        $id = $this->input->post('id_siswa', TRUE);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $username = $this->input->post('username',TRUE);
            $row = $this->Siswa_model->get_by_id($id);
            if (!is_dir('./assets/upload/'.$username)) {
                mkdir('./assets/upload/'.$username,0755,true);
            }
            if ($_FILES['foto_siswa']['name']!='') {
                if ($row->foto_siswa!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_siswa);
                }
                
                $filename_siswa                 = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotosiswa_'.$filename_siswa;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
    
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('foto_siswa')) {
                    $data['foto_siswa'] = $this->upload->data("file_name");
                    
                }
            }
            // print_r($_FILES['foto_siswa']);
            if ($_FILES['foto_kip']['name']!='') {
                if ($row->foto_kip!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kip);
                }
                $filename_kip                   = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotokip_'.$filename_kip;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB

                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_kip')) {
                    $data['foto_kip'] = $this->upload->data("file_name");
                }
            }
            if ($_FILES['foto_kks']['name']!='') {
                if ($row->foto_kks!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kks);
                $filename_kks                   = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotokks_'.$filename_kks;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_kks')) {
                $data['foto_kks'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_strukgaji']['name']!='') {
                if ($row->foto_strukgaji!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_strukgaji);
                $filename_strukgaji             = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotostrukgaji_'.$filename_strukgaji;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_strukgaji')) {
                $data['foto_strukgaji'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_stnk']['name']!='') {
                if ($row->foto_stnk!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_stnk);
            $filename_stnk                  = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotostnk_'.$filename_stnk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_stnk')) {
                $data['foto_stnk'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_kk']['name']!='') {
                if ($row->foto_kk!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kk);
            $filename_kk                    = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotokk_'.$filename_kk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_kk')) {
                $data['foto_kk'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_rapot']['name']!='') {
                if ($row->foto_rapot!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_rapot);
            $filename_rapot              = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotorapot_'.$filename_rapot;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_rapot')) {
                $data['foto_rapot'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_sertifikat']['name']!='') {
                if ($row->foto_sertifikat!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_sertifikat);
            $filename_sertifikat          = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotosertifikat_'.$filename_sertifikat;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_sertifikat')) {
                $data['foto_sertifikat'] = $this->upload->data("file_name");
                    }
                }
            }
                $data['nama'] = $this->input->post('nama',TRUE);
                $data['username'] = $username;
                if($this->input->post('password',TRUE) != ''){
                    $data['password'] = md5($this->input->post('password',TRUE));
                }
                $data['tempat_lahir'] = $this->input->post('tempat_lahir',TRUE);
                $data['tanggal_lahir'] = $this->input->post('tanggal_lahir',TRUE);
                $data['alamat'] = $this->input->post('alamat',TRUE);
                $data['nama_orangtua'] = $this->input->post('nama_orangtua',TRUE);
                $data['kip'] = $this->input->post('kip',TRUE);
                $data['kks'] = $this->input->post('kks',TRUE);
                $data['penghasilan_orangtua'] = $this->input->post('penghasilan_orangtua',TRUE);
                $data['jumlah_tanggungan'] = $this->input->post('jumlah_tanggungan',TRUE);
                $data['nilai_rapot'] = $this->input->post('nilai_rapot',TRUE);
                $data['sertifikat_prestasi'] = $this->input->post('sertifikat_prestasi',TRUE);
                $data['status'] = 0;
            
            
            $this->Siswa_model->update($this->input->post('id_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa/profile'));
        }
    }

    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_orangtua' => set_value('nama_orangtua', $row->nama_orangtua),
		'kip' => set_value('kip', $row->kip),
		'kks' => set_value('kks', $row->kks),
		'penghasilan_orangtua' => set_value('penghasilan_orangtua', $row->penghasilan_orangtua),
		'jumlah_tanggungan' => set_value('jumlah_tanggungan', $row->jumlah_tanggungan),
		'nilai_rapot' => set_value('nilai_rapot', $row->nilai_rapot),
		'sertifikat_prestasi' => set_value('sertifikat_prestasi', $row->sertifikat_prestasi),
        
        'foto' => $row,
	    );
            //$this->load->view('siswa/siswa_form', $data);
            $this->template->set('tittle','Update Siswa');
            $this->template->load('index','contents','siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }
    
    public function update_action() 
    {
        $id = $this->input->post('id_siswa', TRUE);
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $username = $this->input->post('username',TRUE);
            $row = $this->Siswa_model->get_by_id($id);
            if (!is_dir('./assets/upload/'.$username)) {
                mkdir('./assets/upload/'.$username,0755,true);
            }
            if ($_FILES['foto_siswa']['name']!='') {
                if ($row->foto_siswa!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_siswa);
                }
                
                $filename_siswa                 = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotosiswa_'.$filename_siswa;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
    
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('foto_siswa')) {
                    $data['foto_siswa'] = $this->upload->data("file_name");
                    
                }
            }
            // print_r($_FILES['foto_siswa']);
            if ($_FILES['foto_kip']['name']!='') {
                if ($row->foto_kip!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kip);
                }
                $filename_kip                   = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotokip_'.$filename_kip;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB

                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_kip')) {
                    $data['foto_kip'] = $this->upload->data("file_name");
                }
            }
            if ($_FILES['foto_kks']['name']!='') {
                if ($row->foto_kks!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kks);
                $filename_kks                   = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotokks_'.$filename_kks;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_kks')) {
                $data['foto_kks'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_strukgaji']['name']!='') {
                if ($row->foto_strukgaji!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_strukgaji);
                $filename_strukgaji             = $this->input->post('username',TRUE);
                $config['upload_path']          = './assets/upload/'.$username;
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['file_name']            = 'fotostrukgaji_'.$filename_strukgaji;
                $config['overwrite']			= true;
                $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_strukgaji')) {
                $data['foto_strukgaji'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_stnk']['name']!='') {
                if ($row->foto_stnk!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_stnk);
            $filename_stnk                  = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotostnk_'.$filename_stnk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_stnk')) {
                $data['foto_stnk'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_kk']['name']!='') {
                if ($row->foto_kk!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_kk);
            $filename_kk                    = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotokk_'.$filename_kk;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_kk')) {
                $data['foto_kk'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_rapot']['name']!='') {
                if ($row->foto_rapot!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_rapot);
            $filename_rapot              = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotorapot_'.$filename_rapot;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_rapot')) {
                $data['foto_rapot'] = $this->upload->data("file_name");
                    }
                }
            }
            if ($_FILES['foto_sertifikat']['name']!='') {
                if ($row->foto_sertifikat!='' ) {
                    unlink('./assets/upload/'.$username.'/'.$row->foto_sertifikat);
            $filename_sertifikat          = $this->input->post('username',TRUE);
            $config['upload_path']          = './assets/upload/'.$username;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = 'fotosertifikat_'.$filename_sertifikat;
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_sertifikat')) {
                $data['foto_sertifikat'] = $this->upload->data("file_name");
                    }
                }
            }
                $data['nama'] = $this->input->post('nama',TRUE);
                $data['username'] = $username;
                if($this->input->post('password',TRUE)){
                    $data['password'] = md5($this->input->post('password',TRUE));
                }
                $data['tempat_lahir'] = $this->input->post('tempat_lahir',TRUE);
                $data['tanggal_lahir'] = $this->input->post('tanggal_lahir',TRUE);
                $data['alamat'] = $this->input->post('alamat',TRUE);
                $data['nama_orangtua'] = $this->input->post('nama_orangtua',TRUE);
                $data['kip'] = $this->input->post('kip',TRUE);
                $data['kks'] = $this->input->post('kks',TRUE);
                $data['penghasilan_orangtua'] = $this->input->post('penghasilan_orangtua',TRUE);
                $data['jumlah_tanggungan'] = $this->input->post('jumlah_tanggungan',TRUE);
                $data['nilai_rapot'] = $this->input->post('nilai_rapot',TRUE);
                $data['sertifikat_prestasi'] = $this->input->post('sertifikat_prestasi',TRUE);
                $data['status'] = 0;
            

            $this->Siswa_model->update($this->input->post('id_siswa', TRUE), $data);
            if(!$this->Siswa_model->update($this->input->post('id_siswa', TRUE), $data)){
                $this->update_status($this->input->post('id_siswa', TRUE), 0);
            }
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }

    public function update_status($id_siswa,$status) 
    {
        
            $data = array(
		'status' => $status,
	    );

            $this->Siswa_model->update($id_siswa, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa/nilaiakhir'));
 
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa/nilaiakhir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa/nilaiakhir'));
        }
    }

    

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	// $this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_orangtua', 'nama orangtua', 'trim|required');
	$this->form_validation->set_rules('kip', 'kip', 'trim|required');
	$this->form_validation->set_rules('kks', 'kks', 'trim|required');
	$this->form_validation->set_rules('penghasilan_orangtua', 'penghasilan orangtua', 'trim|required');
	$this->form_validation->set_rules('jumlah_tanggungan', 'jumlah tanggungan', 'trim|required');
	$this->form_validation->set_rules('nilai_rapot', 'nilai raport', 'trim|required');
	$this->form_validation->set_rules('sertifikat_prestasi', 'sertifikat prestasi', 'trim|required');

	$this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "siswa.xls";
        $judul = "siswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Orangtua");
	xlsWriteLabel($tablehead, $kolomhead++, "Kip");
	xlsWriteLabel($tablehead, $kolomhead++, "Kks");
	xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan Orangtua");
	xlsWriteLabel($tablehead, $kolomhead++, "Kepemilikan Motor");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Tanggungan");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya Pbb");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya Listrik");
	xlsWriteLabel($tablehead, $kolomhead++, "Jarak Rumah");

	foreach ($this->Siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_orangtua);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kks);
	    xlsWriteNumber($tablebody, $kolombody++, $data->penghasilan_orangtua);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kepemilikan_motor);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_tanggungan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->biaya_pbb);
	    xlsWriteNumber($tablebody, $kolombody++, $data->biaya_listrik);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jarak_rumah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=siswa.doc");

        $data = array(
            'siswa_data' => $this->Siswa_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('siswa/siswa_doc',$data);
        $this->template->set('tittle','Siswa');
        $this->template->load('index','contents','siswa/siswa_doc', $data);
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-15 14:55:07 */
/* http://harviacode.com */