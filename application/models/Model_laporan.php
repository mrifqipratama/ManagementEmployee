<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Model_laporan extends CI_Model
{

    public function nip()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $query = $this->db->get()->result();
    }

    public function bulan()
    {
        $this->db->select('*');
        $this->db->from('bulan');

        return $query = $this->db->get()->result();
    }

    public function view_by_nip($nip)
    {
        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->join('bulan b', 'c.id_bulan = b.id_bulan');
        $this->db->where('u.nip', $nip);
        $this->db->order_by('u.nama_pegawai');
        return $query = $this->db->get();
    }

    public function view_by_year($nama_bulan)
    {
        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->join('bulan b', 'c.id_bulan = b.id_bulan');
        $this->db->where('b.id_bulan', $nama_bulan);
        $this->db->order_by('b.nama_bulan');
        return $query = $this->db->get();
    }

    function view_all()
    {

        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'u.nip = c.nip');
        // $this->db->join('bulan b', 'c.id_bulan = b.id_bulan');
        $this->db->where('c.status', '1');
        $this->db->order_by('id_cuti');
        return $this->db->get()->result();
    }
}
