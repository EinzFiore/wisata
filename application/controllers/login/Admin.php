<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        is_login_member();
    }

    // func untuk meload halaman login
    function index()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('admin/login', $data);
        } else {
            // memanggil func proses login
            $this->_login();
        }
    }

    // func proses login
    private function _login()
    {
        $username        = htmlspecialchars($this->input->post('username', true));
        $password        = md5($this->input->post('password', true));
        $check_user      = $this->AuthModel->check_user($username);
        if ($check_user) {
            if ($check_user['password'] != $password) {
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('login/admin', 'refresh');
            } else {
                $data   = [
                    'id'        => $check_user['id'],
                    'username'  => $check_user['username'],
                ];
                $this->session->set_userdata($data);
                redirect('dashboard', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Tidak ditemukan, Username dan password tidak terdaftar!');
            redirect('login/admin', 'refresh');
            echo "tidak ditemukan!";
        }
    }

    // validasi form input login
    private function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'      => 'Username tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'      => 'Password tidak boleh kosong!'
        ]);
    }
}

