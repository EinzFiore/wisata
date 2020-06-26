<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{



    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'auth');
    }

    // func untuk meload halaman login
    function index()
    {
        is_login_member();
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('front_templates/css', $data);
            $this->load->view('front_templates/user/nav', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('front_templates/js');
        } else {
            // memanggil func proses login
            $this->_login();
        }
    }

    // private func untuk proses login
    private function _login()
    {

        is_login_member();
        $email      = $this->input->post('email', true);
        $password   = $this->input->post('password', true);
        $member     = $this->auth->check_users($email);
        if ($member == true) {
            if (!password_verify($password, $member['password'])) {
                $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
                redirect('auth', 'refresh');
            } else {
                $data   = [
                    'id'        => $member['id'],
                    'email'     => $member['email']
                ];
                $this->session->set_userdata($data);
                redirect('home', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar, Silahkan daftar dulu!');
            redirect('auth', 'refresh');
        }
    }

    // func untuk daftar akun
    function daftar()
    {

        is_login_member();
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required'      => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('gender', 'gender', 'trim|required', [
            'required'      => 'gender harus dipilih!'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'trim|required', [
            'required'      => 'No telepon harus diisi!'
        ]);
        $this->form_validation->set_rules('status', 'status', 'trim|required', [
            'required'      => 'Status harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[member.email]|valid_email', [
            'required'      => 'Email harus diisi,tidak boleh kosong',
            'is_unique'     => 'Email sudah terdaftar!',
            'valid_email'   => 'Format email tidak benar!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[6]|matches[password2]', [
            'required'      => 'Password tidak boleh kosong',
            'min_length'    => 'Password Minimal 4 karakter',
            'max_length'    => 'Password maksimal 6 karakter',
            'matches'       => 'Konfirmasi password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'trim|required|matches[password]', [
            'required'      => 'Password tidak boleh kosong',
            'matches'       => 'Konfirmasi password tidak sama'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
            'required'      => 'Alamat harus diisi, tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Daftar Akun';
            $this->load->view('auth/daftar', $data);
        } else {
            $nama       = htmlspecialchars($this->input->post('nama', true));
            $gender     = htmlspecialchars($this->input->post('gender', true));
            $email      = htmlspecialchars($this->input->post('email', true));
            $status     = htmlspecialchars($this->input->post('status', true));
            $telepon    = htmlspecialchars($this->input->post('telepon', true));
            $alamat     = htmlspecialchars($this->input->post('alamat', true));
            $password   = $this->input->post('password', true);
            $pass_hash  = password_hash($password, PASSWORD_DEFAULT);
            $data       = [
                'nama'      => $nama,
                'gender'    => $gender,
                'email'     => $email,
                'password'  => $pass_hash,
                'status'    => $status,
                'telepon'   => $telepon,
                'alamat'    => $alamat
            ];
            $this->auth->insertData($data);
            $this->session->set_flashdata('success', 'Berhasil mendaftar, Silahkan Login!');
            redirect('auth', 'refresh');
        }
    }

    // func untuk logout dan menghapus session
    function logout()
    {

        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

    // validasi form input login
    private function _rules()
    {

        $this->form_validation->set_rules('email', 'email', 'trim|required', [
            'required'      => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'      => 'Password tidak boleh kosong!'
        ]);
    }
}
