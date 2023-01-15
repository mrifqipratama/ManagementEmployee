<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'id_ID.utf8');
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        is_log_in();
        $this->load->model('Model_akademik', 'm_akademik');
        $this->load->model('Model_survey', 'm_survey');
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['gaji'] = $this->db->get_where('gaji', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jabatan'] = $this->db->get_where('jabatan', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }
    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->_rules2();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $nuptk = $this->input->post('nuptk');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jk = $this->input->post('jk');
            $no_telp = $this->input->post('no_telp');
            $pendidikan = $this->input->post('pendidikan');
            $alamat = $this->input->post('alamat');
            // $mapel = $this->input->post('mapel');

            // cek jika ada gambar di upload
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '5120';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nik', $nik);
            $this->db->set('nuptk', $nuptk);
            $this->db->set('nama_pegawai', $nama_pegawai);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('jk', $jk);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->set('alamat', $alamat);
            // $this->db->set('mapel', $mapel);
            $this->db->where('nip', $nip);
            $this->db->update('user');

            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Profil berhasil di update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
            redirect('user/detail');
        }
    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                Password Saat Ini Salah</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Password Tidak Boleh Sama Dengan Password Saat Ini</div>');
                    redirect('user/changepassword');
                } else {
                    //password bener
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('user');

                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                    Password Diubah, Demi Keamanan Harap Login Kembali
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                     </button>
                    </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function tambahacc_cuti()
    {
        $data['title'] = 'Cuti';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->_rules3();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambah-cuti', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_akademik->tambahacc_cuti();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Cuti
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('user/tambahacc_cuti');
        }
    }
    public function detailcuti($nip)
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $bulan = $_GET['filter'];
                $url_cetak = 'user/detailCutibulan_cetak?nip=' . $nip . '&bulan=' . $bulan . '';
                $query = $this->m_akademik->detail_cuti($nip);
                $queryp = $this->m_akademik->detail_presensi_lainnya($nip, $bulan)->result();
            }
        } else {
            $url_cetak = 'user/detailCuti_cetak?nip=' . $nip;
            $query = $this->m_akademik->detail_cuti($nip);
            $queryp = $this->m_akademik->detail_presensi($nip);
        }
        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['queryp'] = $queryp;
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Cuti';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail-cuti', $data);
        $this->load->view('templates/footer');
    }
    public function tambahacc_kinerja()
    {
        $data['title'] = 'Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->_rules4();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambah-kinerja', $data);
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');
            $id_bulan = $this->input->post('id_bulan');
            $kegiatan = $this->input->post('kegiatan');
            $ket = $this->input->post('ket');
            $bukti = $_FILES['bukti'];
            if ($bukti = '') {
            } else {
                $config['upload_path'] = './assets/img/bukti/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '5120';
                $config['overwrite'] = true;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('bukti')) {
                    $bukti = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $last_id = $this->db->insert_id();
            $kinerja = array(
                'id_kinerja' => $last_id,
                'nip' => $nip,
                'id_bulan' => $id_bulan,
                'kegiatan' => $kegiatan,
                'ket' => $ket,
                'bukti' => $bukti,
            );

            $this->m_akademik->tambahkinerja($kinerja, 'acc_kinerja');
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Kinerja
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('user/tambahacc_kinerja');
        }
    }
    public function detailkinerja($nip)
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $bulan = $_GET['filter'];
                $url_cetak = 'user/detailKinerjabulan_cetak?nip=' . $nip . '&bulan=' . $bulan . '';
                $query = $this->m_akademik->kinerja_lainya($nip, $bulan)->result();
                $queryp = $this->m_akademik->survey_lainya($nip, $bulan)->result();
            }
        } else {
            $url_cetak = 'user/detailKinerja_cetak?nip=' . $nip;
            $query = $this->m_akademik->detail_kinerja($nip);
            $queryp = $this->m_akademik->detail_survey($nip);
        }

        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['queryp'] = $queryp;
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail-kinerja', $data);
        $this->load->view('templates/footer');
    }

    public function detailKinerja_cetak()
    {
        $nip = $_GET['nip'];
        $ket = 'Data Kinerja Pegawai ' . $nip;
        $ket2 = 'Data Poin Penilaian Kinerja Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->detail_kinerja($nip);
        $data['queryp'] = $this->m_akademik->detail_survey($nip);
        $data['ket'] = $ket;
        $data['ket2'] = $ket2;
        $this->load->view('cetak/detail_kinerja_pdf', $data);
    }
    public function detailKinerjabulan_cetak()
    {
        $nip = $_GET['nip'];
        $bulan = $_GET['bulan'];
        $ket = 'Data Kinerja Pegawai ' . $nip;
        $ket2 = 'Data Poin Penilaian Kinerja Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->kinerja_lainya($nip, $bulan)->result();
        $data['queryp'] = $this->m_akademik->survey_lainya($nip, $bulan)->result();
        $data['ket'] = $ket;
        $data['ket2'] = $ket2;
        $this->load->view('cetak/detail_kinerja_pdf', $data);
    }
    public function detailCuti_cetak()
    {
        $nip = $_GET['nip'];
        $ket = 'Data Presensi Pegawai ' . $nip;
        $ket2 = 'Data Cuti Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->detail_cuti($nip);
        $data['queryp'] = $this->m_akademik->detail_presensi($nip);
        $data['ket'] = $ket;
        $data['ket2'] = $ket2;
        $this->load->view('cetak/detail_cuti_pdf', $data);
    }
    public function detailCutibulan_cetak()
    {
        $nip = $_GET['nip'];
        $bulan = $_GET['bulan'];
        $ket = 'Data Presensi Pegawai ' . $nip;
        $ket2 = 'Data Cuti Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->detail_cuti($nip);
        $data['queryp'] = $this->m_akademik->detail_presensi_lainnya($nip, $bulan)->result();
        $data['ket'] = $ket;
        $data['ket2'] = $ket2;
        $this->load->view('cetak/detail_cuti_pdf', $data);
    }
    public function penilaian()
    {
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/penilaian', $data);
        $this->load->view('templates/footer');
    }
    public function penilaianlainya($nip)
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $bulan = $_GET['filter'];
                $url_cetak = 'user/penilaianlainya_cetak?nip=' . $nip . '&bulan=' . $bulan . '';
                $query = $this->m_survey->kinerja_lainya($nip, $bulan)->row_array();
                $query2 = $this->m_survey->presensi_lainya($nip, $bulan)->row_array();
                $query3 = $this->m_survey->survey_lainya($nip, $bulan)->row_array();
                if ($query3 == '') {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Cek Kembali Data Kinerja & Presensi Anda Dan Harap Menunggu Penilaian Atasan Terlebih Dahulu
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                    </button>
                    </div>');
                    redirect('user/penilaian');
                } else if ($query2 == '') {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Cek Kembali Data Kinerja & Presensi Anda
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                    </button>
                    </div>');
                    redirect('user/penilaian');
                }
            }
        } else {
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
            Harap Pilih Bulan Terlebih Dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
            redirect('user/penilaian');
        }
        $data['tgl_cetak'] = date("d - m - Y");
        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['query2'] = $query2;
        $data['query3'] = $query3;
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/penilaianlainya', $data);
        $this->load->view('templates/footer');
    }

    public function penilaianlainya_cetak()
    {
        $nip = $_GET['nip'];
        $bulan = $_GET['bulan'];
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['query'] = $this->m_survey->kinerja_lainya($nip, $bulan)->row_array();
        $data['query2'] = $this->m_survey->presensi_lainya($nip, $bulan)->row_array();
        $data['query3'] = $this->m_survey->survey_lainya($nip, $bulan)->row_array();
        $data['tgl_cetak'] = date("d - m - Y");
        $this->load->view('cetak/detail_penilaian_pdf', $data);
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[17]', [
        //     'required' => 'NIK Tidak Boleh Kosong',
        //     'max_length' => 'Maksimal 17 Karakter'
        // ]);
        // $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim|max_length[16]', [
        //     'required' => 'NUPTK Tidak Boleh Kosong',
        //     'max_length' => 'Maksimal 16 Karakter'
        // ]);
        // $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
        //     'required' => 'Nama Tidak Boleh Kosong'
        // ]);
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
        //     'required' => 'Tanggal Lahir Tidak Boleh Kosong'
        // ]);
        // $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
        //     'required' => 'Jenis Kelamin Tidak Boleh Kosong'
        // ]);
        // $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|trim|max_length[15]', [
        //     'required' => 'Nomor Telpon Tidak Boleh Kosong',
        //     'max_length' => 'Maksimal 15 Karakter'
        // ]);
        // $this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'required|trim', [
        //     'required' => 'Pendidikan Terakhir Tidak Boleh Kosong'
        // ]);
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
        //     'required' => 'Alamat Tidak Boleh Kosong'
        // ]);
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', ['required' => 'Password Tidak Boleh Kosong']);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]', [
            'required' => 'Password Tidak Boleh Kosong',
            'matches' => 'Password Tidak Cocok',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]', [
            'required' => 'Password Tidak Boleh Kosong',
            'matches' => 'Password Tidak Cocok',
            'min_length' => 'Password Terlalu Pendek'
        ]);
    }
    public function _rules2()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[17]', [
            'required' => 'NIK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 17 Karakter'
        ]);
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim|max_length[16]', [
            'required' => 'NUPTK Tidak Boleh Kosong',
            'max_length' => 'Maksimal 16 Karakter'
        ]);
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
            'required' => 'Nama Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|trim|max_length[15]', [
            'required' => 'Nomor Telpon Tidak Boleh Kosong',
            'max_length' => 'Maksimal 15 Karakter'
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'required|trim', [
            'required' => 'Pendidikan Terakhir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Tidak Boleh Kosong'
        ]);
    }
    public function _rules3()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[18]', [
            'required' => 'NIP Tidak Boleh Kosong',
            'max_length' => 'Maksimal 18 Karakter'
        ]);
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim', [
            'required' => 'Nomor Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'required|trim', [
            'required' => 'Jenis Cuti Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_ajuan', 'Tanggal Ajuan', 'required|trim', [
            'required' => 'Tanggal Ajuan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim', [
            'required' => 'Tanggal Awal Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim', [
            'required' => 'Tanggal Akhir Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('lama', 'Lama', 'required|trim', [
            'required' => 'Lama Cuti Tidak Boleh Kosong'
        ]);
    }
    public function _rules4()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[18]', [
            'required' => 'NIP Tidak Boleh Kosong',
            'max_length' => 'Maksimal 18 Karakter'
        ]);
        $this->form_validation->set_rules('id_bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim', [
            'required' => 'Kegiatan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('ket', 'Kegiatan', 'required|trim', [
            'required' => 'Keterangan Tidak Boleh Kosong'
        ]);
    }
}
