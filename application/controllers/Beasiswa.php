<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Beasiswa_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'beasiswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'beasiswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'beasiswa/index.html';
            $config['first_url'] = base_url() . 'beasiswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Beasiswa_model->total_rows($q);
        $beasiswa = $this->Beasiswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'beasiswa_data' => $beasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('beasiswa/beasiswa_list', $data);
        $this->template->set('tittle','Beasiswa');
        $this->template->load('index','contents','beasiswa/beasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Beasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_beasiswa' => $row->id_beasiswa,
		'nama_beasiswa' => $row->nama_beasiswa,
		'deskripsi' => $row->deskripsi,
		'semester' => $row->semester,
		'tahun_beasiswa' => $row->tahun_beasiswa,
		'pemberi_beasiswa' => $row->pemberi_beasiswa,
	    );
            //$this->load->view('beasiswa/beasiswa_read', $data);
            $this->template->set('tittle','Detail Beasiswa');
            $this->template->load('index','contents','beasiswa/beasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('beasiswa/create_action'),
	    'id_beasiswa' => set_value('id_beasiswa'),
	    'nama_beasiswa' => set_value('nama_beasiswa'),
	    'deskripsi' => set_value('deskripsi'),
	    'semester' => set_value('semester'),
	    'tahun_beasiswa' => set_value('tahun_beasiswa'),
	    'pemberi_beasiswa' => set_value('pemberi_beasiswa'),
	);
        //$this->load->view('beasiswa/beasiswa_form', $data);
        $this->template->set('tittle','Form Tambah Beasiswa');
        $this->template->load('index','contents','beasiswa/beasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_beasiswa' => $this->input->post('nama_beasiswa',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun_beasiswa' => $this->input->post('tahun_beasiswa',TRUE),
		'pemberi_beasiswa' => $this->input->post('pemberi_beasiswa',TRUE),
	    );

            $this->Beasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('beasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Beasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('beasiswa/update_action'),
		'id_beasiswa' => set_value('id_beasiswa', $row->id_beasiswa),
		'nama_beasiswa' => set_value('nama_beasiswa', $row->nama_beasiswa),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'semester' => set_value('semester', $row->semester),
		'tahun_beasiswa' => set_value('tahun_beasiswa', $row->tahun_beasiswa),
		'pemberi_beasiswa' => set_value('pemberi_beasiswa', $row->pemberi_beasiswa),
	    );
            //$this->load->view('beasiswa/beasiswa_form', $data);
            $this->template->set('tittle','Update Beasiswa');
            $this->template->load('index','contents','beasiswa/beasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_beasiswa', TRUE));
        } else {
            $data = array(
		'nama_beasiswa' => $this->input->post('nama_beasiswa',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun_beasiswa' => $this->input->post('tahun_beasiswa',TRUE),
		'pemberi_beasiswa' => $this->input->post('pemberi_beasiswa',TRUE),
	    );

            $this->Beasiswa_model->update($this->input->post('id_beasiswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('beasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Beasiswa_model->get_by_id($id);

        if ($row) {
            $this->Beasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('beasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('beasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_beasiswa', 'nama beasiswa', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('tahun_beasiswa', 'tahun beasiswa', 'trim|required');
	$this->form_validation->set_rules('pemberi_beasiswa', 'pemberi beasiswa', 'trim|required');

	$this->form_validation->set_rules('id_beasiswa', 'id_beasiswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "beasiswa.xls";
        $judul = "beasiswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Beasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Beasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Pemberi Beasiswa");

	foreach ($this->Beasiswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_beasiswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->semester);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_beasiswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pemberi_beasiswa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=beasiswa.doc");

        $data = array(
            'beasiswa_data' => $this->Beasiswa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('beasiswa/beasiswa_doc',$data);
    }

}

/* End of file Beasiswa.php */
/* Location: ./application/controllers/Beasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-15 14:55:07 */
/* http://harviacode.com */