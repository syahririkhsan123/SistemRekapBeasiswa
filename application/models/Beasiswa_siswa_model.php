<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beasiswa_siswa_model extends CI_Model
{

    public $table = 'beasiswa_siswa';
    public $id = 'id_beasiswa_siswa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join('siswa', 'siswa.id_siswa=beasiswa_siswa.id_siswa');
        $this->db->join('beasiswa', 'beasiswa.id_beasiswa=beasiswa_siswa.id_beasiswa');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('siswa', 'siswa.id_siswa=beasiswa_siswa.id_siswa');
        $this->db->join('beasiswa', 'beasiswa.id_beasiswa=beasiswa_siswa.id_beasiswa');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function cek($siswa, $id_beasiswa)
    {
        $this->db->where('id_siswa', $siswa);
        $this->db->where('id_beasiswa', $id_beasiswa);
        return $this->db->get($this->table)->num_rows();
    }

    function setTidakAktif($id)
    {
        $this->db->set('status_beasiswa_siswa', 'Tidak Aktif');
        $this->db->where($this->id, $id);
        $query=$this->db->update($this->table);
        return $query;

    }

    function setCair($id)
    {
        $this->db->set('status_uang', 'Cair');
        $this->db->where($this->id, $id);
        $query=$this->db->update($this->table);
        return $query;
    }
    
    function getEmailSiswa($id)
    {
        // $this->db->select('email');
        $this->db->join('beasiswa', 'beasiswa.id_beasiswa=beasiswa_siswa.id_beasiswa');
        $this->db->join('siswa', 'siswa.id_siswa=beasiswa_siswa.id_siswa');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_beasiswa_siswa', $q);
	$this->db->or_like('id_siswa', $q);
	$this->db->or_like('id_beasiswa', $q);
	$this->db->or_like('status_beasiswa_siswa', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->join('siswa', 'siswa.id_siswa=beasiswa_siswa.id_siswa');
        $this->db->join('beasiswa', 'beasiswa.id_beasiswa=beasiswa_siswa.id_beasiswa');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('beasiswa_siswa.id_beasiswa_siswa', $q);
	$this->db->or_like('beasiswa_siswa.id_siswa', $q);
	$this->db->or_like('beasiswa_siswa.id_beasiswa', $q);
	$this->db->or_like('beasiswa_siswa.status_beasiswa_siswa', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function getlistbea($limit, $start = 0, $q = NULL, $id) {
        $this->db->join('siswa', 'siswa.id_siswa=beasiswa_siswa.id_siswa');
        $this->db->join('beasiswa', 'beasiswa.id_beasiswa=beasiswa_siswa.id_beasiswa');
        $this->db->order_by($this->id, $this->order);
    //     $this->db->like('beasiswa_siswa.id_beasiswa_siswa', $q);
	// $this->db->or_like('beasiswa_siswa.id_siswa', $q);
	// $this->db->or_like('beasiswa_siswa.id_beasiswa', $q);
	// $this->db->or_like('beasiswa_siswa.status_beasiswa_siswa', $q);
    $this->db->limit($limit, $start);
    $this->db->where('beasiswa_siswa.id_siswa', $id);
        return $this->db->get($this->table)->result();
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

    function notification($id)
    {
        $this->db->select('status_uang');
        $this->db->where('id_siswa', $id);

        return $this->db->get($this->table)->row();
    }

}

/* End of file Beasiswa_siswa_model.php */
/* Location: ./application/models/Beasiswa_siswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-15 14:55:07 */
/* http://harviacode.com */