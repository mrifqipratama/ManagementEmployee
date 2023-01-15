<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Model_pegawai extends CI_Model
{

    function ambil_data($nip)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gaji g', 'u.nip = g.nip');
        $this->db->join('jabatan j', 'u.nip = j.nip');
        $this->db->where('u.nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gaji g', 'u.nip = g.nip');
        $this->db->join('jabatan j', 'u.nip = j.nip');
        $queryPegawai = $this->db->get();
        return $queryPegawai->result_array();
    }

    public function tambahdata()
    {
        $this->db->trans_start();

        $user = [
            'nip' => $this->input->post('nip', true),
            'nik' => $this->input->post('nik', true),
            'nuptk' => $this->input->post('nuptk', true),
            'nama_pegawai' => $this->input->post('nama_pegawai', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'jk' => $this->input->post('jk', true),
            'no_telp' => $this->input->post('no_telp', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'alamat' => $this->input->post('alamat', true),
            'mapel' => $this->input->post('mapel'),
            'masa_kerja' => $this->input->post('masa_kerja', true),
            'role_id' => $this->input->post('role_id'),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'is_active' => 1,
            'total_sehari' => $this->input->post('total_sehari'),
            'ekuivalensi' => $this->input->post('ekuivalensi'),
        ];
        $this->db->insert('user', $user);



        $last_id = $this->db->insert_id();

        $gaji = [
            'id_gaji' => $last_id,
            'nip' => $this->input->post('nip'),
            'gaji_pokok' => $this->input->post('gaji_pokok'),
            'status_tpg' => $this->input->post('status_tpg'),
            'tpg_mulai' => $this->input->post('tpg_mulai'),
            'tpg_perbulan' => $this->input->post('tpg_perbulan'),
            'status_tfg' => $this->input->post('status_tfg'),
            'tfg_mulai' => $this->input->post('tfg_mulai'),
            'tfg_perbulan' => $this->input->post('tfg_perbulan')
        ];
        $this->db->insert('gaji', $gaji);


        $jabatan = [
            'id_jabatan' => $last_id,
            'nip' => $this->input->post('nip'),
            'tmt_sk_terakhir' => $this->input->post('tmt_sk_terakhir'),
            'status_kepegawaian' => $this->input->post('status_kepegawaian'),
            'tmt_inpassing' => $this->input->post('tmt_inpassing'),
            'no_sk_inpassing' => $this->input->post('no_sk_inpassing'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'nrg' => $this->input->post('nrg'),
            'no_sk_nrg' => $this->input->post('no_sk_nrg'),
            'tgl_sk_nrg' => $this->input->post('tgl_sk_nrg'),
            'no_sk_pgtnp' => $this->input->post('no_sk_pgtnp'),
            'tgl_sk_pgtnp' => $this->input->post('tgl_sk_pgtnp')
        ];

        $this->db->insert('jabatan', $jabatan);


        $this->db->trans_complete();
    }

    public function updatedata($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }
    function deletedata($nip)
    {
        $tables = array('gaji', 'jabatan', 'cuti', 'kinerja', 'presensi', 'admin', 'user');
        $this->db->where('nip', $nip);
        $this->db->delete($tables);
    }
    function jumlahpegawai()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
