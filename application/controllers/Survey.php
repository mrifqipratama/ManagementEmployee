<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_log_in();
        $this->load->model('Model_akademik', 'm_akademik');
        $this->load->model('Model_survey', 'm_survey');
    }
    public function index()
    {
        $data['nip'] = $this->m_survey->nip();
        $data['title'] = 'Survey Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('survey/index', $data);
        $this->load->view('templates/footer');
    }
    public function indexlainya()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if (!$filter == '') {
                $nip = $_GET['filter'];
                $query = $this->m_survey->nip_lainya($nip)->result();
                $queryp = $this->m_survey->nip_lainyap($nip)->result();
            }
        } else {
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
            Harap Pilih Pegawai Terlebih Dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
            redirect('survey');
        }

        $data['query'] = $query;
        $data['queryp'] = $queryp;
        $data['nip'] = $this->m_survey->nip();
        $data['title'] = 'Survey Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('survey/indexlainya', $data);
        $this->load->view('templates/footer');
    }
    public function hasil_survey()
    {
        $data['title'] = 'Survey Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['query'] = $this->m_survey->hasil_survey();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('survey/hasil-survey', $data);
        $this->load->view('templates/footer');
    }
    public function survey($nip)
    {
        $data['title'] = 'Survey Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['query'] = $this->m_survey->ambil_kinerja($nip);
        $data['bulan'] = $this->m_survey->bulan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('survey/form-survey', $data);
        $this->load->view('templates/footer');
    }
    public function tambahSurvey()
    {

        $this->_rules();
        $nip = $this->input->post('nip');
        if ($this->form_validation->run() == FALSE) {
            $this->survey($nip);
        } else {
            $this->m_survey->tambahSurvey();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Berhasil Menambahkan Data Survey
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
          </div>');
            redirect('survey/index');
        }
    }
    public function deletesurvey($id_survey)
    {

        $this->m_survey->deletesurvey($id_survey);
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
            Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
            </button>
            </div>');
        redirect('survey/hasil_survey');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
            'required' => 'NIP Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('id_bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban2', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban3', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban4', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban5', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban6', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban7', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban8', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban9', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('jawaban10', 'Jawaban', 'required|trim', [
            'required' => 'Jawaban Tidak Boleh Kosong'
        ]);
    }
}
