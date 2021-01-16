<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beasiswa_siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Beasiswa_siswa_model');
        $this->load->model('Siswa_model');
        $this->load->model('Beasiswa_model');
        $this->load->library('form_validation','email');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'beasiswa_siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'beasiswa_siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'beasiswa_siswa/index.html';
            $config['first_url'] = base_url() . 'beasiswa_siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Beasiswa_siswa_model->total_rows($q);
        $beasiswa_siswa = $this->Beasiswa_siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'beasiswa_siswa_data' => $beasiswa_siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // echo "<pre>";
        // print_r($beasiswa_siswa);
        // die();
        //$this->load->view('beasiswa_siswa/beasiswa_siswa_list', $data);
        $this->template->set('tittle','beasiswa_siswa_list');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_list', $data);
    }

    public function listbea()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'beasiswa_siswa/listbea.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'beasiswa_siswa/listbea.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'beasiswa_siswa/listbea.html';
            $config['first_url'] = base_url() . 'beasiswa_siswa/listbea.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Beasiswa_siswa_model->total_rows($q);
        $beasiswa_siswa = $this->Beasiswa_siswa_model->getlistbea($config['per_page'], $start, $q, $_SESSION['id_siswa']);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'beasiswa_siswa_data' => $beasiswa_siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // echo "<pre>";
        // print_r($beasiswa_siswa);
        // die();
        //$this->load->view('beasiswa_siswa/beasiswa_siswa_list', $data);
        $this->template->set('tittle','beasiswa_siswa_list');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Beasiswa_siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_beasiswa_siswa' => $row->id_beasiswa_siswa,
		'nama' => $row->nama,
		'nama_beasiswa' => $row->nama_beasiswa,
		'status' => $row->status,
	    );
            //$this->load->view('beasiswa_siswa/beasiswa_siswa_read', $data);
            $this->template->set('tittle','beasiswa_siswa_read');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa_siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('beasiswa_siswa/create_action'),
	    'id_beasiswa_siswa' => set_value('id_beasiswa_siswa'),
	    'id_siswa' => set_value('id_siswa'),
	    'id_beasiswa' => set_value('id_beasiswa'),
        'status' => set_value('status'),
        'siswa_data' => $this->Siswa_model->get_siswa_by_status('1'),
        'beasiswa_data' => $this->Beasiswa_model->get_all(),
	);
        //$this->load->view('beasiswa_siswa/beasiswa_siswa_form', $data);
        $this->template->set('tittle','beasiswa_siswa_form');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_form', $data);
    }
    
    public function create_action() {
        
            $siswa_data = $this->input->post('id_siswa',TRUE);
            $id_beasiswa = $this->input->post('id_beasiswa',TRUE);

            $nama_beasiswa=$this->Beasiswa_model->get_by_id($id_beasiswa);
            $email_siswa=$this->Siswa_model->get_email($siswa_data);
            // print($nama_beasiswa->nama_beasiswa);
            //echo(implode(',',$email_siswa[0]));
            // exit();

            foreach ($email_siswa as $email) {
                $new_arr[]=$email->email;
            }

            foreach ($siswa_data as $siswa) {
                $cek = $this->Beasiswa_siswa_model->cek($siswa, $id_beasiswa);

                if ($cek==0) {
                    $data = array(
                        'id_siswa' => $siswa,
                        'id_beasiswa' => $id_beasiswa,
                        'status_beasiswa_siswa' => $this->input->post('status',TRUE),
                    );
        
                    $this->Beasiswa_siswa_model->insert($data);
                }
                
            }
            $this->load->library('email');
            $config = array( 
                'charset' => 'utf-8',
                'useragent'=> 'Codeigniter', 
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',  
                'smtp_port' => '465',
                'smtp_timeout'=> '400', 
                'smtp_user' => 'team.antigay@gmail.com',   
                'smtp_pass' => 'antigay123',
                'mailtype' => "html",
                'crlf'=>"\r\n",
                'newline'=>"\r\n",   
                'smtp_crypto'=> "SSL",
                'wordwrap'=> TRUE,
                'warpchars'=>"80",
                'mailpath'=> '/usr/sbin/sendmail', 
                'validation' => 'false',
                ); 
            $this->email->initialize($config);
            $this->email->from('team.antigay@gmail.com', 'Sibea SMK N 4 Surakarta');
            $this->email->to(implode(', ',$new_arr)); 
            $this->email->subject('Sibea SMK N 4 Surakarta');
            $this->email->message('Anda telah diterima '.$nama_beasiswa->nama_beasiswa);
            if ($this->email->send()){
                $this->session->set_flashdata('message', 'Set Status Success');
                redirect(site_url('beasiswa_siswa'));
            }else{
                show_error($this->email->print_debugger());
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('beasiswa_siswa'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Beasiswa_siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('beasiswa_siswa/update_action'),
		'id_beasiswa_siswa' => set_value('id_beasiswa_siswa', $row->id_beasiswa_siswa),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'id_beasiswa' => set_value('id_beasiswa', $row->id_beasiswa),
		'status' => set_value('status', $row->status),
	    );
            //$this->load->view('beasiswa_siswa/beasiswa_siswa_form', $data);
            $this->template->set('tittle','beasiswa_siswa_form');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa_siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_beasiswa_siswa', TRUE));
        } else {
            $data = array(
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'id_beasiswa' => $this->input->post('id_beasiswa',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Beasiswa_siswa_model->update($this->input->post('id_beasiswa_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('beasiswa_siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Beasiswa_siswa_model->get_by_id($id);

        if ($row) {
            $this->Beasiswa_siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('beasiswa_siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa_siswa'));
        }
    }

    public function setTidakAktif($id) {
        $this->Beasiswa_siswa_model->setTidakAktif($id);
        $this->session->set_flashdata('message', 'Set Status Success');
        redirect(site_url('beasiswa_siswa'));
    }

    public function setCair($id) {
        $this->load->library('email');

        $data_siswa = $this->Beasiswa_siswa_model->getEmailSiswa($id);
        // echo "<pre>";
        // echo print_r($data_siswa); 
        // echo "</pre>";
        // exit();


        $config = array( 
            'charset' => 'utf-8',
            'useragent'=> 'Codeigniter', 
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',  
            'smtp_port' => '465',
            'smtp_timeout'=> '400', 
            'smtp_user' => 'team.antigay@gmail.com',   
            'smtp_pass' => 'antigay123',
            'mailtype' => "html",
            'crlf'=>"\r\n",
            'newline'=>"\r\n",   
            'smtp_crypto'=> "SSL",
            'wordwrap'=> TRUE,
            'warpchars'=>"80",
            'mailpath'=> '/usr/sbin/sendmail', 
            'validation' => 'false',
            ); 
        $this->email->initialize($config);
        $this->email->from('team.antigay@gmail.com', 'Sibea SMK N 4 Surakarta');
        $this->email->to($data_siswa->email); 
        $this->email->subject('Sibea SMK N 4 Surakarta');
        $this->email->message($data_siswa->nama_beasiswa.' anda telah cair');
        if ($this->email->send()){
            $this->Beasiswa_siswa_model->setCair($id);
            $this->session->set_flashdata('message', 'Set Status Success');
            redirect(site_url('beasiswa_siswa'));
        }else{
            show_error($this->email->print_debugger());
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_siswa', 'id siswa', 'trim|required');
	$this->form_validation->set_rules('id_beasiswa', 'id beasiswa', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_beasiswa_siswa', 'id_beasiswa_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "beasiswa_siswa.xls";
        $judul = "beasiswa_siswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Beasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Beasiswa_siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_beasiswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=beasiswa_siswa.doc");

        $data = array(
            'beasiswa_siswa_data' => $this->Beasiswa_siswa_model->get_all(),
            'start' => 0
        );
        
        //$this->load->view('beasiswa_siswa/beasiswa_siswa_doc',$data);
        $this->template->set('tittle','beasiswa_siswa_doc');
        $this->template->load('index','contents','beasiswa_siswa/beasiswa_siswa_doc', $data);
    }

    public function notification() {
        $id = $this->input->post('id');

        $row = $this->Beasiswa_siswa_model->notification($id);

        if($row->status_uang == 'Cair'){
            $data = array('item' => '<li><a href="#">
                <i class="fa fa-users text-aqua"></i> Beasiswa Sudah Cair
            </a></li>');

            echo json_encode($data);
        }
    }
}

/* End of file Beasiswa_siswa.php */
/* Location: ./application/controllers/Beasiswa_siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-15 14:55:07 */
/* http://harviacode.com */