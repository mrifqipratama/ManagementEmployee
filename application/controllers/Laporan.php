<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        is_log_in();
        $this->load->model('Model_akademik', 'm_akademik');
        $this->load->model('Model_survey', 'm_survey');
    }
    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        $data['jumlahcuti'] = $this->m_akademik->jumlahcuti();
        $data['jumlahkinerja'] = $this->m_akademik->jumlahkinerja();
        $data['jumlahpresensi'] = $this->m_akademik->jumlahpresensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function LaporanCuti()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $nip = $_GET['filter'];
                $url_cetak = 'laporan/laporancutinip_cetak?&nip=' . $nip;
                $query = $this->m_survey->nipcuti_lainya($nip)->result();
            }
        } else {
            $url_cetak = 'laporan/laporancuti_cetak';
            $query = $this->m_akademik->tampil_cuti();
        }
        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['nip'] = $this->m_survey->nip();
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-cuti', $data);
        $this->load->view('templates/footer');
    }
    public function LaporanKinerja()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '1') {
                $nip = $_GET['nip'];
                $url_cetak = 'laporan/laporankinerjanip_cetak?&nip=' . $nip;
                $query = $this->m_survey->nip_lainya($nip)->result();
            } else if ($filter == '2') {
                $bulan = $_GET['bulan'];
                $url_cetak = 'laporan/laporankinerjabulan_cetak?&bulan=' . $bulan;
                $query = $this->m_survey->bulan_lainya($bulan)->result();
            }
        } else {
            $url_cetak = 'laporan/laporankinerja_cetak';
            $query = $this->m_akademik->tampil_kinerja();
        }
        $data['url_cetak'] = base_url($url_cetak);
        $data['query'] = $query;
        $data['nip'] = $this->m_survey->nip();
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-kinerja', $data);
        $this->load->view('templates/footer');
    }
    public function Laporanpresensi()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '1') {
                $nip = $_GET['nip'];
                $url_cetak = 'laporan/laporanpresensinip_cetak?&nip=' . $nip;
                $queryp = $this->m_survey->nippresensi_lainya($nip)->result();
            } else if ($filter == '2') {
                $bulan = $_GET['bulan'];
                $url_cetak = 'laporan/laporanpresensibulan_cetak?&bulan=' . $bulan;

                $queryp = $this->m_survey->bulanpresensi_lainya($bulan)->result();
            }
        } else {
            $url_cetak = 'laporan/laporanpresensi_cetak';
            $queryp = $this->m_survey->tampil_presensi();
        }
        $data['url_cetak'] = base_url($url_cetak);
        $data['queryp'] = $queryp;
        $data['nip'] = $this->m_survey->nip();
        $data['bulan'] = $this->m_survey->bulan();
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-presensi', $data);
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
    public function laporancuti_cetak()
    {
        $ket = 'Data Cuti Pegawai ';
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->tampil_cuti();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_cuti_pdf', $data);
    }
    public function laporancutinip_cetak()
    {
        $nip = $_GET['nip'];
        $ket = 'Data Cuti Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_survey->nipcuti_lainya($nip)->result();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_cuti_pdf', $data);
    }
    public function laporankinerja_cetak()
    {
        $ket = 'Data Kinerja Pegawai ';
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_akademik->tampil_kinerja();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_kinerja_pdf', $data);
    }
    public function laporankinerjanip_cetak()
    {
        $nip = $_GET['nip'];
        $ket = 'Data Kinerja Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_survey->nip_lainya($nip)->result();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_kinerja_pdf', $data);
    }
    public function laporankinerjabulan_cetak()
    {
        $bulan = $_GET['bulan'];
        $ket = 'Data Kinerja Pegawai Bulan ' . $bulan;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['query'] = $this->m_survey->bulan_lainya($bulan)->result();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_kinerja_pdf', $data);
    }
    public function laporanpresensi_cetak()
    {
        $ket = 'Data Presensi Pegawai ';
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['queryp'] = $this->m_survey->tampil_presensi();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_presensi_pdf', $data);
    }
    public function laporanpresensinip_cetak()
    {
        $nip = $_GET['nip'];
        $ket = 'Data Presensi Pegawai ' . $nip;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['queryp'] = $this->m_survey->nippresensi_lainya($nip)->result();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_presensi_pdf', $data);
    }
    public function laporanpresensibulan_cetak()
    {
        $bulan = $_GET['bulan'];
        $ket = 'Data Presensi Pegawai Bulan ' . $bulan;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['queryp'] = $this->m_survey->bulanpresensi_lainya($bulan)->result();
        $data['ket'] = $ket;
        $this->load->view('cetak/laporan_presensi_pdf', $data);
    }
}
