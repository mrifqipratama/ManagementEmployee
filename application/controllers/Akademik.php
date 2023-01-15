<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_log_in();
        $this->load->model('Model_akademik', 'm_akademik');
        $this->load->model('Model_survey', 'm_survey');
    }

    public function index()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jumlahcuti'] = $this->m_akademik->jumlahcuti();
        $data['jumlahkinerja'] = $this->m_akademik->jumlahkinerja();
        $data['jumlahpresensi'] = $this->m_akademik->jumlahpresensi();
        $data['jumlahacc_cuti'] = $this->m_akademik->jumlahacc_cuti();
        $data['jumlahacc_kinerja'] = $this->m_akademik->jumlahacc_kinerja();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataCuti()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nip'] = $this->m_survey->nip();
        $data['bulan'] = $this->m_survey->bulan();
        $data['queryAkademik'] = $this->m_akademik->tampil_cuti();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/data-cuti', $data);
        $this->load->view('templates/footer');
    }
    public function tambahCuti()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->dataCuti();
        } else {
            $this->m_akademik->tambahcuti();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Cuti
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('akademik/dataCuti');
        }
    }
    public function updateCuti()
    {
        $id_cuti = $this->input->get('id_cuti');

        $nip = $this->input->post('nip');
        $nomor = $this->input->post('nomor');
        $jenis_cuti = $this->input->post('jenis_cuti');
        $tgl_ajuan = $this->input->post('tgl_ajuan');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $lama = $this->input->post('lama');
        $cuti = array(
            'nip' => $nip,
            'nomor' => $nomor,
            'jenis_cuti' => $jenis_cuti,
            'tgl_ajuan' => $tgl_ajuan,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'lama' => $lama,

        );
        $where = array('id_cuti' => $id_cuti);

        $this->m_akademik->updatecuti($where, $cuti, 'cuti');
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Data Cuti Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
        redirect('akademik/dataCuti');
    }
    public function deleteCuti()
    {

        $id = $this->input->get('id_cuti');
        $this->db->delete('cuti', array('id_cuti' => $id));
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/dataCuti');
    }
    public function terimaCuti($id_cuti)
    {
        $this->m_akademik->terimacuti($id_cuti);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Ajuan Berhasil Diterima
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/accCuti');
    }
    public function tolakCuti($id_cuti)
    {
        $this->m_akademik->tolakcuti($id_cuti);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Ajuan Di Tolak
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/accCuti');
    }
    public function accCuti()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['query'] = $this->m_akademik->tampilacc_cuti();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/acc-cuti', $data);
        $this->load->view('templates/footer');
    }

    public function dataKinerja()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nip'] = $this->m_survey->nip();
        $data['bulan'] = $this->m_survey->bulan();
        $data['queryAkademik'] = $this->m_akademik->tampil_kinerja();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/data-kinerja', $data);
        $this->load->view('templates/footer');
    }
    public function tambahKinerja()
    {


        $this->_rules2();

        if ($this->form_validation->run() == FALSE) {
            $this->dataKinerja();
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

            $this->m_akademik->tambahkinerja($kinerja, 'kinerja');
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Cuti
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('akademik/dataKinerja');
        }
    }
    public function updateKinerja()
    {
        $id_kinerja = $this->input->get('id_kinerja');

        $nip = $this->input->post('nip');
        $id_bulan = $this->input->post('id_bulan');
        $kegiatan = $this->input->post('kegiatan');
        $ket = $this->input->post('ket');
        $bukti = $_FILES['bukti'];

        if ($bukti) {
            $config['upload_path'] = './assets/img/bukti/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '5120';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $bukti = $this->upload->data('file_name');
                $this->db->set('bukti', $bukti);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $kinerja = array(
            'id_kinerja' => $id_kinerja,
            'nip' => $nip,
            'id_bulan' => $id_bulan,
            'kegiatan' => $kegiatan,
            'ket' => $ket,
        );
        $where = array('id_kinerja' => $id_kinerja);

        $this->m_akademik->updatekinerja($where, $kinerja, 'kinerja');
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Data Kinerja Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
        redirect('akademik/dataKinerja');
    }
    public function deleteKinerja()
    {
        $id = $this->input->get('id_kinerja');
        $this->db->delete('kinerja', array('id_kinerja' => $id));
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/dataKinerja');
    }
    public function terimaKinerja($id_kinerja)
    {
        $this->m_akademik->terimakinerja($id_kinerja);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Ajuan Berhasil Diterima
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/accKinerja');
    }
    public function tolakKinerja($id_kinerja)
    {
        $this->m_akademik->tolakkinerja($id_kinerja);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Ajuan Berhasil Di Tolak
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/accKinerja');
    }
    public function accKinerja()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['query'] = $this->m_akademik->tampilacc_kinerja();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/acc-kinerja', $data);
        $this->load->view('templates/footer');
    }

    public function datapresensi()
    {

        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nip'] = $this->m_survey->nip();
        $data['bulan'] = $this->m_survey->bulan();
        $data['queryAkademik'] = $this->m_akademik->tampil_presensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/data-presensi', $data);
        $this->load->view('templates/footer');
    }
    public function tambahPresensi()
    {
        $this->_rulespresensi();

        if ($this->form_validation->run() == FALSE) {
            $this->datapresensi();
        } else {
            $this->m_akademik->tambahpresensi();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Presensi
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('akademik/dataPresensi');
        }
    }
    public function updatePresensi()
    {
        $id_presensi = $this->input->get('id_presensi');

        $nip = $this->input->post('nip');
        $total_jam = $this->input->post('total_jam');
        $ekuivalensi_jam = $this->input->post('ekuivalensi_jam');
        $id_bulan = $this->input->post('id_bulan');
        $presensi = array(
            'nip' => $nip,
            'total_jam' => $total_jam,
            'ekuivalensi_jam' => $ekuivalensi_jam,
            'id_bulan' => $id_bulan,
        );

        $where = array('id_presensi' => $id_presensi);

        $this->m_akademik->updatepresensi($where, $presensi, 'presensi');
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Data Presensi Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
        redirect('akademik/dataPresensi');
    }
    public function deletePresensi()
    {

        $id = $this->input->get('id_presensi');
        $this->db->delete('presensi', array('id_presensi' => $id));
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('akademik/dataPresensi');
    }
    public function penilaian()
    {
        $data['bulan'] = $this->m_survey->bulan();
        $data['nip'] = $this->m_survey->nip();
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/penilaian', $data);
        $this->load->view('templates/footer');
    }
    public function penilaianlainya()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $nip = $_GET['filter'];
                $bulan = $_GET['bulan'];
                $url_cetak = 'akademik/penilaianlainya_cetak?nip=' . $nip . '&bulan=' . $bulan . '';
                $query = $this->m_survey->kinerja_lainya($nip, $bulan)->row_array();
                $query2 = $this->m_survey->presensi_lainya($nip, $bulan)->row_array();
                $query3 = $this->m_survey->survey_lainya($nip, $bulan)->row_array();
                if ($query3 == '') {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Cek Kembali Data Kinerja & Presensi Dan Harap Menunggu Penilaian Atasan Terlebih Dahulu
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                    </button>
                    </div>');
                    redirect('akademik/penilaian');
                } else if ($query2 == '') {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Cek Kembali Data Kinerja & Presensi
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                    </button>
                    </div>');
                    redirect('akademik/penilaian');
                }
            }
        } else {
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
            Harap Pilih Pegawai & Bulan Terlebih Dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
            redirect('akademik/penilaian');
        }

        $data['tgl_cetak'] = date("d - m - Y");
        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['query2'] = $query2;
        $data['query3'] = $query3;
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/penilaianlainya', $data);
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
        $this->load->view('cetak/laporan_penilaian_pdf', $data);
    }

    public function bulan()
    {
        $data['title'] = 'Akademik';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['bulan'] = $this->m_survey->bulan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akademik/bulan', $data);
        $this->load->view('templates/footer');
    }
    public function updatebulan()
    {
        $id_bulan = $this->input->get('id_bulan');

        $nama_bulan = $this->input->post('nama_bulan');
        $jml_hari = $this->input->post('jml_hari');
        $bulan = array(
            'nama_bulan' => $nama_bulan,
            'jml_hari' => $jml_hari
        );
        $where = array('id_bulan' => $id_bulan);
        $this->m_akademik->updatebulan($where, $bulan, 'bulan');
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
                Data Bulan Berhasil Diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
        redirect('akademik/bulan');
    }

    public function _rules()
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
    public function _rules2()
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
    public function _rulespresensi()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|max_length[18]', [
            'required' => 'NIP Tidak Boleh Kosong',
            'max_length' => 'Maksimal 18 Karakter'
        ]);
        $this->form_validation->set_rules('total_jam', 'Total Jam', 'required|trim', [
            'required' => 'Total Jam Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('ekuivalensi_jam', 'Ekuvalensi', 'required|trim', [
            'required' => 'Ekuvalensi Jam Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('id_bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan Tidak Boleh Kosong'
        ]);
    }
}
