<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Model_akademik extends CI_Model
{
    function detail_cuti($nip)
    {
        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->where('c.nip', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    function detail_presensi($nip)
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = p.id_bulan');
        $this->db->where('p.nip', $nip);
        $queryp = $this->db->get();
        return $queryp->result();
    }
    function detail_presensi_lainnya($nip, $bulan)
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = p.id_bulan');
        $this->db->where('p.id_bulan="' . $bulan . '"');
        $this->db->where('u.nip', $nip);
        return $queryp = $this->db->get();
    }
    public function tampil_cuti()
    {
        $this->db->select('*');
        $this->db->from('cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->order_by('id_cuti');
        $queryAkademik = $this->db->get();
        return $queryAkademik->result();
    }
    public function tambahcuti()
    {
        $last_id = $this->db->insert_id();

        $cuti = [
            'id_cuti' => $last_id,
            'nip' => $this->input->post('nip'),
            'nomor' => $this->input->post('nomor'),
            'jenis_cuti' => $this->input->post('jenis_cuti'),
            'tgl_ajuan' => $this->input->post('tgl_ajuan'),
            'tgl_awal' => $this->input->post('tgl_awal'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'lama' => $this->input->post('lama')
        ];
        $this->db->insert('cuti', $cuti);
    }
    public function tambahacc_cuti()
    {
        $last_id = $this->db->insert_id();

        $cuti = [
            'id_cuti' => $last_id,
            'nip' => $this->input->post('nip'),
            'nomor' => $this->input->post('nomor'),
            'jenis_cuti' => $this->input->post('jenis_cuti'),
            'tgl_ajuan' => $this->input->post('tgl_ajuan'),
            'tgl_awal' => $this->input->post('tgl_awal'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'lama' => $this->input->post('lama')
        ];
        $this->db->insert('acc_cuti', $cuti);
    }

    public function updatecuti($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function tampilacc_cuti()
    {
        $this->db->select('*');
        $this->db->from('acc_cuti c');
        $this->db->join('user u', 'c.nip = u.nip');
        $this->db->order_by('id_cuti');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function terimacuti($id_cuti)
    {
        $simpan = "INSERT INTO cuti (nip, nomor, jenis_cuti, tgl_ajuan, lama, tgl_awal, tgl_akhir) SELECT nip, nomor, jenis_cuti, tgl_ajuan, lama, tgl_awal, tgl_akhir FROM acc_cuti WHERE id_cuti='$id_cuti'";
        $delete = "DELETE FROM acc_cuti WHERE id_cuti='$id_cuti'";
        $this->db->query($simpan);
        $this->db->query($delete);
    }
    function tolakcuti($id_cuti)
    {
        $this->db->where('id_cuti', $id_cuti);
        $this->db->delete('acc_cuti');
    }




    function detail_kinerja($nip)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('kinerja k', 'k.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = k.id_bulan');
        $this->db->where('u.nip', $nip);
        $query = $this->db->get();
        return $query->result();
    }
    public function tampil_survey()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('survey s', 's.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = s.id_bulan');
        $this->db->order_by('id_survey');
        $query = $this->db->get();
        return $query->result_array();
    }
    function detail_survey($nip)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('survey s', 's.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = s.id_bulan');
        $this->db->where('u.nip', $nip);
        $queryp = $this->db->get();
        return $queryp->result();
    }
    function survey_lainya($nip, $bulan)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('survey s', 's.nip = u.nip');
        $this->db->join('bulan b', 'b.id_bulan = s.id_bulan');
        $this->db->where('s.id_bulan="' . $bulan . '"');
        $this->db->where('u.nip', $nip);
        return $queryp = $this->db->get();
    }
    public function kinerja_lainya($nip, $bulan)
    {
        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->where('k.id_bulan="' . $bulan . '"');
        $this->db->where('k.nip', $nip);
        $this->db->order_by('nama_pegawai');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function tampil_kinerja()
    {
        $this->db->select('*');
        $this->db->from('kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->order_by('id_kinerja');
        $queryAkademik = $this->db->get();
        return $queryAkademik->result();
    }

    function tambahkinerja($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function tambahacc_kinerja($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function updatekinerja($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampilacc_kinerja()
    {
        $this->db->select('*');
        $this->db->from('acc_kinerja k');
        $this->db->join('user u', 'k.nip = u.nip');
        $this->db->join('bulan b', 'k.id_bulan = b.id_bulan');
        $this->db->order_by('id_kinerja');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function terimakinerja($id_kinerja)
    {
        $simpan = "INSERT INTO kinerja (nip, id_bulan, kegiatan, ket, bukti) SELECT nip, id_bulan, kegiatan, ket, bukti FROM acc_kinerja WHERE id_kinerja='$id_kinerja'";
        $delete = "DELETE FROM acc_kinerja WHERE id_kinerja='$id_kinerja'";
        $this->db->query($simpan);
        $this->db->query($delete);
    }
    function tolakkinerja($id_kinerja)
    {
        $this->db->where('id_kinerja', $id_kinerja);
        $this->db->delete('acc_kinerja');
    }


    public function tampil_presensi()
    {
        $this->db->select('*');
        $this->db->from('presensi p');
        $this->db->join('user u', 'p.nip = u.nip');
        $this->db->join('bulan b', 'p.id_bulan = b.id_bulan');
        $this->db->order_by('id_presensi');
        $queryAkademik = $this->db->get();
        return $queryAkademik->result();
    }

    public function tambahpresensi()
    {
        $last_id = $this->db->insert_id();

        $presensi = [
            'id_presensi' => $last_id,
            'nip' => $this->input->post('nip'),
            'total_jam' => $this->input->post('total_jam'),
            'ekuivalensi_jam' => $this->input->post('ekuivalensi_jam'),
            'id_bulan' => $this->input->post('id_bulan'),
            'jml_presensi' => $this->input->post('jml_presensi'),
        ];
        $this->db->insert('presensi', $presensi);
    }

    public function updatepresensi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function updatebulan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function jumlahcuti()
    {
        $query = $this->db->get('cuti');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function jumlahacc_cuti()
    {
        $query = $this->db->get('acc_cuti');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function jumlahkinerja()
    {
        $query = $this->db->get('kinerja');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function jumlahacc_kinerja()
    {
        $query = $this->db->get('acc_kinerja');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function jumlahpresensi()
    {
        $query = $this->db->get('presensi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
