<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Model_survey extends CI_Model
{
    function ambil_kinerja($nip)
    {
        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->where('k.nip="' . $nip . '"');
        $query = $this->db->get();
        return $query->row();
    }
    public function tampil_kinerja()
    {
        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->order_by('id_kinerja');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tampil_presensi()
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->order_by('id_presensi');
        $queryp = $this->db->get();
        return $queryp->result();
    }
    public function tambahSurvey()
    {
        $last_id = $this->db->insert_id();

        $survey = [
            'id_survey' => $last_id,
            'id_bulan' => $this->input->post('id_bulan'),
            'nip' => $this->input->post('nip'),
            'jawaban' => $this->input->post('jawaban'),
            'jawaban2' => $this->input->post('jawaban2'),
            'jawaban3' => $this->input->post('jawaban3'),
            'jawaban4' => $this->input->post('jawaban4'),
            'jawaban5' => $this->input->post('jawaban5'),
            'jawaban6' => $this->input->post('jawaban6'),
            'jawaban7' => $this->input->post('jawaban7'),
            'jawaban8' => $this->input->post('jawaban8'),
            'jawaban9' => $this->input->post('jawaban9'),
            'jawaban10' => $this->input->post('jawaban10')
        ];
        $this->db->insert('survey', $survey);
    }
    public function hasil_survey()
    {
        $this->db->select('*');
        $this->db->from('survey s');
        $this->db->join('user u', 's.nip = u.nip');
        $this->db->join('bulan b', 's.id_bulan = b.id_bulan');
        $this->db->group_by('id_survey');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletesurvey($id_survey)
    {
        $this->db->where('id_survey', $id_survey);
        $this->db->delete('survey');
    }

    public function bulan()
    {
        $this->db->select('*');
        $this->db->from('bulan');
        return $query = $this->db->get()->result();
    }
    public function bulan_lainya($bulan)
    {

        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->where('k.id_bulan="' . $bulan . '"');
        $this->db->order_by('id_kinerja');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function bulanpresensi_lainya($bulan)
    {

        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->where('p.id_bulan="' . $bulan . '"');
        $this->db->order_by('nama_bulan');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function bulan_lainyap($bulan)
    {

        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->where('p.id_bulan="' . $bulan . '"');
        $this->db->order_by('nama_bulan');
        return $queryp = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function nip()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $query = $this->db->get()->result();
    }
    public function nip_lainya($nip)
    {
        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        // $this->db->join('presensi p', 'p.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->where('k.nip', $nip);
        $this->db->order_by('id_kinerja');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function nipcuti_lainya($nip)
    {
        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->where('u.nip', $nip);
        $this->db->order_by('nama_pegawai');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function nippresensi_lainya($nip)
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->where('p.nip', $nip);
        $this->db->order_by('nama_pegawai');
        return $queryp = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function nip_lainyap($nip)
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->where('p.nip', $nip);
        $this->db->order_by('nama_pegawai');
        return $queryp = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function kinerja_lainya($nip, $bulan)
    {

        // $query = $this->db->query('SELECT SUM(kinerja.kegiatan) as jumlah_kegiatan FROM kinerja JOIN user ON kinerja.nip = user.nip JOIN bulan ON kinerja.id_bulan = bulan.id_bulan where kinerja.nip = '$nip' AND kinerja.id_bulan = '$bulan'');
        // return $query = $this->db->get();
        $this->db->select_sum('k.kegiatan');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->where('k.nip', $nip);
        $this->db->where('k.id_bulan="' . $bulan . '"');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function presensi_lainya($nip, $bulan)
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->where('p.nip', $nip);
        $this->db->where('p.id_bulan="' . $bulan . '"');
        return $query2 = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function survey_lainya($nip, $bulan)
    {
        $this->db->select('*');
        $this->db->from('survey s');
        $this->db->join('user u', 's.nip = u.nip');
        $this->db->join('bulan b', 's.id_bulan = b.id_bulan');
        $this->db->where('s.nip', $nip);
        $this->db->where('s.id_bulan="' . $bulan . '"');
        return $query3 = $this->db->get();
    }
}
