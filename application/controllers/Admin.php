<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
        $this->load->model('Model_pegawai', 'm_pegawai');
        $this->load->model('Model_akademik', 'm_akademik');
        $this->load->model('Model_survey', 'm_survey');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jumlahpegawai'] = $this->m_pegawai->jumlahpegawai();
        $data['jumlahcuti'] = $this->m_akademik->jumlahcuti();
        $data['jumlahkinerja'] = $this->m_akademik->jumlahkinerja();
        $data['jumlahpresensi'] = $this->m_akademik->jumlahpresensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function akademik()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/index', $data);
        $this->load->view('templates/footer');
    }
    public function dataPegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['queryPegawai'] = $this->m_pegawai->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data-pegawai', $data);
        $this->load->view('templates/footer');
    }
    public function tambahPegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah-pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_pegawai->tambahdata();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Pegawai
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('admin/datapegawai');
        }
    }
    public function editPegawai($nip)
    {
        $data['title'] = ' Edit Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['query'] = $this->m_pegawai->ambil_data($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit-pegawai', $data);
        $this->load->view('templates/footer');
    }

    public function updatePegawai()
    {
        $this->_rules2();
        $nip = $this->input->post('nip');
        if ($this->form_validation->run() == FALSE) {
            $this->editPegawai($nip);
        } else {
            $user = array(
                'nip' => $this->input->post('nip'),
                'nik' => $this->input->post('nik'),
                'nuptk' => $this->input->post('nuptk'),
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'pendidikan' => $this->input->post('pendidikan'),
                'alamat' => $this->input->post('alamat'),
                'mapel' => $this->input->post('mapel'),
                'masa_kerja' => $this->input->post('masa_kerja'),
                'role_id' => $this->input->post('role_id'),
                'total_sehari' => $this->input->post('total_sehari'),
                'ekuivalensi' => $this->input->post('ekuivalensi'),
            );
            $gaji = array(
                'nip' => $this->input->post('nip'),
                'gaji_pokok' => $this->input->post('gaji_pokok'),
                'status_tpg' => $this->input->post('status_tpg'),
                'tpg_mulai' => $this->input->post('tpg_mulai'),
                'tpg_perbulan' => $this->input->post('tpg_perbulan'),
                'status_tfg' => $this->input->post('status_tfg'),
                'tfg_mulai' => $this->input->post('tfg_mulai'),
                'tfg_perbulan' => $this->input->post('tfg_perbulan')
            );
            $jabatan = array(
                'nip' => $this->input->post('nip'),
                'tmt_sk_terakhir' => $this->input->post('tmt_sk_terakhir'),
                'status_kepegawaian' => $this->input->post('status_kepegawaian'),
                'tmt_inpassing' => $this->input->post('tmt_inpassing'),
                'no_sk_inpassing' => $this->input->post('no_sk_inpassing'),
                'golongan' => $this->input->post('golongan'),
                'jabatan' => $this->input->post('jabatan'),
                'nrg' => $this->input->post('nrg'),
                'no_sk_nrg' => $this->input->post('no_sk_nrg'),
                'tgl_sk_nrg' => $this->input->post('tgl_sk_nrg',),
                'no_sk_pgtnp' => $this->input->post('no_sk_pgtnp'),
                'tgl_sk_pgtnp' => $this->input->post('tgl_sk_pgtnp')
            );
            $where = array('nip' => $this->input->post('nip'));

            $this->m_pegawai->updatedata('user', $user, $where);
            $this->m_pegawai->updatedata('gaji', $gaji, $where);
            $this->m_pegawai->updatedata('jabatan', $jabatan, $where);
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Data Pegawai Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
            redirect('admin/datapegawai');
        }
    }
    public function deletePegawai($nip)
    {

        $this->m_pegawai->deletedata($nip);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('admin/datapegawai');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['role'] =  $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['role'] =  $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
        Akses Diganti</div>');
    }
    public function whatsapp()
    {
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Whatsapp';
        $data['nip'] = $this->m_survey->nip();
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim', [
            'required' => 'No Telp Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
            'required' => 'Pesan Tidak Boleh Kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/whatsapp', $data);
            $this->load->view('templates/footer');
        } else {
            $pesan = $this->input->post('pesan');
            $no_telp = $this->input->post('no_telp');
            $this->_sendwa($no_telp, $pesan);
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Pesan Berhasil Dikirim
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
            redirect('admin/whatsapp');
        }
    }
    private function _sendwa($no_telp, $pesan)
    {

        $curl = curl_init();
        $token = "olrpwXoV6k06WvhOXueoftXbT2QT1jCthIsp3UHSWbake9IY9Edt8rQDC28yuz6f";

        $data = [
            'phone' => $no_telp,
            'message' => $pesan,
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL,  "https://kudus.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        // print_r($result);
    }
    public function whatsapplainya()
    {
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Whatsapp';
        $data['nip'] = $this->m_survey->nip();
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
            'required' => 'Pesan Tidak Boleh Kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/whatsapplainya', $data);
            $this->load->view('templates/footer');
        } else {
            $pesan = $this->input->post('pesan');
            $sql = "SELECT admin.no_telp
                FROM admin";
            // -- WHERE user.role_id = 2";
            $no_telp = $this->db->query($sql)->result_array();
            foreach ($no_telp as $n) {

                $this->_sendwab($pesan, $n);
            }
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Pesan Berhasil Dikirim
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
            redirect('admin/whatsapplainya');
        }
    }

    private function _sendwab($pesan, $n)
    {
        $n = $n['no_telp'];
        $curl = curl_init();
        $token = "olrpwXoV6k06WvhOXueoftXbT2QT1jCthIsp3UHSWbake9IY9Edt8rQDC28yuz6f";
        $data = [
            'phone' => $n,
            'message' => $pesan,
            'secret' => false, // or true
            'priority' => false, // or true
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL,  "https://kudus.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        // print_r($result);

    }

    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[18]', [
            'required' => 'NIP Tidak Boleh Kosong',
            'max_length' => 'Maksimal 18 Karakter'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[17]', [
            'required' => 'NIK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 17 Karakter'
        ]);
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim|max_length[16]', [
            'required' => 'NUPTK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 16 Karakter'
        ]);
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
            'required' => 'Nama Pegawai Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim|max_length[15]', [
            'required' => 'No Telpon Tidak Boleh Kosong',
            'max_length' => 'Maksimal 15 Karakter'
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim', [
            'required' => 'Pendidikan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('role_id', 'Role Id', 'required|trim', [
            'required' => 'Role Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'required|trim', [
            'required' => 'Masa Kerja Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
            'required' => 'Password Tidak Boleh Kosong',
            'min_length' => 'Password Terlalu Pendek '
        ]);
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|trim', [
            'required' => 'Gaji Pokok Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tmt_sk_terakhir', 'TMT SK Terakhir', 'required|trim', [
            'required' => 'TMT SK Terakhir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian', 'required|trim', [
            'required' => 'Status Kepegawaian Tidak Boleh Kosong'
        ]);
    }
    public function _rules2()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[18]', [
            'required' => 'NIP Tidak Boleh Kosong',
            'max_length' => 'Maksimal 18 Karakter'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[17]', [
            'required' => 'NIK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 17 Karakter'
        ]);
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim|max_length[16]', [
            'required' => 'NUPTK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 16 Karakter'
        ]);
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
            'required' => 'Nama Pegawai Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim|max_length[15]', [
            'required' => 'NUPTK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 15 Karakter'
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim', [
            'required' => 'Pendidikan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('role_id', 'Role Id', 'required|trim', [
            'required' => 'Role Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'required|trim', [
            'required' => 'Masa Kerja Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|trim', [
            'required' => 'Gaji Pokok Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tmt_sk_terakhir', 'TMT SK Terakhir', 'required|trim', [
            'required' => 'NUPTK Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('status_kepegawaian', 'Status Kepegawaian', 'required|trim', [
            'required' => 'Status Kepegawaian Tidak Boleh Kosong'
        ]);
    }
}
