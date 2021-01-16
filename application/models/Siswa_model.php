<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public $table = 'siswa';
    public $id = 'id_siswa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_siswa_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_siswa', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nama_orangtua', $q);
	$this->db->or_like('kip', $q);
	$this->db->or_like('kks', $q);
	$this->db->or_like('penghasilan_orangtua', $q);
	$this->db->or_like('jumlah_tanggungan', $q);
	$this->db->or_like('nilai_rapot', $q);
	$this->db->or_like('sertifikat_prestasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_siswa', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nama_orangtua', $q);
	$this->db->or_like('kip', $q);
	$this->db->or_like('kks', $q);
	$this->db->or_like('penghasilan_orangtua', $q);
	$this->db->or_like('jumlah_tanggungan', $q);
	$this->db->or_like('nilai_rapot', $q);
	$this->db->or_like('sertifikat_prestasi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function get_nilai_akhir($limit, $start = 0, $q = NULL, $kip = '') {
        // $this->db->order_by($this->id, $this->order);f
        $this->db->order_by('nilai_akhir', 'desc');
    //     $this->db->like('id_siswa', $q);
	// $this->db->or_like('nama', $q);
	// $this->db->or_like('username', $q);
	// $this->db->or_like('password', $q);
	// $this->db->or_like('tempat_lahir', $q);
	// $this->db->or_like('tanggal_lahir', $q);
	// $this->db->or_like('alamat', $q);
	// $this->db->or_like('nama_orangtua', $q);
	// $this->db->or_like('kip', $q);
	// $this->db->or_like('kks', $q);
	// $this->db->or_like('penghasilan_orangtua', $q);
	// $this->db->or_like('kepemilikan_motor', $q);
	// $this->db->or_like('jumlah_tanggungan', $q);
	// $this->db->or_like('biaya_pbb', $q);
	// $this->db->or_like('biaya_listrik', $q);
    // $this->db->or_like('jarak_rumah', $q);
    // $this->db->where('kip',$kip);
    
    //$this->db->limit($limit, $start);
    
    $response = $this->db->get($this->table)->result();
    // $response[]=$this->get_minC1();
    return $response;
    }

    function update_nilai_akhir(){
        $c1= $this->get_minC('penghasilan_orangtua');
        $c2 = $this->get_maxC('jumlah_tanggungan');
        $c3 = $this->get_maxC('nilai_rapot');
        $c4 = $this->get_maxC('sertifikat_prestasi');

        // $c2= $this->get_minC('kepemilikan_motor');
        // $c3= $this->get_minC('jumlah_tanggungan');
        // $c4= $this->get_minC('biaya_pbb');
        // $c5= $this->get_minC('biaya_listrik');
        // $c6= $this->get_minC('jarak_rumah');

        // $nc1=$c1->minC/$siswa->penghasilan_orangtua;
        //         $nc2=$c2->minC/$siswa->kepemilikan_motor;
        //         $nc3=$c3->minC/$siswa->jumlah_tanggungan;
        //         $nc4=$c4->minC/$siswa->biaya_pbb;
        //         $nc5=$c5->minC/$siswa->biaya_listrik;
        //         $nc6=$c6->minC/$siswa->jarak_rumah;
        //         ($nc1*$xc1)+($nc2*$xc2)+($nc3*$xc3)+($nc4*$xc4)+($nc5*$xc5)+($nc6*$xc6)  UPDATE `siswa` SET `nilai_akhir` = ($c1->minC/`penghasilan_orangtua`*0.2)+($c2->minC/`kepemilikan_motor`*0.15)+($c3->minC/`jumlah_tanggungan`*0.2)+($c4->minC/`biaya_pbb`*0.15)+($c5->minC/`biaya_listrik`*0.15)+($c6->minC/`jarak_rumah`*0.15)) 
                $this->db->query("UPDATE `siswa` SET `nilai_akhir` = ($c1->minC/`penghasilan_orangtua`*0.25)+(`jumlah_tanggungan`/$c2->maxC*0.30)+(`nilai_rapot`/$c3->maxC*0.25)+(`sertifikat_prestasi`/$c4->maxC*0.20)");
    }

    function getJumlahMampu() {
        $this->db->select('nilai_akhir');
        $this->db->where('nilai_akhir >', '0.5');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function getJumlahTidakMampu() {
        $this->db->select('nilai_akhir');
        $this->db->where('nilai_akhir <', '0.5');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function getJumlahSiswa() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function getPenerimaBeasiswa() {
        $this->db->from('beasiswa_siswa');
        return $this->db->count_all_results();
    }

    function get_minC($kriteria){
        $this->db->select('MIN('.$kriteria.') as minC');
        return $this->db->get($this->table)->row();
    }

    function get_maxC($kriteria) {
        $this->db->select('MAX('.$kriteria.') as maxC');
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_email($siswa_data){
        $this->db->select('email');
        $this->db->from('siswa');
        $this->db->where_in('id_siswa',$siswa_data);
        $query=$this->db->get()->result_object();
        return $query;
    }

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-15 14:55:07 */
/* http://harviacode.com */