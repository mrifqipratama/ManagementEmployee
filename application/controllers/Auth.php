<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('nip')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required', ['required' => 'NIP Tidak Boleh Kosong!']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password Tidak Boleh Kosong!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();
        // user ada
        if ($user) {
            //user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nip' => $user['nip'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
            NIP ini belum teraktivasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">
            NIP ini belum terdaftar</div>');
            redirect('auth');
        }
    }

    // public function registration()
    // {
    //     if ($this->session->userdata('nip')) {
    //         redirect('user');
    //     }
    //     $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[user.nip]', [
    //         'required' => 'NIP Tidak Boleh Kosong', 'is_unique' => 'NIP sudah ada'
    //     ]);
    //     $this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
    //         'required' => 'NIK Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim', [
    //         'required' => 'NUPTK Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
    //         'required' => 'Nama Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
    //         'required' => 'Tanggal Lahir Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
    //         'required' => 'Jenis Kelamin Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|trim', [
    //         'required' => 'Nomor Telpon Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('pendidikan', 'Pendidikan Terakhir', 'required|trim', [
    //         'required' => 'Pendidikan Terakhir Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
    //         'required' => 'Alamat Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
    //         'required' => 'Alamat Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'required|trim', [
    //         'required' => 'Masa Kerja Tidak Boleh Kosong'
    //     ]);
    //     $this->form_validation->set_rules(
    //         'password1',
    //         'Password',
    //         'required|trim|min_length[4]|matches[password2]',
    //         [
    //             'required' => 'Password tidak boleh kosong',
    //             'matches' => 'Password tidak cocok!',
    //             'min_length' => ' Password terlalu pendek!'
    //         ]
    //     );
    //     $this->form_validation->set_rules(
    //         'password2',
    //         'Password',
    //         'required|trim|min_length[4]|matches[password2]',
    //         [
    //             'required' => 'Password tidak boleh kosong',
    //             'matches' => 'Password tidak cocok!',
    //             'min_length' => ' Password terlalu pendek!'
    //         ]
    //     );


    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registrasi';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'nip' => htmlspecialchars($this->input->post('nip', true)),
    //             'nik' => htmlspecialchars($this->input->post('nik', true)),
    //             'nuptk' => htmlspecialchars($this->input->post('nuptk', true)),
    //             'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai', true)),
    //             'tgl_lahir' => ($this->input->post('tgl_lahir', true)),
    //             'jk' => ($this->input->post('jk', true)),
    //             'no_telp' => ($this->input->post('no_telp', true)),
    //             'pendidikan' => ($this->input->post('pendidikan', true)),
    //             'alamat' => htmlspecialchars($this->input->post('alamat', true)),
    //             'mapel' => ($this->input->post('mapel', true)),
    //             'masa_kerja' => ($this->input->post('masa_kerja', true)),
    //             'role_id' => 2,
    //             'image' => 'default.png',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'is_active' => 1,
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
    //         Selamat, Akun Anda Sudah Terdaftar Silahkan Login
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
    //         <span aria-hidden="true">&times;</span> 
    //         </button>
    //         </div>');

    //         redirect('auth');
    //     }
    // }
    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">
        Kamu berhasil logout</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
